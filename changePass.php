<?php
session_start();
//if(isset($_SESSION["userdata"]["U_EMail"])){
if(isset($_POST["cPassBtn"])){
$una = $_SESSION["userdata"]["U_EMail"] or $_SESSION["userdata"]["U_Phone"];
$oldpas = $_POST["oldPass"];
$newpas = $_POST["newPassword"];
$conpas = $_POST["conPassword"];
    // print $una."<br>".$oldpas."<br>".$newpas."<br>".$conpas;
    //die();
    if($newpas!=$conpas){
    $conPassMsg = "Confirm Password Not Match";
    print $conPassMsg;
    }   
    else {
    require_once("myconnection.php");
    $obj=new connection;
	$qu = "UPDATE `signup` SET `U_Password`='$newpas',`U_CPassword`='$conpas' WHERE (U_EMail = '$una' or U_Phone = '$una') and U_Password = '$oldpas'";
	mysqli_query($obj->conn,$qu) or die("Error In Query :".mysqli_error($obj->conn));
    $count = mysqli_affected_rows($obj->conn);
        if($count==1){		
            $msg = "Change Password Successfully";   
            print $msg;
        }
        else{
            $msg = "Change Password not Successfully! Please Try again";
            print $msg;
        }
    }
}
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>
    <title>Change Password</title>
</head>
<body>
<?php
require_once("header.php");    
?>

<main role="CPassword" id="CPassword">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-1">
                <h1 class="txt-dark text-center pt-3 pb-2">Change Password</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 pb-5">
                <form form="cPassForm" method="post">
                    <div class="form-group">
                        <div class="input-group input-group">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </span>
                            <input type="password" id="OldPass" name="oldPass" class="form-control" placeholder="Old Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </span>
                            <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="New Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-check-double"></i>
                                </div>
                            </span>
                            <input type="password" id="ConPassword" name="conPassword" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-warning font-weight-bold" name="cPassBtn" value="Change Password">
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require_once("footer.php");    
?>
</body>
</html>
<?php
// } else {     header("location:Error.php");}
?>