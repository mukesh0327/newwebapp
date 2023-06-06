<?php 
    session_start();
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>Maintenance</title>       
</head>
<body>
<?php
require_once("header.php");    
?>
<main role="Corporate" id="Corporate">
    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-md-12 p-1">
                <h1 class="txt-black text-center pt-3 pb-2">Why Choose Us</h1>
            </div>
        </div>
<!--
        <div class="row text-center">
            <div class="col-md-4 p-4">
                <img src="images/staff.png" alt="STARR IMAGE" class="img-fluid">
                <p class="lead txt-light">Trained and Certified Team</p>
            </div>            
            <div class="col-md-4 p-4">
                <img src="images/24hr..png" alt="CLOCK IMAGE" class="img-fluid">
                <p class="lead txt-light">24X7 Customer Support</p>
            </div>
            <div class="col-md-4 p-4">
                <img src="images/hand..png" alt="HAND IMAGE" class="img-fluid">
                <p class="lead txt-light">Reliable & Secure</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 p-4">
                <img src="images/star.png" alt="STAR IMAGE" class="img-fluid" class="img-fluid">  
                <p class="lead txt-light">Providing Quality</p>
            </div>            
            <div class="col-md-4 p-4">
                <img src="images/alarm..png"  alt="TIME IMAGE" class="img-fluid">
                <p class="lead txt-light">Ensuring Timeliness</p>
            </div>
            <div class="col-md-4 p-4">
                <img src="images/stemp.png"  alt="STEMP IMAGE" class="img-fluid">
                <p class="lead txt-light">60 Days Warantee</p>
            </div>
        </div>
-->
         <div class="row text-center">
            <div class="col-md-4 p-4 corSty txt-black">
                <i class="fas fa-users corSty"></i>
                <p class="lead">Trained and Certified Team</p>
            </div>            
            <div class="col-md-4 p-4 txt-black">
                <i class="fas fa-sync-alt corSty"></i>
                <p class="lead">24X7 Customer Support</p>
            </div>
            <div class="col-md-4 p-4  txt-black">
                <i class="fas fa-handshake corSty"></i>
                <p class="lead">Reliable & Secure</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 p-4 txt-black ">
                <i class="fas fa-award corSty"></i>  
                <p class="lead">Providing Quality</p>
            </div>            
            <div class="col-md-4 p-4 txt-black">
                <i class="fas fa-stopwatch corSty"></i>
                <p class="lead">Ensuring Timeliness</p>
            </div>
            <div class="col-md-4 p-4 txt-black">
                <i class="fas fa-stamp corSty"></i>
                <p class="lead">60 Days Warantee</p>
            </div>
        </div>       
    </div>
</main> 
<?php
require_once("footer.php");    
?>
</body>
</html>