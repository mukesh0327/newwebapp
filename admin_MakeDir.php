<?php
session_start();
if(isset($_POST["dirAddBtn"])){
   // print_r($_POST);
   //  die();
    if(isset($_POST["folderName"]) && $_POST["folderName"]!=""){
    $dirName = $_POST["folderName"];   
    $count = mkdir($dirName);
        if($count==1){
            $damsg = "1";
        }
        else{
            $damsg = "0";
        }	
    }
    else{
            $damsg = "0";
    }
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Add Folder</title>
</head>

<body id="MainHome">
    <?php
require_once("admin_header.php");      
?>
    <main role="AddFolder" id="AddFolder">
        <div class="container minHeigh">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Add New Folder</h1>
                </div>
            </div>
            <?php if(isset($damsg)){
			if($damsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Folder Add Successfully
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Folder Add not Successfully! Please Try Again.
            </div>
			<?php } 
            }?>
            <form name="mkdirForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Enter Folder Name</label>
                            <div class="input-group">
                                <input type="text" id="FolderName" class="form-control" name="folderName">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-black mt-5" name="dirAddBtn" value="Add Folder">
                            <p class="py-2">
                                <?php
                                //if(isset($_POST["dirAddBtn"])){
                                  //  print $msg;    }
                                ?>
                            </p>
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