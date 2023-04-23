<?php

session_start();

class logincntr extends loginmdl {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;    
    }

    public function pssCrd() {
        $gotArray = $this->vfyLogIn($this->username, $this->password);
        $postCount = count($gotArray);
        if ($postCount === 1) {
            $_SESSION['id'] = $gotArray[0]['id'];
            return true;
        } else {
            return false;
        }
    }
    
}

?>
