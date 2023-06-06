<?php
session_start();
?>
<?php
if(isset($_POST["loginBtn"])){
$una = $_POST["userName"];
$pas = $_POST["password"];
    require_once("myconnection.php");
    $obj=new connection;
	$qs = "SELECT * FROM `signup` WHERE (U_EMail = '$una' or U_Phone = '$una') and U_Password = '$pas'" or die("Error In Query :".mysqli_error($obj->conn));
	$result = mysqli_query($obj->conn,$qs);
    $count = mysqli_affected_rows($obj->conn);
 	if($count==1){
		$x = mysqli_fetch_array($result);
        $_SESSION["userdata"] = $x;
        if($_SESSION["userdata"]["User_Type"]=="Customer"){
            header("location:index.php");
        }
        else if($_SESSION["userdata"]["User_Type"]=="Worker"){
            header("location:worker_Home.php");
        }
        else if($_SESSION["userdata"]["User_Type"]=="Admin"){
            header("location:admin_Home.php");
        }
        else{
            $logMsg = "Wrong UserName/Password";
            print $logMsg;
        }
		/*echo "<pre>"; 
		print_r($_SESSION);
		die();*/
    }
	else{
		$msg = "Login not Successfully! Please Try again";
        print $msg;
    }
}
?>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>login</title>
	<style>
    .bgSty{
        background: url(images/bg7%20copy.png);        
    }    
</style>
</head>

<body>
    <?php
require_once("header.php");    
?>
    <main role="Login" id="Login">
        <div class="container-fluid bg-grey bgSty">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-black text-center pt-3 pb-2">Login</h1>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-md-5 pb-5">
                    <form form="LoginForm" method="post">
                        <div class="form-group">
                            <div class="input-group input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </span>
                                <input type="text" id="UserName" name="userName" class="form-control" placeholder="E-mail/Mobile No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </span>
                                <input type="password" id="Password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="input-group">                              
                                <input type="checkbox" id="Check" name="check" value="">
                                <div readonly class="ml-1" style="font-size:14px;">Keep me Login</div>
                                <!--Readonly property can also be used in input field instand div-->
                            </label>
                        </div>
                        <input type="submit" class="btn btn-block btn-black mt-5" name="loginBtn" value="Login">
                    </form>
                    <p class="text-center txt-light py-5 lead">or Sign up with social media</p>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block mb-2"><i class="fab fa-facebook-square"></i> Facebook</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block  mb-2"><i class="fab fa-twitter-square"></i>
                                Twitter</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-danger btn-block  mb-2"><i class="fab fa-google-plus-square"></i> Google</button>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-1"></div>
                <div class="col-md-5 pb-5">
                    <img src="images/site-logo.png" class="img-fluid align-middle py-5">
                </div>-->
            </div>
        </div>
    </main>
    <?php
require_once("footer.php");    
?>
</body>

</html>
