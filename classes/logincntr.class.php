<?php

session_start();

class logincntr extends loginmdl {

    public function pssCrd($username, $password) {
        $gotArray = $this->vfyLogIn($username, $password);
        $postCount = count($gotArray);
        if ($postCount === 1) {
            $_SESSION['id'] = $gotArray[0]['id'];
            header('Location: ../btminer-mvc/dashboard.php');
        } else {
            header('Location: ../btminer-mvc/index.php?e=1');
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

?>
