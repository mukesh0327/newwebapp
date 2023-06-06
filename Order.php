<?php 
session_start();
//echo "<pre>";
// print_r($_SESSION);
$f ='0';
if(!isset($_SESSION["userdata"]["U_EMail"]) and ($_SESSION["userdata"]["User_Type"]!="Customer")){
	$f ='1';
       header("location:EmpRagistar.php?f=$f");
} 
else{
	if(isset($_POST["sid"])){
		$worId = $_POST["sid"]; 
        print $worId;

    }
	else{
		 header("location:services.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Order</title>
</head>

<body id="MainHome">
    <?php
require_once("header.php");    
?>
    <main role="order" id="Order">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-black text-center pt-3 pb-2">Order</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php if(isset($_POST["ordBtn"])){
						print $msg;
			    }
			   ?>
                    <form name="OrderForm" method="post" action="availableWorker.php">
                        <label>Select Sub Category</label>
						
                        <input style="display:none;" type="text" name="wid" value="<?php echo $worId; ?>"> 
						
                        <select id="SubWork" name="subwork" class="pt-1 form-control">
                        <!-- <option selected value=""> -- Select -- </option>  -->
                        <?php
                        require_once("myconnection.php");
                        $obj=new connection;
                        $qs = "SELECT * FROM `add_sub_service` WHERE Ser_Id = '$worId'";
                        $result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
                        $affectRes = mysqli_affected_rows($obj->conn);
                        if($affectRes==0)
                        {
                            print"<option value=''>-- Select --</option>";
                            print"<option value=''>No Any Sub Work Available </option>";
                        }
                        else 
                        {   
                            print"<option value=''>-- Select --</option>";
                            while($y = mysqli_fetch_assoc($result))
                            {
                            ?>
                            <option value="<?php echo $y['SubSer_Id']; ?>">
                                <?php echo $y['SubS_Name']; ?>
                            </option>;
                            <?php
                            }
                        } 
                       ?>
                        </select>
                        <label>Do you own your home?</label>
                        <div aria-label="AnswerField" class="mb-2">
                            <div class="float-left" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="ownY" name="own" checked aria-label="Radio button for following div" value="Yes">
                                            </div>
                                        </div>
                                        <div class="form-control">Yes</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                            <div class="float-right" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="ownN" name="own" aria-label="Radio button for following div" value="No">
                                            </div>
                                        </div>
                                        <div class="form-control">No</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                        </div>

                        <label>What is the nature of your project?</label>
                        <div aria-label="AnswerField" class="mb-2">
                            <div class="float-left" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="NewOld" name="newOld" checked aria-label="Radio button for following div" value="New Install">
                                            </div>
                                        </div>
                                        <div class="form-control">New Install</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                            <div class="float-right" style="width:48%">
                                <div class="form-group">
                                    <label class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" id="NewOld" name="newOld" aria-label="Radio button for following div" value="Repair existing">
                                            </div>
                                        </div>
                                        <div class="form-control">Repair existing</div>
                                        <!--Readonly property can also be used in input field instand div-->
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        
                        <label>When would you like to start?</label>
                        <div aria-label="AnswerField" class="mb-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </span>
                                    <input required type="text" id="DOS" class="form-control" placeholder="MM/DD/YYYY" name="DOS" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="pb-2 ">You Can Change Address Detail</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </span>
                                <input type="text" class="form-control" name="name" 
                                value="<?php echo $_SESSION['userdata']['U_Name']; ?>" placeholder="Name">
                            </div>
                        </div>                       
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </span>
                                <input type="text" class="form-control" name="email" readonly
                                value="<?php echo $_SESSION["userdata"]["U_EMail"]; ?>" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                </span>
                                <input type="text" class="form-control" name="phone"
                                value="<?php echo $_SESSION["userdata"]["U_Phone"]; ?>" placeholder="Phone no.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </span>
                                <textarea type="text" class="form-control py-0" rows="4" name="address" placeholder="Address.."><?php echo $_SESSION["userdata"]["U_Address"]; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-pin"></i>
                                    </div>
                                </span>
                                <input type="text" class="form-control" name="pin" value="<?php echo $_SESSION["userdata"]["U_ZipCode"]; ?>" placeholder="Pincode">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-block btn-black mb-2" name="ordBtn" value="Next">
                    </form>
                    <?php
					//if(isset($_GET["sid"]) or isset($_GET["ordBtn"])){
					//	print $msg;
					//}
                    
                    


					?>
                </div>
            </div>
        </div>
    </main>
    <?php
require_once("footer.php");    
?>
    <script>
        $(function() {
            var minDate = new Date();
            $("#DOS").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate:minDate,
				showAnim:'drop',
                dateFormat:'dd/mm/yy',
            });
        });
    </script>
</body>

</html>