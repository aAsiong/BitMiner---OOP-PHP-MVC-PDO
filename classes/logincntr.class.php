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

    public function gtInfo($id) {
        $details = $this->gtRcrds($id);
        return $details;
    }

    public function crtUsr($username, $password, $wemosID, $wemosName) {
        try {
            $id = mt_rand(10000,99999);
            $dtts = array($id, $username, $password, $wemosID, $wemosName);
            $this->crtRcrd($dtts);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }
}

function chckDtts($gt_Dtts) {
    $ddts = '';
    foreach ($gt_Dtts as $dtts) {
        if (empty($ddts)) {
            header("Location: ./index.php?err=" . $ddts);
            return false;
            die();
        }
        return true;
    }
}

?>
