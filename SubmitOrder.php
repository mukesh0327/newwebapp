<?php 
session_start();
/* print "<pre>"; 
print_r($_POST);
die();  */ 
require_once("myconnection.php");
$obj=new connection;

if(isset($_POST["subBtn"])){
    $wId=$_POST["worId"];
	$sser=$_POST["subser"]; 
    $ohome = $_POST["ownhome"];
    $str = $_POST["start"];
    $nat = $_POST["nature"];
    $cname = $_POST["name"];
    $cemail = $_POST["email"];
    $cphone = $_POST["phone"];
    $caddress = $_POST["address"];
    $cpincode = $_POST["pincode"];
	$swid = $_POST["swId"];
/* print $worId."<br>".$subser."<br>".$ownhome."<br>".$start."<br>".$nature."<br>".$name."<br>".$email."<br>".$phone."<br>".$address."<br>".$pincode."<br>".$swid;
die();
$qs = "insert into orderdetails values('$worId','$subser','$name','$email','$phone','$address','$pincode','$ownhome','$start','$nature')"; */
$qs = "INSERT INTO `orderdetails`(`Service`, `SubService`, `Name`, `Email`, `Phone`, `address`, `Pincode`, `Ownhome`, `Start`, `Natureproject`, `worker_Id`, `worker_Response`)
 values('$wId','$sser','$cname','$cemail','$cphone','$caddress','$cpincode','$ohome','$str','$nat','$swid','NILL')";
mysqli_query($obj->conn,$qs) or die("error in query". mysqli_error($obj->conn));
$count = mysqli_affected_rows($obj->conn);
if($count==1){
       $msg="1";
	   header("location:OrderStatus.php?opMsg=$msg");
    }
    else{
        $msg="0";  
		header("location:OrderStatus.php?opMsg=$msg");	
    }
}

/*
	print "<pre>";
	print_r($_SESSION); 
	print_r($_GET); 
	die();

	
	$quwid = "UPDATE `orderdetails` SET `worker_Id`='$wId' WHERE Order_Id = $oId";
	mysqli_query($obj->conn,$quwid);
	$ocount = mysqli_affected_rows($obj->conn);
	if($ocount==1)
	{
		$worIdMsg = "Order Place Success fully";
	}
	else	
	{
		$worIdMsg = "Order Place Not successfully";
		print $worIdMsg;
	}
	
	
	$qso = "SELECT * FROM `orderdetails` WHERE Order_Id = '$oId'";
	$qsoResult = mysqli_query($obj->conn,$qso) or die("Select Order Detail Query Error :".mysqli_error($obj->conn));
	$count = mysqli_affected_rows($obj->conn);

	if($count==1)
	{
		$sWorkerMsg="";
		$ordDetail = mysqli_fetch_array($qsoResult); 
		
	}
	else
	{
		$sWorkerMsg = "Not Any Record Available";
	}
*/

?>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Available Workers</title>  
		<style>
			p {    font-size:19px;    }           
		</style>
</head>

<body>
    <?php
