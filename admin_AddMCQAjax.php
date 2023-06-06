<?php
if(isset($_POST["serid"]))
{
	$sid = $_POST["serid"];
	require_once("myconnection.php");
    $obj=new connection;

	$qs = "SELECT * FROM `add_sub_service` WHERE Ser_Id=$sid";
	$result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
	$affectRes = mysqli_affected_rows($obj->conn);
	if($affectRes==0)
	{
		print '<option value="">-- Select --</option>';
		print "<option value=''>Not sub Service Found</option>";	
	}	
	else
	{		
		print '<option value="">-- Select --</option>';
		while($x = mysqli_fetch_assoc($result))
		{
		?>
		<option value="<?php echo $x["SubSer_Id"]; ?>">
			<?php echo $x["SubS_Name"];  ?>
		</option>
		<?php
		}
	} 
}
//if(isset($_POST["MCQForm"])){
	$serId = $_POST["ser"];
	if(isset($_POST["subSer"])){
	$subSerId = $_POST["subSer"];
	}
	$ques = $_POST["que"];
	$opt1 = $_POST["ans1"];
	$opt2 = $_POST["ans2"];
	$opt3 = $_POST["ans3"];
	$opt4 = $_POST["ans4"];
	$cans = $_POST["cAns"];	
//print $serId."</br>".$subSerId."</br>".$ques."</br>".$opt1."</br>".$opt2."</br>".$opt3."</br>".$opt4."</br>".$cans;
//die();
	if($serId==""){
		print "2";//Please Select Root Service
	}
	else
	{	
	require_once("myconnection.php");
    $obj=new connection;
		$qi = "INSERT INTO `add_mcq`(`Ser_Id`, `SubSer_Id`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Correct Answer`)
		VALUES ('$serId','$subSerId','$ques','$opt1','$opt2','$opt3','$opt4','$cans')";
		
		mysqli_query($obj->conn,$qi) or die("</br>MCQ Indertion Query Error".mysqli_error($obj->conn));
		$ans = mysqli_affected_rows($obj->conn);
		if($ans == 1){
			print "1";//MCQ Add Successfully
		}	
		else{
			print "0";//MCQ Not Add Successfully! Please try Again.
		}
	}
//}
?>
