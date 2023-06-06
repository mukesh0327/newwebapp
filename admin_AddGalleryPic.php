<?php
session_start();
if(isset($_POST["galPicAddBtn"])){
$galPErr = $_FILES["galImg"]["error"];
    if($galPErr == "0") 
	{
	$sdate = date_create('',timezone_open('Asia/Kolkata'));	
	$ststemp = date_timestamp_get($sdate);	
    $galPicName = $ststemp.$_FILES["galImg"]["name"];
	$upTempName = $_FILES["galImg"]["tmp_name"];
	$upRes = move_uploaded_file($upTempName,"Gallery/$galPicName");
        if($upRes==1)
        {               
            $apmsg = "1";
        }
        else
        {
            $apmsg = "0";
        }
	}
    if($galPErr == "4"){
        $apmsg = "2"; 
    }
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Add Gallery Pic</title>
</head>

<body id="MainHome">
    <?php
require_once("admin_header.php");      
?>
    <main role="AddGalleryPic" id="Add GalleryPic">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Upload Gallery Images</h1>
                </div>
            </div>
            <?php if(isset($apmsg)){
			if($apmsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Image Upload Successfully.
            </div>
            <?php } else if($apmsg=="2"){ ?>
			<div class="alert alert-info alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Information! </strong>Please Choose Image.
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Image Upload not Successfully! Please Try Again.
            </div>
			<?php }   }?>
            <form name="GalleryForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="form-group">
                            <label for="uplPho">Upload Gallery Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="GalImg" name="galImg" class="form-control-file border">
                                </div>
                            </div>
                            <p class="text-muted msgSty">Size should be less than 300KB</p>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-black mt-5" name="galPicAddBtn" value="Add Gallery Image">                         
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