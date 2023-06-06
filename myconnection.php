<?php
include_once("defineVariable.php");
class connection
{
public $conn;
function __construct()
{
$this->conn= mysqli_connect(DBhost,DBuser,DBpass,DBname) or die("Connection Error :".mysqli_connect_error());
}
function __destruct()
	{
	mysqli_close($this->conn);
	}
}
?>