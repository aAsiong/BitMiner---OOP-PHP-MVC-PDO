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

if(isset($_GET['id'])) {
    $getVal = $_GET['id'];
    $val = 0;
    
    $query = "SELECT * FROM mchntbl WHERE wmosID = '$getVal'";
    $check=mysqli_query($con,$query);
    $row=mysqli_num_rows($check);
    while($row=mysqli_fetch_array($check))
    {
        $val = $row['dt_mine'] ;
    }
    
    $val += 1;
    
    $query = "UPDATE mchntbl SET dt_mine = '$val' WHERE wmosID = '$getVal'";
    $result = mysqli_query($con,$query);
    if ($result=mysqli_query($con, $query))
        echo "Success";
    else
        echo "NO";
}
else {
    echo "No Val";
}
?>