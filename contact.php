<?php
session_start();
?>
<?php
if(isset($_GET["contactBtn"])){
    $cNam = $_GET["cName"];
    $cEma = $_GET["cEMail"];
    $cPho = $_GET["cPhone"];
    $cSub = $_GET["cSub"];
    $cMsg = $_GET["cMsg"];
//  echo "<pre>";
//  print_r($_GET);
//  die();
	require_once("myconnection.php");
    $obj = new Connection; 
	mysqli_query($obj->conn,"INSERT INTO contact (`C_Name`, `C_EMail`, `C_Phone`, `C_Subject`, `C_Message`) VALUES ('$cNam','$cEma','$cPho','$cSub','$cMsg')") or die("Error In Query :".mysqli_error($obj->conn));
	$count = mysqli_affected_rows($obj->conn);
	if($count==1){
		$ConMsg = "1";
	}
	else{
		$ConMsg = "0";
	}		
}
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>Contact</title>       
</head>
<body>
<?php
require_once("header.php");    
?>
<main role="Contact" id="Contact">
    <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Contact Us</h1>
                </div>
            </div>
			<?php if(isset($_GET["contactBtn"])) {
                  if($ConMsg=="1") { ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p><strong>Success!</strong>Message Send Successfully</p>				
			</div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p><strong>Warning!</strong>Message Not Send Successfully! Please Try again</p>				
			</div>
			<?php }
            }?>
		
        <div class="row">
             <div class="col-md-6 pb-5">
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">Corporate Office</p>
                        <p class="text-muted"> VPO Kambra Jalandhar 144026</p>                    
                    </div> 
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <p class="lead">Mobile No.</p>
                        <p class="text-muted">9914889358</p>                    
                    </div> 
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <p class="lead">E-mail</p>
                        <p class="text-muted"> goldy11@gmail.com</p>                    
                    </div> 
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <p class="lead">Follow us</p>
                        <i class="fab fa-facebook-square icon-size"></i> 
                        <i class="fab fa-twitter-square icon-size"></i>
                        <i class="fab fa-google-plus-square icon-size"></i>
                        <i class="fab fa-linkedin icon-size"></i>
                   </div> 
                </div>
            </div>
            <div class="col-md-6 pb-5">
                <form name="contactForm" method="get">
                      <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </div>    
                                </span>
                                <input type="text" id="CName" name="cName" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text"> 
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </span>
                                <input type="email" id="CEMail" name="cEMail" class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">   
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                </span>
                                <input type="text" id="CPhone" name="cPhone" class="form-control" placeholder="Mobile No.">
                            </div>
                        </div>
                     <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </span>
                            <input type="text" id="CSub" name="cSub" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                   <div class="form-group">
                             <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </span>
                                <textarea type="text" id="CMsg" name="cMsg" class="form-control py-0" rows="4" placeholder="Message"></textarea>
                            </div>
                        </div>
                    <input type="submit" class="btn btn-block btn-black" name="contactBtn" value="Submit">
                </form>  
            </div>           
        </div> 
		<div class="mb-5">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109066.25059381334!2d75.50337811724476!3d31.32252538763455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5a5747a9eb91%3A0xc74b34c05aa5b4b8!2sJalandhar%2C+Punjab!5e0!3m2!1sen!2sin!4v1554434260690!5m2!1sen!2sin" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
    </div>
</main> 
<?php
require_once("footer.php");    
?>
</body>
</html>