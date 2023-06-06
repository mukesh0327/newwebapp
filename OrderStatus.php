<?php 
session_start();
/* print "<pre>"; 
print_r($_POST);
die();  */ 
require_once("myconnection.php");
$obj=new connection;
$userId = $_SESSION["userdata"]["U_EMail"];
print $userId;
$qsc = "SELECT * FROM `orderdetails` WHERE Email='$userId'";
$qsoResult = mysqli_query($obj->conn,$qsc) or die("Select Order Query Error :".mysqli_error($obj->conn));
$count = mysqli_affected_rows($obj->conn);
if($count>0)
{
	print "<br>".$count;
//$orderData = mysqli_fetch_array($qswResult);
	/* print "<pre>"; 
	print_r($abc);
	die(); */ 	
}
else
{
	print "Not Any Record Available";
	die;
}

?>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Order Status</title>  
		<style>
			p {    font-size:19px;    }           
		</style>
</head>

<body>
    <?php
require_once("header.php");    
?>
    <main role="orderStatus" id="OrderStatus">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Order Status</h1>
				</div>
            </div>
			
			<?php if(isset($_GET["opMsg"])){
			if($_GET["opMsg"]=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Your order placed successfully
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Your order placed not successfully! Please Try Again.
            </div>
			<?php } 
            }?>

			<div class="row">
			<?php
				while($od = mysqli_fetch_array($qsoResult)){					
			?>
				 <div class="col-md-6">
				 <h5 class="text-center m-3">Your Detail</h5>
						<p class="text-muted">Order Number</p>
						<p class=""><?php echo $od['Order_Id']; ?></p>
						<hr>
						<p class="text-muted">Your Name</p>
						<p class=""><?php echo $od['Name']; ?></p>
						<hr>
						<p class="text-muted">Mobile No.</p>
						<p class=""><?php print $od["Phone"]; ?></p>                    
						<hr>
						<p class="text-muted">E-mail</p>
						<p class=""><?php print $od["Email"]; ?></p>                    
						<hr>
						<p class="text-muted">Address</p>
						<p class=""><?php print $od["address"]; ?></p>
						<hr>
						<p class="text-muted">Pin Code</p>
						<p class=""><?php print $od["Pincode"]; ?></p>                    
						<hr>
						<p class="text-muted">Select Service</p>
						<p class="">
								<?php
								 	$serid = $od["Service"]; 
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
										if(isset($od["SubService"])){
										$suSerId = $od["SubService"];
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
						<hr>
						<p class="text-muted">Worker Name</p>
                        <?php
                        /* Select Worker Information Code Start */ 
                        //print $wId."</br>";
                        $wId = $od["worker_Id"];
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
						<hr>	
						<p class="text-muted">Worker Response</p>
						<p class=""><?php print "waiting" ?></p>                    
						<hr>
						<p class="text-muted">Date of Start</p>
						<p class=""><?php print $od["Start"]; ?></p>                    
						<hr>				
					</div> 
					<?php } ?>
				</div>
			
		</div>			
    </main>
    <?php
require_once("footer.php");    
?>
</body>

</html>