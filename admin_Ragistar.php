<!-- Panding Task in This Page  
Note -> Updation Operation in Signup Form 
Note -> Drag Drop Task  
-->
<?php
session_start();
if(isset($_SESSION["userdata"]["U_EMail"]) and $_SESSION["userdata"]["User_Type"]=="Admin"){

if(isset($_POST["regBtn"])){
/*
echo "<pre>";
print_r($_POST);
die();
*/
$una=$_POST["adminName"];  
$dob=$_POST["dOB"];  
$gen=$_POST["gender"]; 
$ema=$_POST["eMail"];  
$pho=$_POST["phoNum"];
$pas=$_POST["pass"];
$cps=$_POST["cPass"];
$cou=$_POST["couName"];  
$sta=$_POST["staName"];  
$add=$_POST["resAdd"];  
$pin=$_POST["pinCode"]; 
$adminPErr = $_FILES["adminImg"]["error"];
$adminAdhErr = $_FILES["adminAdh"]["error"]; 
if($pas!=$cps){
    $armsg = "2";
}   
/*
print $uty."<br>".$una."<br>".$dob."<br>".$gen."<br>".$ema."<br>".$pho."<br>".$pas."<br>".$cps."<br>".$cou."<br>".$sta."<br>".$add."<br>".$pin."<br>".$pic."<br>".$wor."<br>".$adh."<br>".$wne;

else if($err==4)
{   
    $imgMsg = "Please Choose User Image for Upload";
    print $imgMsg;
}
 */    
else {	     
	require_once("myconnection.php");
    $obj=new connection;	
	    
    if($adminPErr == "0") 
	{
	$udate = date_create('',timezone_open('Asia/Kolkata'));	
	$utstemp = date_timestamp_get($udate);	
    $uPicName = $utstemp.$_FILES["adminImg"]["name"];
	$upTempName = $_FILES["adminImg"]["tmp_name"];
	$upRes = move_uploaded_file($upTempName,"uploads/$uPicName");
	   if($upRes != 1)
		{
            if($gen=="Male"){
                $uPicName = "noImg3.png";
            }
            else{
                $uPicName = "noImg.png";
            }
		}
	}
	else{
		if($gen=="Male"){
                $uPicName = "noImg3.png";
            }
            else{
                $uPicName = "noImg.png";
            }
	}
    
	if($adminAdhErr=="0"){  
	$adate = date_create('',timezone_open('Asia/Kolkata'));	
	$atstemp = date_timestamp_get($adate)+1;				//Temp Solution	
    $adhPName = $atstemp.$_FILES["adminAdh"]["name"];
	$adhPTempName = $_FILES["adminAdh"]["tmp_name"];
	$adhPRes = move_uploaded_file($adhPTempName,"uploads/$adhPName");
	if($adhPRes != 1)
		{
			$adhPName = "noImg1.png";
		}
	}
	else{
		$adhPName = "noImg1.png";
	}
	$qi = "INSERT INTO `signup`(`User_Type`, `U_Name`, `U_DOB`, `U_Gender`, `U_EMail`, `U_Phone`, `U_Password`, `U_CPassword`, `U_Country`, `U_State`, `U_Address`, `U_ZipCode`, `U_Pic`, `U_IdProf`, `U_Work`, `U_New_Work`)
	VALUES ('Admin','$una','$dob','$gen','$ema','$pho','$pas','$cps','$cou','$sta','$add','$pin','$uPicName','$adhPName','Administrator','')" ;
	mysqli_query($obj->conn,$qi) or die("Error In Query :".mysqli_error($obj->conn));		
     
	$count = mysqli_affected_rows($obj->conn);
	if($count==1){
        $armsg = "1";
	}
	else{
        $armsg = "0";
    }
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
                    <h1 class="txt-dark text-center pt-3 pb-2">Enter Information</h1>
                </div>
            </div>
            <?php if(isset($armsg)){
			if($armsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Signup Successfully
            </div>
			<?php }	else if($armsg=="2"){ ?>
			<div class="alert alert-info alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Information! </strong>Confirm Password Not Match.
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Signup not Successfully, Please Try Again.
            </div>
			<?php } 
            }?>
            <form name="RegisterForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Enter Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" id="AdminName" class="form-control" placeholder="Name" name="adminName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                </span>
                                <input type="text" id="PhoNum" class="form-control" placeholder="Mobile No." name="phoNum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </span>
                                <input type="text" id="DOB" class="form-control" placeholder="MM/DD/YYYY" name="dOB" autocomplete="off">
                            </div>
                        </div>
                        <label for="name">Gender</label>
                        <div aria-label="Gender Field">
                            <div class="float-left" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="genM" name="gender" checked aria-label="Radio button for following div" value="Male">
                                            </div>
                                        </div>
                                        <div class="form-control" readonly>Male</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                            <div class="float-right" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="genF" name="gender" aria-label="Radio button for following div" value="Female">
                                            </div>
                                        </div>
                                        <div class="form-control" readonly>Female</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">User Id</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </span>
                                <input type="text" id="EMail" name="eMail" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Zip">Password</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </span>
                                <input type="password" id="Pass" name="pass" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Zip">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                </span>
                                <input type="password" id="CPass" name="cPass" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Zip">Zip Code</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-pin"></i>
                                    </div>
                                </span>
                                <input type="text" id="PinCode" name="pinCode" class="form-control" placeholder="Pincode">
                            </div>
                        </div>



                    </div>

                    <div class="col-md-6">
                        <div aria-label="Location Field">
                            <div class="float-left" style="width:48%">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-globe" checked aria-label="Select box for Country"></i></div>
                                        </span>
                                        <select id="CouName" name="couName" class="pt-1 form-control">
                                            <option selected value="">Choose Country</option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                            <option>Canada</option>
                                        </select>

                                        <!--
                                        <span class="input-group-append">
                                            <input type="submit" class="btn btn-light" value="Go" name="CountryGo">
                                        </span>
-->
                                    </div>
                                </div>


                            </div>
                            <div class="float-right" style="width:48%">
                                <div class="form-group">
                                    <label for="StaName">State</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-map-marker" aria-label="Select box for State"></i>
                                            </div>
                                        </span>
                                        <select id="StaName" name="staName" class="pt-1 form-control">
                                            <option selected value="">Choose State</option>
                                            <option>Punjab</option>
                                            <option>Harayana</option>
                                        </select>

                                        <!--
                                        <span class="input-group-append">
                                            <input type="submit" class="btn btn-light" value="Go" name="CountryGo">
                                        </span>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Resident Address</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </span>
                                <textarea type="text" id="RsiAdd" name="resAdd" class="form-control py-0" rows="8" placeholder="Address.."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="pl-3 pb-2">Upload Files <span style="font-size:12px;" class="text-muted">Compulsory for worker only</span></h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uplPho">Upload Your Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="AdminImg" name="adminImg" class="form-control-file border">
                                </div>
                            </div>
                            <p class="text-muted msgSty">Size should be less than 150KB</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uplAdh">Upload Addhar Card</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="AdminAdh" name="adminAdh" class="form-control-file border">
                                </div>
                            </div>
                            <p class="text-muted msgSty">Size should be less than 300KB</p>
                        </div>
                        <!--
                        <div class="forAddImg text-center"  style="max-height:500px">
                            <img src="images/noimage2.png" class="img-fluid" width="400" height="300">
                        </div>
-->
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-black mt-5" name="regBtn" value="Register">
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
    <script>
        $(function() {
            $("#DOB").datepicker({
                changeMonth: true,
                changeYear: true,
                showAnim:'drop',
                dateFormat:'dd/mm/yy',
            });
        });
    </script>
</body>

</html>
<?php
}
else{
    header("location:Error.php");
}
?>