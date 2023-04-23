<?php

if (!isset($_POST['submit'])) {
    die();
}

include './classes/Dbhmdl.class.php';
include './classes/loginmdl.class.php';
include './classes/logincntr.class.php';

$username = $_POST['username'];
$password = $_POST['password'];
$unameErr = $pwdErr = $pgStt = '';

empty($_POST['username']) ? $unameErr = "Invalid Username Input" : null ;
empty($_POST['password']) ? $pwdErr = "Invalid Password Input" : null;

if (empty($unameErr) && empty($pwdErr)) {
    $crtObj = new logincntr($unameErr, $pwdErr);
    $pgStt = $crtObj->pssCrd();

    if ($pgStt) {
        header('Location: ../btminer-mvc/dashboard.php');
    } else {
        header('Location: ../btminer-mvc/index.php?err=Record_Not_Found');
    }
} else {

}

?>