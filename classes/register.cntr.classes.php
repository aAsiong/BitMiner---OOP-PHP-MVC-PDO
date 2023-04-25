<?php

Class registercntr extends registermdl {

    private $id;
    private $username;
    private $password;
    private $repassword;
    private $wemosID;
    private $wemosName;

    public function __construct($id, $username, $password, $repassword, $wemosID, $wemosName) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->wemosID = $wemosID;
        $this->wemosName = $wemosName;
    }

    private function crtUsr() {
        try {
            $dtts = array($this->id, $this->username, $this->password, $this->wemosID, $this->wemosName);
            $this->crtRcrd($dtts);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function chckCrds() {
        if ($this->emptyInput()) {
            return false;
        }

        if ($this->mtchPss()) {
            $pwdErr = "Password Not Matching!";
            $rePwdErr = "Password Not Matching!";
            return false;
        }

        if ($this->chckWmId()) {
            $wMosIDErr = "Invalid WeMos ID";
            return false;
        }

        if ($this->chckWmNm()) {
            $wMosNameErr = "Invalid WeMos Name";
            return false;
        }
        
        // Check if rand ID was duplicated
        do {
            $id = mt_rand(10000,99999);
            $chck = $this->ftchID($id);
        } while($chck);

        $pgStt = $this->crtUsr();
        return $pgStt;
    }

    private function emptyInput() {
        empty($this->username) ? $unameErr = "Invalid Username Input" : null ;
        empty($this->password) ? $pwdErr = "Invalid Password Input" : null;
        empty($this->repassword) ? $rePwdErr = "Invalid Input" : null ;
        empty($this->wemosID) ? $wMosIDErr = "Invalid W. ID Input" : null ;
        empty($this->wemosName) ? $wMosNameErr = "Invalid W. Name Input" : null ;

        if (empty($unameErr) && empty($pwdErr) && empty($rePwdErr) 
            && empty($wMosIDErr) && empty($wMosNameErr)) {
            return false;
        } else {
            return true;
        }
    }

    private function mtchPss() {
        if ($this->password == $this->repassword) {
            return false;
        } else {
            return true;
        }
    }

    private function chckWmId() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->wemosID)) {
            return false;
        } else {
            return true;
        }
    }

    private function chckWmNm() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->wemosName)) {
            return false;
        } else {
            return true;
        }
    }
}

?>