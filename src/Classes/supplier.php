<?php
class NhaCungCap
{
    private PDO $connection;

    public int $ID_NCC = -1;
    public string $Ten_NCC;
    public string $SDT;
    public string $Email;


    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function Them_NCC(string $Ten_NCC, string $SDT, string $Email): bool
    {
        $statement = $this->connection->prepare('INSERT INTO nha_cung_cap (Ten_NCC, SDT, Email) 
        VALUES (:ten_ncc, :sdt, :email)');
        $statement->execute([
            'ten_ncc' => $Ten_NCC,
            'sdt' => $SDT,
            'email' => $Email,
        ]);

        return $statement->rowCount() === 1;
    }

    public function Hien_thi_NCC(): array
    {
        $nccs = [];

        $statement = $this->connection->prepare('SELECT * FROM nha_cung_cap');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $ncc = new NhaCungCap($this->connection);
            $ncc->fromDbRow($row);
            $nccs[] = $ncc;
        }

        return $nccs;
    }
    public function fromDbRow(array $row): void
    {
        $this->ID_NCC = $row['ID_NCC'];
        $this->Ten_NCC = $row['Ten_NCC'];
        $this->SDT = $row['SDT'];
        $this->Email = $row['Email'];
    }



    public function Delete_NCC(int $id_ncc) //Xóa nhà cung cấp
    {
        $statement = $this->connection->prepare('DELETE FROM nha_cung_cap WHERE ID_NCC = :id_ncc');
        $statement->execute(['id_ncc' => $id_ncc]);
        $statement->execute();
        $rowCount = $statement->rowCount();

        if ($rowCount > 0) {
            $message = "Đã xóa thành công hàng hóa có ID $id_ncc.";
        } else {
            $message = "Không có hàng hóa nào được xóa với ID $id_ncc.";
        }

        echo "<script>alert('$message');</script>";
    }



    public function Update_NCC(int $ID_NCC, string $Ten_NCC, string $SDT, string $Email): bool
    {
        $statement = $this->connection->prepare(
            'UPDATE nha_cung_cap SET Ten_NCC=:Ten_NCC, SDT=:SDT, Email=:Email WHERE ID_NCC = :ID_NCC'
        );
        $statement->execute([
            'Ten_NCC' => $Ten_NCC,
            'SDT' => $SDT,
            'Email' => $Email,
            'ID_NCC' => $ID_NCC
        ]);

        return true;
    }

    public function Tim_NCC_ID(int $id): array
    {
        $nccs = [];
        $statement = $this->connection->prepare('SELECT * FROM nha_cung_cap WHERE ID_NCC = :id_ncc');
        $statement->execute(['id_ncc' => $id]);
        $row = $statement->fetch();

        while ($row = $statement->fetch()) {
            $ncc = new NhaCungCap($this->connection);
            $ncc->fromDbRow($row);
            $nccs[] = $ncc;
        }

        return $nccs;
    }



    public function Tim_NCC_Ten(string $Ten_NCC): array
    {
        $nccs = [];
        $statement = $this->connection->prepare(
            'SELECT * FROM hang_hoa hh join nha_cung_cap ncc where hh.Ten_SP like :tenNCC and hh.ID_HH = ncc.ID_NCC'
        );
        $statement->execute(['tenNCC' => '%' . $Ten_NCC . '%']);
        $row = $statement->fetch();
        while ($row = $statement->fetch()) {
            $ncc = new NhaCungCap($this->connection);
            $ncc->fromDbRow($row);
            $nccs[] = $ncc;
        }

        return $nccs;
    }
}
