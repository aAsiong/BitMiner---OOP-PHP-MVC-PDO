<?php

$unameErr = $pwdErr = $rePwdErr = $wMosIDErr = $wMosNameErr = $pgStt = '';

if(isset($_POST['submit'])) {
    include './classes/dbh.classes.php';
    include './classes/register.mdl.classes.php';
    include './classes/register.cntr.classes.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['rpassword'];
    $wMosID = $_POST['wemosID'];
    $wMosName = $_POST['wemosName'];
    
    $crtObj = new registercntr($id, $username, $password, $repassword, $wMosID, $wMosName);
    $pgStt = $crtObj->chckCrds();
    
    $pgStt ? header('Location: ./index.php?scc=Register_Successful') 
        : header('Location: ./register.php?err=Register_Unsuccessful');

    // if (empty($unameErr) && empty($pwdErr) && empty($rePwdErr) 
    //     && empty($wMosIDErr) && empty($wMosNameErr)) {
    //     if ($password == $repassword) {
            
    //         $chck = false;
    //         do {
    //             $id = mt_rand(10000,99999);
    //             $chck = $this->ftchRcrd($id);
    //         } while($chck);
            
    //         $pgStt = $crtObj->crtUsr();

    //         $pgStt ? header('Location: ./index.php?scc=Register_Successful') 
    //                 : header('Location: ./register.php?err=Register_Unsuccessful');
    //     } else {
    //         $pwdErr = "Password Not Matching!";
    //         $rePwdErr = "Password Not Matching!";
    //     }
    // }
}

?>