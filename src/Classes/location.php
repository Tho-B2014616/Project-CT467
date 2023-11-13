<?php
class ViTri
{
    private PDO $connection;

    public int $ID_VT = -1;
    public int $So_ke;
    public int $So_lo;


    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }



    public function Them_VT(int $So_ke, int $So_lo): bool
    { // them vi tri


        $statement = $this->connection->prepare('INSERT INTO vi_tri (So_ke, So_lo) 
                                                        VALUES (:So_ke, :So_lo)');

        $statement->execute([
            'So_ke' => $So_ke,
            'So_lo' => $So_lo
        ]);


        return $statement->rowCount() === 1;
    }

    public function Hien_thi_VT(): array // hien thi vi tri
    {
        $locations = [];

        $statement = $this->connection->prepare('SELECT * FROM vi_tri');
        $statement->execute();

        while ($row = $statement->fetch()) {
            $vitri = new ViTri($this->connection);
            $vitri->fromDbRow($row);
            $locations[] = $vitri;
        }

        return $locations;
    }

    public function fromDbRow(array $row): void
    {
        $this->ID_VT = $row['ID_VT'];
        $this->So_ke = $row['So_ke'];
        $this->So_lo = $row['So_lo'];
    }

    public function Tim_VT_ID(int $id): ?ViTri // tim vi tri theo id
    {
        $statement = $this->connection->prepare('SELECT * FROM vi_tri WHERE ID_VT = :id_vt');
        $statement->execute(['id_vt' => $id]);
        $row = $statement->fetch();

        if ($row === false) {
            return null;
        }

        $vitri = new ViTri($this->connection);
        $vitri->fromDbRow($row);
        return $vitri;
    }

    public function Delete_VT(int $id): bool // xoa vi tri
    {
        try {
            // Check if there are any associated products at the given location
            $checkProductsQuery = 'SELECT COUNT(*) FROM hang_hoa WHERE ID_VT = :id_vt';
            $checkProductsStatement = $this->connection->prepare($checkProductsQuery);
            $checkProductsStatement->execute(['id_vt' => $id]);
    
            $numProducts = $checkProductsStatement->fetchColumn();
    
            if ($numProducts > 0) {
                // If there are associated products, do not delete the location
                return false;
            }
    
            // If there are no associated products, proceed with the deletion
            $deleteLocationQuery = 'DELETE FROM vi_tri WHERE ID_VT = :id_vt';
            $deleteLocationStatement = $this->connection->prepare($deleteLocationQuery);
            $deleteLocationStatement->execute(['id_vt' => $id]);
    
            return true;
        } catch (PDOException $e) {
            // Handle the exception (log it, return false, etc.)
            return false;
        }
    }


    public function Update_Ke(int $So_ke, int $So_lo, int $ID_VT): bool  // update ke
    {
        $statement = $this->connection->prepare('UPDATE vi_tri SET So_ke= :So_ke, So_lo= :So_lo WHERE ID_VT = :ID_VT;');
        $statement->execute([
            'So_ke' => $So_ke,
            'So_lo' => $So_lo,
            'ID_VT' => $ID_VT,
        ]);

        return true;

    }


    public function Tim_VT(string $tensp): array
    {
        $statement = $this->connection->prepare(
            'SELECT hh.Ten_SP, vt.ID_VT, vt.So_ke, vt.So_lo FROM hang_hoa hh join vi_tri vt where hh.Ten_SP = :tensp and hh.ID_HH = vt.ID_VT;'
        );
        $statement->execute(['tensp' => $tensp . '%']);
        $row = $statement->fetch();

        $locations = [];
        while ($row = $statement->fetch()) {
            $vitri = new ViTri($this->connection);
            $vitri->fromDbRow($row);
            $locations[] = $vitri;
        }

        return $locations;
    }
}
