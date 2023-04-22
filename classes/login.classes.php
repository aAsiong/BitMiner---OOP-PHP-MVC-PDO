<?php

include './classes/Dbhmdl.class.php';
include './classes/loginmdl.class.php';
include './classes/logincntr.class.php';

if (!$_SERVER[$_POST]) {
    die();
}

$unameErr = $_POST['username'];
$pwdErr = $_POST['password'];

// if (isset($_POST['submit'])) {
//     empty($_POST['username']) ? $unameErr = "Invalid Username Input" : null ;
//     empty($_POST['password']) ? $pwdErr = "Invalid Password Input" : null;

//     if (empty($unameErr) && empty($pwdErr)) {
//         $crtObj = new logincntr($);
//         $crtObj->pssCrd($_POST['username'], $_POST['password']);
//     } else {

//     }
// } else {

// }

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