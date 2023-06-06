<?php
$a = $_GET("term");
    require_once("defineVariable.php");
    $conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or 
    die("Connection Error :".mysqli_connect_error());
    $qs = "SELECT * FROM `add_service` WHERE Ser_Name like '$a%' ";
if()
?>