<?php
//sleep(2);
if(isset($_POST["serid"])){
	$worId = $_POST["serid"];
	require_once("myconnection.php");
    $obj=new connection;

	$qs = "SELECT * FROM `add_sub_service` WHERE Ser_Id = '$worId'";
	$result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
	$affectRes = mysqli_affected_rows($obj->conn);
	if($affectRes==0)
	{
		print"<option value=''>-- Select --</option>";
		print"<option value=''>No Any Sub Work Available </option>";
	}
	else 
	{   
		print"<option value=''>-- Select --</option>";
		while($y = mysqli_fetch_assoc($result))
		{
		?> 
			<option value="<?php echo $y['SubSer_Id']; ?>">
				<?php echo $y['SubS_Name']; ?>
			</option>;
		<?php
		}
	}  
} 
?>
