<?php
class phieu_xuat
{
    private PDO $connection;

    public int $ID_PX;
    public DateTime $Ngay_PX;
    
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function Them_PX(int $id_px, DateTime $ngay_pn, array $hh_sl): bool
    {
        $statement = $this->connection->prepare('INSERT INTO phieu_xuat (ID_PX, Ngay_PN) 
                                                        VALUES (:id_px, :ngay_pn)'); 
        $statement->execute([
            'id_px' => $id_px,
            'ngay_pn' => $ngay_pn,
            'hh_sl' => $hh_sl,
            ]);

        return $statement->rowCount() === 1;
        }
    public function Hien_Thi_PX(): array
    {
            $phieu_xuat_s = [];
    
            $statement = $this->connection->prepare('SELECT * FROM phieu_xuat ');
            $statement->execute();
    
            while ($row = $statement->fetch()) {
                $phieu_xuat = new phieu_xuat($this->connection);
                $phieu_xuat->fromDbRow($row);
                $phieu_xuat_s[] = $phieu_xuat;
            }
    
            return $phieu_xuat_s;
    }
    public function fromDbRow(array $row): void
    {
        $this->ID_PX = $row['ID_PX'];
        $this->Ngay_PX = DateTime::createFromFormat('Y-m-d', $row['Ngay_PX']);
   
        
    }
    public function Tim_PX_ID($keyword){
        $sql = "SELECT *
        FROM phieu_xuat
        WHERE ID_PX = :keyword";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':keyword'=>$keyword]);
        while ($row = $statement->fetch()) {
            $phieu_xuat = new phieu_xuat($this->connection);
            $phieu_xuat->fromDbRow($row);
            $phieu_xuat_s[] = $phieu_xuat;
        }

        return $phieu_xuat_s;
    }
    public function Delete_PX(int $id_px){
            $statement = $this->connection->prepare("DELETE FROM phieu_xuat WHERE ID_PX = :id");
        
            $statement->execute(['id' => $id_px]);
        
            $rowCount = $statement->rowCount();
        
            if ($rowCount > 0) {
                $message = "Đã xóa thành công phiếu xuất có ID $id_px.";
            } else {
                $message = "Không có phiếu xuất nào được xóa với ID $id_px.";
            }
        
            echo "<script>alert('$message');</script>";
        
    }
    
}