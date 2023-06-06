<?php
$a=$_GET["term"];
require_once("defineVariable.php");
$conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or die("Connection Error :".mysqli_connect_error());
$qu=mysqli_query($conn,"select * from add_service where Ser_Name like'$a%'")or die(mysqli_error($conn));
if(mysqli_affected_rows($conn)>0)
{
	$arr=array();
	while($ans=mysqli_fetch_array($qu))
	{
		array_push($arr,array("label" =>$ans['Ser_Name'],"value" =>$ans['Ser_Id']));
	}
	print json_encode($arr);
}
?>