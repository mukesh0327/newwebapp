<?php
session_start();
//$oid = $_GET["oId"];
//$wid = $_GET["wid"];
if(isset($_POST["wid"])){
	$worId=$_POST["wid"];
	require_once("myconnection.php");
	$obj=new connection;
	$qsw = "SELECT * FROM `signup` WHERE User_Type = 'worker' and worker_Status='on' and U_Work='$worId'";
	$qswResult = mysqli_query($obj->conn,$qsw) or die("Select Worker Query Error :".mysqli_error($obj->conn));
	$count = mysqli_affected_rows($obj->conn);
	if($count>0)
	{
		$msg = "";
	}
	else
	{
		$msg = "Not Any Record Available";
	}
}

/* Select Worker Information Code Start */
//print "<pre>"; 
//print_r($_POST);
//die();
/* Select Worker Information Code End */

/* Select Order Detail using Order Id code Start*/
//if(isset($_GET["resWorkerBtn"])){  
/* Insert Selected Worker Id in Order table code Start Using Update Command*/
/*
if(isset($_GET["oId"])){
	$oId = $_GET["oId"];

    $qso = "SELECT * FROM `orderdetails` WHERE Order_Id = $oId";
    $orderInfo = mysqli_query($obj->conn,$qso) or die("Error in Select Order Detail query : ".mysqli_error($obj->conn));
	$count = mysqli_affected_rows($obj->conn);
    if($count==1)
    {
         $orderDetail = mysqli_fetch_array($orderInfo);
         //$smsg = $a['Ser_Name'];
		 $oid = $orderDetail['Order_Id'] ;
    }
    else
    {
         $oInfoMsg = "0";
    }
	/*
	if(isset($_GET["resWorkerBtn"])){ 
		
		$quwid = "UPDATE `orderdetails` SET `worker_Id`='1002' WHERE Order_Id = $oid";
		mysqli_query($obj->conn,$quwid);
		$count = mysqli_affected_rows($obj->conn);
		if($count==1)
		{
			$worIdMsg = "Update Success fully";
			print $worIdMsg;
		}
		else	
		{
			$worIdMsg = "Not Update successfully";
			print $worIdMsg;
		}
	}
	*/
//}
/* Insert Selected Worker Id in Order table code End*/
?>


<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Available Workers</title>    
</head>

<body>
    <?php
require_once("header.php");    
?>
    <main role="availableWorker" id="AvailableWorker">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Available Workers</h1>
                </div>
            </div>
            <div class="row">
               <?php
					while($sw = mysqli_fetch_array($qswResult)){
                ?>				
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-header p-0 text-center">
                            <img src="uploads/<?php echo $sw['U_Pic']; ?>" class="userImgSty m-2 p-1" alt="Worker Image" width="40%" style="">
                        </div>
                        <div class="card-body text-left p-3">
                            <!--  <i class="fas fa-star"></i><i class="far fa-star"></i><i class="fas fa-star-half-alt"></i> -->
                            <div class="">
                                <p class="py-1 m-0 text-muted">Available Worker</p>
                                <p class="d-flex justify-content-between py-1 my-0 lead  align-items-center">
                                    <?php echo $sw['U_Name']; ?>
                                <span class="text-muted" style="font-size:15px;"><i class="fas fa-map-marker-alt"></i> 25 km</span>
                                </p>                                
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <span class="text-muted" style="font-size:13px;"> 4.5 out of 5</span>
                            </div>
                            <p class="py-1 my-0 text-muted"> 
                            <?php
                            $serid = $sw['U_Work']; 
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
                            print  $smsg;  ?>
                            </p>
                            <p class="py-1 my-0">
                           <?php
                        if(isset($sw['U_SubWork']) and $sw['U_SubWork']!=""){
                                $suSerId = $sw['U_SubWork'];
                                /* Select Sub Service Information Code Start */                            
                                $qs = "SELECT * FROM `add_sub_service` WHERE SubSer_Id = $suSerId";
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
                                }else{
                               $ssmsg =  "No Sub Service Name";
                                } 
                                /* Select Sub Service Information Code End */
                                print $ssmsg;
                       
                            ?>                            </p>
                            <hr>
                            <div class="mb-2">
                                <i class="far fa-clock mr-2"> </i><span>From 10:30AM </span><span> To 5:30PM</span>
                            </div>
							<?php
								$swid = $sw['U_EMail'] or $sw['U_Phone'];
							?>
<!--
							<a href="SubmitOrder.php?swid=<?php echo $swid; ?>&oId=<?php echo $oid ; ?>" id="<?php echo $swid; ?>" class="btn btn-yellow" value="<?php echo $swid; ?>" name="resWorkerBtn">RESERVE</a>
                         
-->
                        <form name="SelWorkerForm" action="SubmitOrder.php" method="post">    
						   <input style="display:none;" name="cwid" value="<?php echo $_POST["wid"]; ?>">
                           <input style="display:none;" name="csubw" value="<?php echo $_POST["subwork"]; ?>">  
						   <input style="display:none;" name="cown" value="<?php echo $_POST["own"]; ?>">
						   <input style="display:none;" name="cdos" value="<?php echo $_POST["DOS"]; ?>">
						   <input style="display:none;" name="cnewold" value="<?php echo $_POST["newOld"]; ?>">  
						   <input style="display:none;" name="cname" value="<?php echo $_POST["name"]; ?>">
						   <input style="display:none;" name="cemail" value="<?php echo $_POST["email"]; ?>">
						   <input style="display:none;" name="cphone" value="<?php echo $_POST["phone"]; ?>">
						   <input style="display:none;" name="cadd" value="<?php echo $_POST["address"]; ?>">
						   <input style="display:none;" name="cpin" value="<?php echo $_POST["pin"]; ?>">
						   
                           <button class="btn btn-yellow" type="submit" value="<?php echo $swid; ?>" name="swid">  RESERVE  </button>
                        </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div><!-- End Row -->
        </div>
    </main>
    <?php
	
require_once("footer.php");    
?>
</body>

</html>