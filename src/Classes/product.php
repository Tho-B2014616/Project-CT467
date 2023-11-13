<?php
class Product

{
    private PDO $connection;

    public int $ID_HH = -1;
    public string $Ten_SP;
    public int $So_lg;
    public string $DVT;
    public int $ID_VT;
    public string $NCC;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    //Thêm hàng hóa
    public function Them_HH(string $ten_sp, int $so_lg, string $dvt, int $id_vt, int $id_ncc): bool
    {
        $statement = $this->connection->prepare('INSERT INTO hang_hoa (Ten_SP, So_lg, DVT, ID_VT, ID_NCC) 
                                                        VALUES (:ten_sp, :so_lg, :dvt, :id_vt, :id_ncc)'); 
        $statement->execute([
            'ten_sp' => $ten_sp,
            'so_lg' => $so_lg,
            'dvt' => $dvt,
            'id_vt' => $id_vt,
            'id_ncc' => $id_ncc
            ]);

        return $statement->rowCount() === 1;
        }

    //cập nhật hàng hóa
    public function update_HH(int $id_hh, string $ten_sp, int $so_lg, string $dvt, int $id_vt, int $id_ncc): array
    {
        $sql= 'UPDATE hang_hoa 
        SET Ten_SP = :ten_sp, 
            So_lg = :so_lg, 
            DVT = :dvt, 
            ID_VT = :id_vt';
        if ($id_ncc != 0) {
            $sql = $sql .',ID_NCC = :id_ncc';
        }
             
        $sql = $sql .' WHERE ID_hh = :id_hh';
        $statement = $this->connection->prepare($sql); 
        if ($id_ncc != 0) {
            $statement->execute([
                'ten_sp' => $ten_sp,
                'so_lg' => $so_lg,
                'dvt' => $dvt,
                'id_vt' => $id_vt,
                'id_ncc' => $id_ncc,
                'id_hh' => $id_hh
                ]);
        }else{
            $statement->execute([
                'ten_sp' => $ten_sp,
                'so_lg' => $so_lg,
                'dvt' => $dvt,
                'id_vt' => $id_vt,
                'id_hh' => $id_hh
                ]);
        }
        

        return $this->Tim_HH_ID($id_hh);
    }

    //Xóa hàng hóa
    public function delete_hh($id_hh) {
        $statement = $this->connection->prepare('DELETE FROM hang_hoa WHERE ID_HH = :id_hh');
    
        $statement->execute(['id_hh' => $id_hh]);
    
        $rowCount = $statement->rowCount();
    
        if ($rowCount > 0) {
            $message = "Đã xóa thành công hàng hóa có ID $id_hh.";
        } else {
            $message = "Không có hàng hóa nào được xóa với ID $id_hh.";
        }
    
        echo "<script>alert('$message');</script>";
    }
    
    //Hiển thị hàng hóa
    public function Hien_thi_HH(): array
    {
        $products = [];

        $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, nha_cung_cap b WHERE a.ID_NCC = b.ID_NCC ORDER BY a.ID_HH');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    //Tìm hàng hóa theo ID
    public function Tim_HH_ID(int $id): array
    {
        $products = [];
        $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, nha_cung_cap b 
                                                WHERE a.ID_NCC = b.ID_NCC 
                                                AND a.ID_HH = :id_hh
                                                ORDER BY a.ID_HH');
        $statement->execute(['id_hh' => $id]);

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    //Tìm hàng hóa theo Tên

    public function Tim_HH_TEN(string $tensp): array
    {
        $products = [];
        $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, nha_cung_cap b 
                                                WHERE a.ID_NCC = b.ID_NCC AND Ten_SP LIKE :tensp 
                                                ORDER BY a.ID_HH');
        $statement->execute(['tensp' => $tensp.'%']);

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    //Tìm hàng hóa theo nhà cung cấp

    public function Tim_HH_NCC(string $ten_ncc): array
    {
        $products = [];
        $statement = $this->connection->prepare('CALL Tim_kiem_HH_theo_ncc(:ten_ncc)');
        $statement->execute(['ten_ncc' => $ten_ncc]);

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    //Tìm hàng hóa theo lô

    public function Tim_HH_Lo(int $so_lo): array
    {
        $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, nha_cung_cap b, vi_tri c
                                                WHERE a.ID_NCC = b.ID_NCC 
                                                    AND a.ID_VT = c.ID_VT
                                                    AND c.So_lo= :so_lo
                                                ORDER BY a.ID_VT; ');
        $statement->execute(['so_lo' => $so_lo]);

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    public function Tim_HH_PN(int $ID_PN): array
{
    $products = [];  // Khởi tạo mảng để chứa các sản phẩm

    $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, phieu_nhap b, info_pn c, nha_cung_cap d
                                            WHERE a.ID_HH = c.ID_HH
                                                AND d.ID_ncc = a.ID_ncc
                                                AND b.ID_PN = c.ID_PN
                                                AND b.ID_PN = :ID_PN
                                            ORDER BY a.ID_VT; ');
    $statement->execute(['ID_PN' => $ID_PN]);

    while ($row = $statement->fetch()) {
        $product = new Product($this->connection);
        $product->fromDbRow($row);
        $products[] = $product;
    }

    return $products;
}
    public function Tim_HH_PX(int $ID_PX): array
    {
        $products = [];  // Khởi tạo mảng để chứa các sản phẩm
        $statement = $this->connection->prepare('SELECT * FROM hang_hoa a, phieu_xuat b, info_px c, nha_cung_cap d
                                                WHERE a.ID_HH = c.ID_HH
                                                    AND d.ID_ncc = a.ID_ncc
                                                    AND b.ID_PX = c.ID_PX
                                                    AND b.ID_PX= :ID_PX
                                                ORDER BY a.ID_VT; ');
        $statement->execute(['ID_PX' => $ID_PX]);

        while ($row = $statement->fetch()) {
            $product = new Product($this->connection);
            $product->fromDbRow($row);
            $products[] = $product;
        }

        return $products;
    }

    public function fromDbRow(array $row): void
    {
        $this->ID_HH = $row['ID_HH'];
        $this->Ten_SP = $row['Ten_SP'];
        $this->So_lg = $row['So_lg'];
        $this->DVT = $row['DVT'];
        $this->ID_VT = $row['ID_VT'];
        $this->NCC = $row['Ten_NCC'];
    }
}