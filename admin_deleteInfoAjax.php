<?php
/*Code for Delete Contact Detail*/
if(isset($_POST["cid"])){
    $cid = $_POST["cid"];
	require_once("defineVariable.php");
    $conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or 
	die("Connection Error :".mysqli_connect_error());

	$qdc = "DELETE FROM `contact` WHERE Contact_Id = $cid";
    mysqli_query($conn,$qdc) or die("Delete Query Error :".mysqli_error($conn));
    $Dcount =mysqli_affected_rows($conn);
    mysqli_close($conn);   
}

/*Code for Delete Service Detail*/
if(isset($_POST["sid"])){
	$serid=$_POST["sid"];
	require_once("defineVariable.php");
	$conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or 
	die("Connection Error :".mysqli_connect_error());
	$qs="select * from add_service where Ser_Id=$serid";
	$res=mysqli_query($conn,$qs)or die("error in query".mysqli_error($conn));
    if(mysqli_affected_rows($conn))
	{
		$an=mysqli_fetch_array($res);
		if($an["Ser_Pic"]!="noimage.jpg")
		{
			unlink("adminUploads/$an[Ser_Pic]");
		}
		
		$q="delete from add_service where Ser_Id=$serid";
        mysqli_query($conn,$q)or die("error in query".mysqli_error($conn));
	    $count=mysqli_affected_rows($conn);
		mysqli_close($conn);
	}
}

/*Code for Delete Sub Service Detail*/
if(isset($_POST["ssid"])){
	$serid=$_POST["ssid"];
	require_once("defineVariable.php");
	$conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or 
	die("Connection Error :".mysqli_connect_error());
	
	$qs="select* from add_sub_service where SubSer_Id=$serid";
    $res=mysqli_query($conn,$qs)or die("error in query".mysqli_error($conn));
	if(mysqli_affected_rows($conn))
	{
		$an=mysqli_fetch_array($res);
		if($an["SubS_Pic"]!="noimage.jpg")
		{
			unlink("adminUploads/$an[SubS_Pic]");
		}
		
		$q="delete from add_sub_service where SubSer_Id=$serid";
        mysqli_query($conn,$q)or die("error in query".mysqli_error($conn));
	    $count=mysqli_affected_rows($conn);
	    mysqli_close($conn);
	}
}
?>