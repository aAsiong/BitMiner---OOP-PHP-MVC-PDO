<?php

$unameErr = $pwdErr = $pgStt = '';

if (isset($_POST['submit'])) {
    
    include "../classes/dbh.classes.php";
    include '../classes/login.mdl.classes.php';
    include '../classes/login.cntr.classes.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    empty($_POST['username']) ? $unameErr = "Invalid Username Input" : null ;
    empty($_POST['password']) ? $pwdErr = "Invalid Password Input" : null;

    if (empty($unameErr) && empty($pwdErr)) {
        $crtObj = new logincntr($username, $password);
        $pgStt = $crtObj->pssCrd();

        if ($pgStt) {
            header('Location: ../dashboard.php');
        } else {
            header('Location: ../index.php?err=Record_Not_Found');
        }
    } else {
        
        header('Location: ../btminer-mvc/index.php?err=Record_Not_Found');
    }
    
}

?>