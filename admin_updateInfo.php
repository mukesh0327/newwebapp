<?php
session_start();

require_once("myconnection.php");
    $obj=new connection;
$sid=$_POST["sid"];

$q="select * from add_service where Ser_Id=$sid";
$res=mysqli_query($obj->conn,$q)or die("error in query".mysqli_error($obj->conn));
$x=mysqli_fetch_array($res);
mysqli_close($obj->conn);

if(isset($_POST["s1"]))
{
$sname=$_POST["sername"];
$err=$_FILES["serpic"]["error"];
require_once("myconnection.php");
    $obj=new connection;
	 if($err==0)
	{
		$date = date_create('', timezone_open('Asia/Kolkata'));
		$tstamp=date_timestamp_get($date);
		$fn=$tstamp.$_FILES["serpic"]["name"];
		$tname=$_FILES["serpic"]["tmp_name"];
		$resp=move_uploaded_file($tname,"adminUploads/$fn");
		if($resp!=true)
		{
			$fn="noimage.jpg";
		}
	} 
	else
	{
		$fn=$x[3];
	}	
	$q="update add_service set ser_name='$sname',ser_pic='$fn' where Ser_Id ='$sid'";	
	mysqli_query($obj->conn,$q)or die("error in query".mysqli_error($obj->conn));	
	$count=mysqli_affected_rows($obj->conn);	
	if($count==1)
	{
		$msg=header("location:manageser.php");
	}
	else	
	{
        $msg="service not uploaded successfully";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Update service</title>
<?php
require_once("externalFile.php");
?>
</head>
<body>
<?php
require_once("admin_header.php");
?>	
	<div class="login">
		<div class="container">
			<h2>Update Service</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="POST" enctype="multipart/form-data">
					<input type="text" name="sername" placeholder="Service name" required=" " value="<?php print $x[1];?>" ><br/>
					<?php
					print "<img src='adminUploads/$x[3]' height='50'>"
				    ?><br/>
					<b>Choose new image,if required</b><br/>
					<input type="file" name="serpic"></br>
					<input type="submit" name="s1" value="Update Service">
				    <br/>
			        <?php
					if(isset($msg))
					{
						print"$msg";
					}
					?>
				</form>
			</div>
		</div>
	</div>
<?php
require_once("admin_footer.php");
?>
</body>
</html>