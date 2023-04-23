<?php

Class registermdl extends dbhmdl {

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
    
}

?>