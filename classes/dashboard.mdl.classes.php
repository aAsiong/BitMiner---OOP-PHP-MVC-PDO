<?php 

Class dashboardmdl extends dbh {

    public function gtRcrds($id) {
        $sql = "SELECT wmosID, wmosName, dt_mine 
        FROM mchntbl 
        WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    
}

?>