<?php

if (!isset($_POST['submit'])) {
    die();
}

include './classes/Dbhmdl.class.php';
include './classes/registermdl.class.php';
include './classes/registercntr.class.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['rpassword'];
    $wMosID = $_POST['wemosID'];
    $wMosName = $_POST['wemosName'];
    $unameErr = $pwdErr = $rePwdErr = $wMosIDErr = $wMosNameErr = $pgStt = '';

    if (isset($_POST['submit'])) {
        empty($username) ? $unameErr = "Invalid Username Input" : null ;
        empty($password) ? $pwdErr = "Invalid Password Input" : null;
        empty($repassword) ? $rePwdErr = "Invalid Input" : null ;
        empty($wMosID) ? $wMosIDErr = "Invalid W. ID Input" : null ;
        empty($wMosName) ? $wMosNameErr = "Invalid W. Name Input" : null ;

        if (empty($unameErr) && empty($pwdErr) && empty($rePwdErr) && empty($wMosIDErr) && empty($wMosNameErr)) {
            if ($password == $repassword) {
                $id = mt_rand(10000,99999);
                $crtObj = new registercntr($id, $username, $password, $wMosID, $wMosName);
                $pgStt = $crtObj->crtUsr();

                $pgStt ? header('Location: ./index.php?scc=Register_Successful') 
                        : header('Location: ./register.php?err=Register_Unsuccessful');
            } else {
                $pwdErr = "Password Not Matching!";
                $rePwdErr = "Password Not Matching!";
            }
        }
    }
}

?>