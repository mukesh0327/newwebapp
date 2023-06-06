<!-- Panding Task in This Page  
Note -> Updation Operation in Signup Form 
Note -> Drag Drop Task  
-->
<?php
if(isset($_GET["f"]) and $_GET["f"]=='1'){
	 $signMsg = "Please Signup/Login First";
}

if(isset($_POST["regBtn"])){
/*
echo "<pre>";
print_r($_POST);
die();
*/
$uty=$_POST["userTyp"]; 
$una=$_POST["empName"];  
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
$wor=$_POST["work"];
$subWor=$_POST["subwork"];
$subWor=$_POST["subwork"];
if(isset($_FILES["userImg"]["error"])){
    $userPErr = $_FILES["userImg"]["error"];
}    
if(isset($_FILES["empImg"]["error"])){
    $empPErr = $_FILES["empImg"]["error"];
}
$adhErr = $_FILES["empAdh"]["error"]; 
$adh = "hello";
$wne=$_POST["newWork"];
    
if($uty==" "){
    $rmsg = "3";
}
else if($pas!=$cps){
    $rmsg = "2";    
}   
else {	
    require_once("myconnection.php");
    $obj=new connection;	
	    
    if($userPErr == "0") 
	{
	$udate = date_create('',timezone_open('Asia/Kolkata'));	
	$utstemp = date_timestamp_get($udate);	
    $uPicName = $utstemp.$_FILES["userImg"]["name"];
	$upTempName = $_FILES["userImg"]["tmp_name"];
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
	else if($empPErr=="0") 
	{
	$udate = date_create('',timezone_open('Asia/Kolkata'));	
	$utstemp = date_timestamp_get($udate);	
    $uPicName = $utstemp.$_FILES["empImg"]["name"];
	$upTempName = $_FILES["empImg"]["tmp_name"];
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
    
	if($adhErr=="0"){  
	$adate = date_create('',timezone_open('Asia/Kolkata'));	
	$atstemp = date_timestamp_get($adate)+1;				//Temp Solution	
    $adhPName = $atstemp.$_FILES["empAdh"]["name"];
	$adhPTempName = $_FILES["empAdh"]["tmp_name"];
	$adhPRes = move_uploaded_file($adhPTempName,"uploads/$adhPName");
	if($adhPRes != 1)
		{
			$adhPName = "noImg1.png";
		}
	}
	else{
		$adhPName = "noImg1.png";
	}
    /*
    print $uty."<br>".$una."<br>".$dob."<br>".$gen."<br>".$ema."<br>".$pho."<br>".$pas."<br>".$cps."<br>".$cou."<br>".$sta."<br>".$add."<br>".$pin."<br>".$pic."<br>".$wor."<br>".$adh."<br>".$wne;
    die();
    */
    
	$qi = "INSERT INTO `signup`(`User_Type`, `U_Name`, `U_DOB`, `U_Gender`, `U_EMail`, `U_Phone`, `U_Password`, `U_CPassword`, `U_Country`, `U_State`, `U_Address`, `U_ZipCode`, `U_Pic`, `U_IdProf`, `U_Work`,`U_SubWork`, `U_New_Work`,`worker_Status`)
	VALUES ('$uty','$una','$dob','$gen','$ema','$pho','$pas','$cps','$cou','$sta','$add','$pin','$uPicName','$adhPName',
    '$wor','$subWor','$wne','off')";
	mysqli_query($obj->conn,$qi) or die("Error In Query :".mysqli_error($obj->conn));		
     
	$count = mysqli_affected_rows($obj->conn);
	if($count==1){
        $rmsg = "1";
	}
	else{
        $rmsg = "0";
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
require_once("header.php");    
?>

    <main role="EmpRagistar" id="EmpRegistar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Enter Information</h1>
                </div>
            </div>
			<?php if(isset($signMsg)){ ?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong>
				
					<?php print $signMsg; ?> 
				
			</div>
			<?php }	?>
			
			<?php if(isset($rmsg)){
			if($rmsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Signup Successfully
            </div>
            <?php }	else if($rmsg=="2"){ ?>
			<div class="alert alert-info alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Information! </strong>Confirm Password Not Match.
            </div>
            <?php }	else if($rmsg=="3"){ ?>
			<div class="alert alert-info alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Information! </strong>Please Select User Type.
            </div>            
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Signup not Successfully, Please Try Again.
            </div>
			<?php } 
            }?>
			
            <form name="RegisterForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
                <h5 class="pl-3 pb-2">Personal Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">User Type</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-users" aria-label="Select box for User type"></i>
                                    </div>
                                </span>
                                <select id="UserType" name="userTyp" onchange="hideShowBox(), hideShowBox1()" class="pt-1 form-control">
                                    <option selected value=" ">-- Select --</option>
                                    <option>Customer</option>
                                    <option>Worker</option>
                                </select>
                                <span class="input-group-append">
                                </span>
                            </div>
                        </div>
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
                        
                        <!--
                        <div class="form-group">
                            <label for="fname">Father Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-users"></i></div>
                                </div>
                                <input type="text" id="FaName" class="form-control" placeholder="Father Name" name="eFatName">
                            </div>
                        </div>
-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Enter Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" id="EmName" class="form-control" placeholder="Name" name="empName">
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
                <hr>
                <h5 class="pl-3 pb-2">Contact Information</h5>
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
                        <div id="ShowHideImgField" style="display:block;">
                        <div class="form-group">
                                <label for="uplPho">Upload Your Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="UserImg" name="userImg" class="form-control-file border">
                                    </div>
                                    <!--               <input type="submit" class="btn btn-black ml-2" value="upload" name="uploadAddhar">-->
                                </div>
                                <p class="text-muted msgSty">Size should be less than 150KB</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
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
                            <label for="address">Resident Address</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </span>
                                <textarea type="text" id="RsiAdd" name="resAdd" class="form-control py-0" rows="5" placeholder="Address.."></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="ShowHideBox" style="display:none;">
                    <hr>
                    <h5 class="pl-3 pb-2">Upload Files <span style="font-size:12px;" class="text-muted">Compulsory for worker only</span></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uplPho">Upload Your Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="EmpImg" name="empImg" class="form-control-file border">
                                    </div>
                                    <!--               <input type="submit" class="btn btn-black ml-2" value="upload" name="uploadAddhar">-->
                                </div>
                                <p class="text-muted msgSty">Size should be less than 150KB</p>
                            </div>
                            <!--
                        <div class="forUserImg text-center">
                            <img src="images/noImg.png" class="img-fluid"  width="300" height="400">
                        </div>
-->
                            <div class="form-group">
                                <label for="WorkName">Work</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-tools" ria-label="Select box for Work type"></i>
                                        </div>
                                    </span>
                                    <select id="Work" name="work" class="pt-1 form-control">
                                        <option selected value="">-- Select --</option>                        
                                        <?php
                                        require_once("defineVariable.php");
                                        $conn = mysqli_connect(DBhost,DBuser,DBpass,DBname) or 
                                        die("Connection Error :".mysqli_connect_error());

                                        $qs = "SELECT * FROM `add_service` WHERE 1";
                                        $result = mysqli_query($conn,$qs) or die("Error in query :".mysqli_error($conn));
                                        $affectRes = mysqli_affected_rows($conn);
                                        if($affectRes==0) {
                                        	print '<option selected value="">-- Select --</option>';
											print '<option value="">No Root Service Found</option>';
                                        }
                                        else {                                        
                                        while($x = mysqli_fetch_assoc($result)){
                                        ?>  
											<option value="<?php echo $x['Ser_Id']; ?>">
											<?php echo $x['Ser_Name']; ?></option>;
                                        <?php
                                            }
                                        }   
                                        ?>
                                    </select>									
                                </div>
								<div id="output"></div>
                            </div>          
                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uplAdh">Upload Addhar Card</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="EmpAdh" name="empAdh" class="form-control-file border">
                                    </div>
                                    <!-- <input type="submit" class="btn btn-black ml-2" value="upload" name="uploadAddhar">-->
                                </div>
                                <p class="text-muted msgSty">Size should be less than 300KB</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="SubWorkName">Specialist (Master in which type of Work?)</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-tools" ria-label="Select box for Sub Work type"></i>
                                        </div>
                                    </span>                                   
                                    <select id="SubWork" name="subwork" class="pt-1 form-control">
                                        <option selected value="">-- Select --</option>                           
                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="OtherWork">Enter Work Name</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-toolbox"></i>
                                        </div>
                                    </span>
                                    <input type="text" id="WorkName" name="newWork" class="form-control" placeholder="if Work Name not Show in Given(specialist) list">
                                </div>
                            </div>
                            <!--
                        <div class="forAddImg text-center"  style="max-height:500px">
                            <img src="images/noimage2.png" class="img-fluid" width="400" height="300">
                        </div>
-->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit" onclick="requireUpBox()" class="btn btn-block btn-black mt-5" name="regBtn" value="Register">
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
        
        function requireUpBox() {
            var out = document.getElementById("UserType").value;
            if (out == "Worker") {
                document.getElementById("EmpImg").required = true;
                document.getElementById("EmpAdh").required = true;
            } else {
                document.getElementById("EmpImg").required = false;
                document.getElementById("EmpAdh").required = false;
            }
        }
        
        function hideShowBox1() {
            var out = document.getElementById("UserType").value;
            if (out == "Worker") {
                document.getElementById("ShowHideImgField").style.display = "none";
            } else {
                document.getElementById("ShowHideImgField").style.display = "block";
            }
        }

        function hideShowBox() {
            var out = document.getElementById("UserType").value;
            if (out == "Worker") {
                document.getElementById("ShowHideBox").style.display = "block";
            } else {
                document.getElementById("ShowHideBox").style.display = "none";
            }
        }       
        
    </script>

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
	
	<script>
	$(document).ready(function(){
		 $("#Work").change(function(){
            var id = $(this).val();
            $.ajax({
                url:"EmpRagistarAjax.php",
                data:{"serid":id},
                type:"Post",
                success:function(res){
                    $("#output").html("");
                    $("#SubWork").html(res);
                },
                beforeSend:function(){
                    $("#output").html("<img src='images/preloader.gif' width='40px'>");
                },
                error:function(){
                    $("#output").html("Ajax Error");
                }
            });
        }); 
		
		// $("#MCQForm").submit(function(e)
		// {
			// e.preventDefault();
			// var fd = new FormData($(this)[0]);
			// $.ajax({
				// url:"admin_AddMCQAjax.php",
				// data:fd,
				// type:"post",
				// cache:false,
				// contentType:false,
                // processData:false,
                // success:function(res)
				// {
					// if(res=="1"){
					    // $("#result").html("MCQ Add Successfully");
					// }
					// else if(res=="0"){
					    // $("#result").html("MCQ Not Add Successfully! Please try Again.");
					// }	
					// else if(res=="2"){
					    // $("#result").html("Please Select Root Service");
					// }
					// else{
						// $("#result").html(res);					
					// }									
                    // $("#MCQForm")[0].reset();
                // },
                // beforeSend:function()
				// {
                    // $("#result").html("<img src='images/preloader.gif' width='50px'>");
                // },
                // error:function()
				// {
                    // $("#result").html("ajax Error");
                // }
            // }); 
        // });	
	});
	</script>
</body>

</html>