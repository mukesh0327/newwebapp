<?php
if(isset($_GET["cid"])){
    $cid = $_GET["cid"];
	require_once("myconnection.php");
    $obj=new connection;

	$qd = "DELETE FROM `contact` WHERE Contact_Id = $cid";
    mysqli_query($obj->conn,$qd) or die("Delete Query Error :".mysqli_error($obj->conn));
    $Dcount =mysqli_affected_rows($obj->conn);
    
	 
    if($Dcount==0){
		$Dmsg = "Delete Record Not successfully";
        print $Dmsg;
	}
	else{
		$Dmsg = "Delete Record Successfully";
        header("location:admin_contactInfo.php");
	}
}

if(isset($_GET["sid"])){
    $sid = $_GET["sid"];
	require_once("myconnection.php");
    $obj=new connection;

	$qd = "DELETE FROM `signup` WHERE U_EMail = '$sid'";
    mysqli_query($obj->conn,$qd) or die("Delete Query Error :".mysqli_error($obj->conn));
    $Dcount =mysqli_affected_rows($obj->conn);

	 
    if($Dcount==0){
		$Dmsg = "Delete Record Not successfully";
        print $Dmsg;
	}
	else{
		header("location:admin_signInfo.php");
	}
}
?>