<?php

Class registermdl extends dbh {

    public function crtRcrd($dtts) {
        $sql = "INSERT INTO users(id, username, password) 
        VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$dtts[0], $dtts[1], $dtts[2]]);
        
        $sql = "INSERT INTO mchntbl(id, wmosID, wmosName, dt_mine) 
        VALUES(?, ?, ?, '0')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$dtts[0], $dtts[3], $dtts[4]]);
    }

    public function ftchID($id) {
        $sql = "SELECT * FROM mchntbl WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if ($stmt->execute([$id])) {
            $stmt = null;
            header('Location: ./register.php?err=SQL_Error_Not_Registered');
            exit();
        }

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>