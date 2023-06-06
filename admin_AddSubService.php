<?php
session_start();

/*Code For Inserting Sub Service Information */

if(isset($_POST["subSerAddBtn"])){
/*
echo "<pre>";
print_r($_POST);
die();
*/
$serid = $_POST["service"];  
$subsername = $_POST["subSerName"];  
$subserdesc = $_POST["subSerDesc"];  
$subserPErr = $_FILES["subSerImg"]["error"];
require_once("myconnection.php");
    $obj=new connection;	
	    
    if($subserPErr == "0") 
	{
	$date = date_create('',timezone_open('Asia/Kolkata'));	
	$tstemp = date_timestamp_get($date);	
    $subSerPicName = $tstemp.$_FILES["subSerImg"]["name"];
	$upTempName = $_FILES["subSerImg"]["tmp_name"];
	$upRes = move_uploaded_file($upTempName,"adminUploads/$subSerPicName");
	   if($upRes != 1)
		{
            $subSerPicNamee = "noImg1.png";
        }
	}
	else{
		$subSerPicName = "noImg1.png";
	} 	
	$qi = "INSERT INTO `add_sub_service`(`Ser_Id`, `SubS_Name`, `SubS_Desc`, `SubS_Pic`) VALUES ('$serid', '$subsername', '$subserdesc', '$subSerPicName')";
	mysqli_query($obj->conn,$qi) or die("Error In Query :".mysqli_error($obj->conn));	     
	$count = mysqli_affected_rows($obj->conn);
	if($count==1){
        $samsg = "1";
	}
	else{
        $samsg = "0";
    }	   
}

/*Code For Display Old Sub Service Information */

if(isset($_GET["ssid"])){
	
require_once("myconnection.php");
    $obj=new connection;
$sid=$_GET["ssid"];

$qsu="select * from add_sub_service where SubSer_Id=$sid";
$res=mysqli_query($obj->conn,$qsu)or die("error in query".mysqli_error($obj->conn));
$y=mysqli_fetch_array($res);
//print "<pre>";
//print_r($x);
//die();
}

/*Code For Update Sub Service Information */

if(isset($_POST["subSerUpBtn"])){
$serid = $_POST["service"]; 	
$ssid = $sid;
$ssname=$_POST["subSerName"];
$ssdesc=$_POST["subSerDesc"];
$sserPErr = $_FILES["subSerImg"]["error"];
require_once("myconnection.php");
    $obj=new connection;
	if($sserPErr==0)
	{
		$date = date_create('', timezone_open('Asia/Kolkata'));
		$tstamp=date_timestamp_get($date);
		$fn=$tstamp.$_FILES["subSerImg"]["name"];
		$tname=$_FILES["subSerImg"]["tmp_name"];
		$resp=move_uploaded_file($tname,"adminUploads/$fn");
		if($resp!=true)
		{
			$fn="noimage.jpg";
		}
	} 
	else
	{
		$fn=$y['4'];
	}	
	$qu = "UPDATE `add_sub_service` SET `Ser_Id`='$serid',`SubS_Name`='$ssname',`SubS_Desc`='$ssdesc',`SubS_Pic`='$fn' WHERE SubSer_Id ='$ssid'";	
	mysqli_query($obj->conn,$qu)or die("error in query".mysqli_error($obj->conn));	
	$count=mysqli_affected_rows($obj->conn);	
	if($count==1)
	{
		$msg=header("location:admin_subSerInfo.php?ssid=$ssid");
		/* $msg="Service Information Updated Successfully"; */
	}
	else	
	{
        $msg="Service Information Note Updated successfully";
	}
}	   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Add Sub Service</title>
</head>

<body id="MainHome">
    <?php
