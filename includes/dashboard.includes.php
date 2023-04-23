<?php

if(empty($_SESSION['id'])) {

    include './classes/Dbh.classes.php';
    include './classes/dashboard.mdl.classes.php';
    include './classes/dashboard.cntr.classes.php';
    
    $crtObj = new dashboardcntr();
    $dtArray = $crtObj->gtInfo($_SESSION['id']);
} else {
    header('Location: ../btminer-mvc/index.php?err=Invalid_Access');
}

?>