<?php
session_start();
/*Code For Inserting Service Information */
if(isset($_POST["serAddBtn"])){
/*
echo "<pre>";
print_r($_POST);
die();
*/
$sname = $_POST["serName"];  
$sdesc = $_POST["serDesc"];  
$serPErr = $_FILES["serImg"]["error"];
    require_once("myconnection.php");
    $obj=new connection;
    if($serPErr == "0") 
	{
	$sdate = date_create('',timezone_open('Asia/Kolkata'));	
	$ststemp = date_timestamp_get($sdate);	
    $serPicName = $ststemp.$_FILES["serImg"]["name"];
	$upTempName = $_FILES["serImg"]["tmp_name"];
	$upRes = move_uploaded_file($upTempName,"adminUploads/$serPicName");
	   if($upRes != 1)
		{
            $serPicName = "noImg1.png";
        }
	}
	else{
		$serPicName = "noImg1.png";
	} 	
	$qi = "INSERT INTO `Add_Service`(`Ser_Name`, `Ser_Description`, `Ser_Pic`)
    VALUES ('$sname','$sdesc','$serPicName')" ;
	mysqli_query($obj->conn,$qi) or die("Error In Query :".mysqli_error($obj->conn));	     
	$count = mysqli_affected_rows($obj->conn);
	if($count==1){
        $amsg = "1";
	}
	else{
        $amsg = "0";
    }	   
}   

/*Code For Display Old Service Information */

if(isset($_GET["sid"]))
{
	
$sid=$_GET["sid"];
require_once("myconnection.php");
$obj=new connection;
$qsu="select * from add_service where Ser_Id=$sid";
$res=mysqli_query($obj->conn,$qsu)or die("error in query".mysqli_error($obj->conn));
$x=mysqli_fetch_array($res);
mysqli_close($obj->conn);
}

/*Code For Update Service Information */

if(isset($_POST["serUpBtn"]))
{
$sid = $sid;
$sname=$_POST["serName"];
$sdesc=$_POST["serDesc"];
$serPErr = $_FILES["serImg"]["error"];
require_once("myconnection.php");
$obj=new connection;
	if($serPErr==0)
	{
		$date = date_create('', timezone_open('Asia/Kolkata'));
		$tstamp=date_timestamp_get($date);
		$fn=$tstamp.$_FILES["serImg"]["name"];
		$tname=$_FILES["serImg"]["tmp_name"];
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
	$qu = "UPDATE `add_service` SET `Ser_Name`='$sname',`Ser_Description`='$sdesc',`Ser_Pic`='$fn' WHERE Ser_Id ='$sid'";	
	mysqli_query($obj->conn,$qu)or die("error in query".mysqli_error($obj->conn));	
	$count=mysqli_affected_rows($obj->conn);
	if($count==1)
	{
		$msg=header("location:admin_serInfo.php?sid=$sid");
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
    <title>Register</title>
</head>

<body id="MainHome">
    <?php
require_once("admin_header.php");      
?>
    <main role="EmpRagistar" id="EmpRegistar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">	
					<?php if(isset($_GET["sid"])){	?>
						<h1 class="txt-dark text-center pt-3 pb-2">Update Service</h1>
					<?php } else { ?>					
						<h1 class="txt-dark text-center pt-3 pb-2">Add Service</h1>
					<?php } ?>
                </div>
            </div>
            <?php if(isset($amsg)){
			if($amsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Service Add Successfully
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Service Add not Successfully! Please Try Again.
            </div>
			<?php } 
            }?>
            <form name="addServiceForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Enter <?php if(isset($_GET["sid"])){ echo "New"; } ?> Service Name</label>
                            <div class="input-group">
							<?php 
							if(isset($_GET["sid"])){
							?>
                                <input type="text" id="SerName" class="form-control" name="serName" value="<?php echo $x[1]; ?>">
							<?php
							}
							else{
							?>
                                <input type="text" id="SerName" class="form-control" name="serName">
                            <?php }	?>	
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Enter <?php if(isset($_GET["sid"])){ echo "New"; } ?> Service Description</label>
                            <div class="input-group">
							<?php
							if(isset($_GET["sid"])){
							?>
								<input type="text" id="SerDesc" class="form-control" name="serDesc" value="<?php echo $x[2]; ?>">
							<?php
							}
							else{
							?>
                                <input type="text" id="SerDesc" class="form-control" name="serDesc">
                            <?php }	?>
							</div>
                        </div>
                        <div class="form-group">
                            <label for="uplPho">Upload <?php if(isset($_GET["sid"])){ echo "New"; } ?> Service Image</label>							
							<?php if(isset($_GET["sid"])){	?>
							<div class="text-center">
							<p class="text-muted msgSty">Old Upload Image</p>
								<img src='adminUploads/<?php echo $x[3]; ?>' class="img-fluid img-thumbnail" width='150px'>
							</div>
							<?php } ?>								
							<div class="input-group">
								<div class="custom-file">
									<?php if(isset($_GET["sid"])){	?>										
										<input type="file" id="SerImg" name="serImg" class="form-control-file border" value="<?php echo $x[3]; ?>">
									<?php
									}
									else{
									?>
										<input type="file" id="SerImg" name="serImg" class="form-control-file border">
									<?php } ?>
								</div>
							</div>                                 
                            <p class="text-muted msgSty">Size should be less than 150KB</p>
                        </div> 
						<div class="form-group">
							<?php if(isset($_GET["sid"])){	?>
								<input type="submit" class="btn btn-black btn-block mt-5" name="serUpBtn" value="Update Service">
							<?php } else {?>
								<input type="submit" class="btn btn-black btn-block mt-5" name="serAddBtn" value="Add Service">
							<?php } ?>						
						</div>						                      
                    </div>
                </div>
            </form>
        </div>
    </main>   
    <?php
require_once("footer.php");    
?>
</body>

</html>