<?php

Class registercntr extends registermdl {
    private $id;
    private $username;
    private $password;
    private $wemosID;
    private $wemosName;

    public function __construct($id, $username, $password, $wemosID, $wemosName) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->wemosID = $wemosID;
        $this->wemosName = $wemosName;
    }

    public function crtUsr() {
        try {
            $dtts = array($this->id, $this->username, $this->password, $this->wemosID, $this->wemosName);
            $this->crtRcrd($dtts);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }
    
}

?>