<?php
class phieu_nhap
{
    private PDO $connection;

    public int $ID_PN;
    public DateTime $Ngay_PN;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function Them_PN(DateTime $ngay_pn, int $id_ncc, array $hh_sl): bool
    {
        $statement = $this->connection->prepare('INSERT INTO phieu_nhap (Ngay_PN, ID_NCC, HL_SL) 
                                                        VALUES (:ngay_pn, :id_ncc, :hh_sl)');
        $statement->execute([
            'ngay_pn' => $ngay_pn->format('Y-m-d H:i:s'),
            'id_ncc' => $id_ncc,
            'hh_sl' => implode(',', $hh_sl), // Chuyển đổi mảng thành chuỗi, điều chỉnh theo cần thiết
        ]);

        return $statement->rowCount() === 1;
        }
    public function Hien_Thi_PN(): array
    {
        $phieu_nhap_s = [];

        $statement = $this->connection->prepare('SELECT * FROM phieu_nhap ');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $phieu_nhap = new phieu_nhap($this->connection);
            $phieu_nhap->fromDbRow($row);
            $phieu_nhap_s[] = $phieu_nhap;
        }

        return $phieu_nhap_s;
    }
    public function fromDbRow(array $row): void
    {
        $this->ID_PN = $row['ID_PN'];
        $this->Ngay_PN = DateTime::createFromFormat('Y-m-d', $row['Ngay_PN']);
        
    }
    public function Tim_PN_ID($keyword){
        $PN_s = [];
        $sql = "SELECT *
        FROM phieu_nhap
        WHERE ID_PN = :keyword";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':keyword'=>$keyword]);
        while ($row = $statement->fetch()) {
            $phieu_nhap = new phieu_nhap($this->connection);
            $phieu_nhap->fromDbRow($row);
            $phieu_nhap_s[] = $phieu_nhap;
        }

        return $phieu_nhap_s;
    }

    public function Delete_PN(int $id_pn){
        $statement = $this->connection->prepare("DELETE FROM phieu_nhap WHERE ID_PN = :id");
    
        $statement->execute(['id' => $id_pn]);
    
        $rowCount = $statement->rowCount();
    
        if ($rowCount > 0) {
            $message = "Đã xóa thành công phiếu nhập có ID $id_pn.";
        } else {
            $message = "Không có phiếu xuất nào được xóa với ID $id_pn.";
        }
    
        echo "<script>alert('$message');</script>";
    
}
}