require_once("header.php");    
?>
    <main role="availableWorker" id="AvailableWorker">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Order Preview</h1>
				</div>
            </div>
			
			<div class="row">
				 <div class="col-md-12">
				 <h5 class="text-center mb-3">Your Detail</h5>
					<div class="row">
						<div class="col-md-3">
							<p class="text-muted">Your Name</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cname"]; ?></p>
							
						</div> 
						<div class="col-md-3">
							<p class="text-muted">Mobile No.</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cphone"]; ?></p>                    
						</div> 
						<div class="col-md-3">
							<p class="text-muted">E-mail</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cemail"]; ?></p>                    
						</div> 
						<div class="col-md-3">
							<p class="text-muted">Address</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cadd"]; ?></p>                    
						</div> 
						<div class="col-md-3">
							<p class="text-muted">Pin Code</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cpin"]; ?></p>                    
						</div>  
					</div> 
				</div>
				</div>
				<hr>	
				<div class="row">	
				<div class="col-md-12">
				<h5 class="text-center mb-3">Order Detail</h5>
					<div class="row">
						<div class="col-md-3">
							<p class="text-muted">Select Service</p>
						</div>
						<div class="col-md-3">
							<p class="">
								<?php
								 	$serid = $_POST["cwid"]; 
								 	/* Select Service Information Code Start */
									$qs = "SELECT * FROM `add_service` WHERE Ser_Id = $serid";
									$sconResult = mysqli_query($obj->conn,$qs) or die("Select Query from add sevices Error :".mysqli_error($obj->conn));
									$count = mysqli_affected_rows($obj->conn);
										if($count==1)
										{
											 $a = mysqli_fetch_array($sconResult);
											 $smsg = $a['Ser_Name'];
										}
										else
										{
											 $smsg =  "No Service Name";
										}
										/* Select Service Information Code End */
										if(isset($_POST["csubw"])){
										$suSerId = $_POST["csubw"];
										/* Select Sub Service Information Code Start */
										$qs = "SELECT * FROM `add_sub_service` WHERE SubSer_Id = '$suSerId'";
										$ssconResult = mysqli_query($obj->conn,$qs) or die("Select Query from add Sub Services Error :".mysqli_error($obj->conn));
										$countR = mysqli_affected_rows($obj->conn);
										if($countR==1)
										{
											 $z = mysqli_fetch_array($ssconResult);
											 $ssmsg = $z['SubS_Name'];
										}
										else
										{
											 $ssmsg =  "No Sub Service Name";
										} 
										print  $smsg." / ".$ssmsg;
									}
									else{
										print  $smsg;
									}
									/* Select Sub Service Information Code End */
									
									?>
							</p>                    
						</div> 
						<div class="col-md-3">
							<p class="text-muted">Worker Name</p>
						</div>
						<div class="col-md-3">
                        <?php
                        /* Select Worker Information Code Start */ 
                        //print $wId."</br>";
                        $wId = $_POST["swid"];
                        $qsw = "SELECT * FROM `signup` WHERE U_EMail='$wId'";
                        $qswResult = mysqli_query($obj->conn,$qsw) or die("Select Worker Query Error OD:".mysqli_error($obj->conn));
                        $count = mysqli_affected_rows($obj->conn);
                        $wName = mysqli_fetch_array($qswResult);
                        //echo "<pre>"; 
                        //print_r($wName);
                        //die();                                
                        if($count==1)
                        {
                            $msg = $wName["U_Name"];
                            print "<p>".$msg."</p>";
                        }
                        else
                        {
                            $msg = "Not Available";
                            print "<p>".$msg."</p>";
                        }
                        /* Select Worker Information Code End */                                
                        ?>						                    
						</div> 
						<div class="col-md-3">
							<p class="text-muted">Worker Response</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print "waiting" ?></p>                    
						</div>
						
						<div class="col-md-3">
							<p class="text-muted">Date</p>
						</div>
						<div class="col-md-3">
							<p class=""><?php print $_POST["cdos"]; ?></p>                    
						</div>
					</div>					
				</div>
				<div class="col-md-12">
					<form name="selServiceForm" method="post" action="">
					        <input style="display:none;" name="worId" value="<?php echo $_POST["cwid"]; ?>">
                            <input style="display:none;" name="subser" value="<?php if(isset($_POST["csubw"])){ echo $_POST["csubw"];} ?>">  
						    <input style="display:none;" name="ownhome" value="<?php echo $_POST["cown"]; ?>">
						    <input style="display:none;" name="start" value="<?php echo $_POST["cdos"]; ?>">
						    <input style="display:none;" name="nature" value="<?php echo $_POST["cnewold"]; ?>">  
						    <input style="display:none;" name="name" value="<?php echo $_POST["cname"]; ?>">
						    <input style="display:none;" name="email" value="<?php echo $_POST["cemail"]; ?>">
						    <input style="display:none;" name="phone" value="<?php echo $_POST["cphone"]; ?>">
						    <input style="display:none;" name="address" value="<?php echo $_POST["cadd"]; ?>">
						    <input style="display:none;" name="pincode" value="<?php echo $_POST["cpin"]; ?>">	
						    <input style="display:none;" name="swId" value="<?php echo $_POST["swid"]; ?>">	
				            <input type="submit" class="btn btn-yellow" name="subBtn" value="Submit">
					</form>
				</div>
            </div>       
        </div>
    </main>
    <?php
require_once("footer.php");    
?>
</body>

</html>