require_once("admin_header.php");   ;    
?>
<main role="EmpRagistar" id="EmpRegistar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-1">
                
					<?php if(isset($_GET["ssid"])){	?>
						<h1 class="txt-dark text-center pt-3 pb-2">Update Sub Service</h1>
					<?php } else { ?>					
						<h1 class="txt-dark text-center pt-3 pb-2">Add Sub Service</h1>
					<?php } ?>
            </div>
        </div>
        <?php if(isset($samsg)){
			if($samsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Sub Service Add Successfully
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Sub Service Add not Successfully! Please Try Again.
            </div>
			<?php } 
        }?>
        <form name="RegisterForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">							
                            <label for="ServiceName">Select <?php if(isset($_GET["ssid"])){ echo "New"; } ?> Service</label>
                            <div class="input-group">
                                <select id="Service" name="service" required class="pt-1 form-control">									
									<option selected value="">-- Select --</option>
									
									<?php
                                    require_once("myconnection.php");
                                    $obj=new connection;
                                    
                                    $qs = "SELECT * FROM `add_service` WHERE 1";
									$result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
									$affectRes = mysqli_affected_rows($obj->conn);
									if($affectRes==0){
										$affMsg ="No Root Category Found";
									}
									else{
										$affMsg="";
									}
                                    while($x = mysqli_fetch_assoc($result)){   
                                    ?>			
                                    
									<option value="<?php echo $x["Ser_Id"]; ?>"><?php echo $x["Ser_Name"];  ?></option>
                                    <?php
//                                  echo "<pre>";    
//									print_r($x);
//									die();
									}
                                    ?>	
                                                            
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="sname">Enter <?php if(isset($_GET["ssid"])){ echo "New"; } ?> Sub Service Name</label>
						<div class="input-group">
						<?php if(isset($_GET["ssid"])){	?>	
							<input type="text" id="SubSerName" class="form-control" name="subSerName" value="<?php echo $y['SubS_Name']; ?>">
						<?php } else { ?>
							<input type="text" id="SubSerName" class="form-control" name="subSerName">
						<?php } ?>                        
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Enter <?php if(isset($_GET["ssid"])){ echo "New"; } ?> Sub Service Description</label>
                        <div class="input-group">
							<?php if(isset($_GET["ssid"])){	?>
								<input type="text" id="SubSerDesc" class="form-control" name="subSerDesc" value="<?php echo $y['SubS_Desc']; ?>">	
							<?php } else {?>
								<input type="text" id="SubSerDesc" class="form-control" name="subSerDesc">	
							<?php } ?>                            
                        </div>
                    </div>
                    <div class="form-group">                        
						<label for="uplPho">Upload <?php if(isset($_GET["ssid"])){ echo "New"; } ?> Sub Service Image</label>							
							<?php if(isset($_GET["ssid"])){	?>
							<div class="text-center">
								<p class="text-muted msgSty">Old Upload Image</p>
								<img src='adminUploads/<?php echo $y['SubS_Pic']; ?>' class="img-fluid img-thumbnail" width='150px'>
							</div>
							<?php } ?>						
						
                        <div class="input-group">
                            <div class="custom-file">
								<?php if(isset($_GET["ssid"])){	?>										
									<input type="file" id="SubSerImg" name="subSerImg" class="form-control-file border" value="<?php echo $y['SubS_Pic']; ?>">
								<?php
								}
								else{
								?>
									<input type="file" id="SubSerImg" name="subSerImg" class="form-control-file border">
								<?php } ?>                               
                            </div>
                        </div>
                        <p class="text-muted msgSty">Size should be less than 150KB</p>
                    </div>                       
                    <div class="form-group">
						<?php if(isset($_GET["ssid"])){	?>
							<input type="submit" class="btn btn-black btn-block mt-5" name="subSerUpBtn" value="Update Sub Service">
						<?php } else {?>
							<input type="submit" class="btn btn-block btn-black mt-5" name="subSerAddBtn" value="Add Sub Service">
						<?php } ?>                       
                    </div>                      
                </div>
            </div>

        </form>
    </div>
</main>
<!--2ed main end-->
    <?php
require_once("footer.php");    
?>
</body>

</html>