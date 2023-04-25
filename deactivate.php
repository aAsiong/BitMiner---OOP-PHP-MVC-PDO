<?php

$DB_HOST = "localhost";
$DB_USER = "root"; 
$DB_PASS = ""; 
$DB_NAME = "sampledb";

$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

if (!$con)
{
    die( "Unable to select database");
} else {
    echo ("CONNECTED");
}

$getVal = $_GET['id'];

$query = "UPDATE mchntbl SET status = false WHERE wmosID = '$getVal'";
$result = mysqli_query($con,$query);
if ($result=mysqli_query($con, $query))
    echo "Success";
else
    echo "NO";
?>