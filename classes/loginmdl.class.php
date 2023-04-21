<?php

class loginmdl extends dbhmdl {

    public function vfyLogIn($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? 
            AND password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function gtRcrds($id) {
        $sql = "SELECT wmosID, wmosName, dt_mine 
        FROM mchntbl 
        WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

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