<?php

class loginmdl extends dbh {

    public function vfyLogIn($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? 
            AND password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    
}

?>