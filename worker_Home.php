<html lang="en">
<?php 
session_start();
   require_once("myconnection.php");
    $obj=new connection;
//    WHERE (U_EMail = '$una' or U_Phone = '$una')
    $serid = $_SESSION["userdata"]["U_Work"];
    $suSerId = $_SESSION["userdata"]["U_SubWork"];
    $wStatus = $_SESSION["userdata"]["worker_Status"];
    $wid = $_SESSION["userdata"]["U_EMail"] or $_SESSION["userdata"]["U_Phone"];
    /* OnBtn -> Update Worker Status Information Code Start */
    if(isset($_GET["statusOn"])){
        $wStatus = $_GET["statusOn"];
//        print $wid."<br>";
//        print $val ;
//        die();
//      $qs = "UPDATE `signup` SET `worker_Status`= $val WHERE U_EMail = $wid or U_Phone = $wid";
//       UPDATE `add_service` SET `Ser_Description`='My name is Khan' WHERE Ser_Id ='27' 
        $qu="UPDATE `signup` SET `worker_Status`='$wStatus' WHERE U_EMail = '$wid' or U_Phone ='$wid'";
        mysqli_query($obj->conn,$qu) or die("Update Worker Status Query Error :".mysqli_error($obj->conn));
        $count = mysqli_affected_rows($obj->conn);
        if($count==1)
        {
            $wStatus;                  
        }
        else
        {
            $wStatus;
        }
    }
    /* OnBtn -> Update Worker Status Information Code End */
    
    /* OffBtn ->Update Worker Status Information Code Start */
    if(isset($_GET["statusOff"])){
        $wStatus = $_GET["statusOff"];
        $qu="UPDATE `signup` SET `worker_Status`='$wStatus' WHERE U_EMail = '$wid' or U_Phone ='$wid'";
        mysqli_query($obj->conn,$qu) or die("Update Worker Status Query Error :".mysqli_error($obj->conn));
        $count = mysqli_affected_rows($obj->conn);
        if($count==1)
        {
            $wStatus;                  
        }
        else
        {
            $wStatus;
        }
    }
    /* OffBtn -> Update Worker Status Information Code End */
    
    /* Select Service Information Code Start */
    $qs = "SELECT * FROM `add_service` WHERE Ser_Id ='$serid'";
    $sconResult = mysqli_query($obj->conn,$qs) or 
        die("Select Query from add sevices Error :".mysqli_error($obj->conn));
    $count = mysqli_affected_rows($obj->conn);
    if($count==1)
    {
         $a = mysqli_fetch_array($sconResult);
         $smsg = $a['Ser_Name'];
    }
    else
    {
         $smsg =  "No Service Name";
    }
    /* Select Service Information Code End */
    /* Select Service Information Code Start */
    /*$qs = "SELECT * FROM `add_service` WHERE Ser_Id = $serid";
    $sconResult = mysqli_query($obj->conn,$qs) or die("Select Query from add sevices Error :".mysqli_error($obj->conn));
    $count = mysqli_affected_rows($obj->conn);
    if($count==1)
    {
         $a = mysqli_fetch_array($sconResult);
         $smsg = $a['Ser_Name'];
    }
    else
    {
         $smsg =  "No Service Name";
    }*/
    /* Select Service Information Code End */
    
   /* Select Sub Service Information Code Start */
    if(isset($_SESSION["userdata"]["U_SubWork"]) and $_SESSION["userdata"]["U_SubWork"]!=""){
        $qs = "SELECT * FROM `add_sub_service` WHERE SubSer_Id = $suSerId";
        $ssconResult = mysqli_query($obj->conn,$qs) or die("Select Query from add Sub Services Page Worker_Home Error :".mysqli_error($obj->conn));
        $countR = mysqli_affected_rows($obj->conn);
        if($countR==1)
        {
             $z = mysqli_fetch_array($ssconResult);
             $ssmsg = $z['SubS_Name'];
        }
        else
        {
             $ssmsg =  "No Sub Service Name";
        } 
    }
    else
        {
             $ssmsg =  "";
        }
    /* Select Sub Service Information Code End */

//mysqli_close($conn);
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>
    <title>Worker Home</title>
</head>

<body>
    <?php
require_once("worker_header.php");    
?>
    <main role="workerHome" id="workerHome">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Welcome Worker Site</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p class="txt-dark py-3" style="text-align:justify;">The objective of the project is to design and develop Online House Repair Services Site. KHAMBRA HOUSE REPAIR SERVICE CENTER is a 'One Stop Solution' for all Renovation, Installation, Repair & Maintenance services for Offices & Homes and Solve the Problem of Unemployment. Hire experienced and professional Plumbers, Electricians, Carpenters and many more on a tap of a finger. which is a place for Customer and Service Providers to meet. This will act as an interface between them. </p>
                    <p class="txt-dark py-3" style="text-align:justify;">HOUSE REPAIR SERVICE Site stores the record of large amount of different order related all Renovation, Installation, Repair & Maintenance services for Offices & Homes. HOUSE REPAIR SERVICE Site also stores the Registration record of large amount of Workers. This ONLINE House Repair Services Site is divided into three modules such as Customer Module, Worker Module, and Administrator.</p>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-header p-0 text-center">
                            <img src="uploads/<?php echo $_SESSION["userdata"]["U_Pic"]; ?>" class="img-fluid userImgSty m-2 p-1">
                        </div>
                        <div class="card-body text-left p-3">
                            <!--  <i class="fas fa-star"></i><i class="far fa-star"></i><i class="fas fa-star-half-alt"></i> -->
                            <div class="">
                                <p class="py-1 m-0 text-muted">Set Your Status</p>
                                <p class="d-flex justify-content-between py-1 my-0 lead  align-items-center">
                                    <?php echo $_SESSION["userdata"]["U_Name"]; ?>
                                    <span class="text-muted" style="font-size:15px;">Status
                                        <?php 
                                        if($wStatus == "off"){
                                        ?>
                                        <i class="fas fa-circle txt-orange ml-1"> </i>
                                        <?php } else { ?>
                                        <i class="fas fa-circle txt-green ml-1"></i>
                                        <?php } ?>
                                    </span>

                                    <!--                                                                        <i class="fas fa-circle"></i>-->
                                </p>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <i class="fas fa-star starSty"></i>
                                <span class="text-muted" style="font-size:13px;"> 4.5 out of 5</span>
                            </div>
                            <p class="py-1 my-0 text-muted">
                                <?php  print  $smsg;  ?>
                            </p>
                            <p class="py-1 my-0 text-muted" style="font-size:14px">
                                <?php print $ssmsg; ?>
                            </p>

                            <a href="worker_Home.php?statusOn=on" class="btn btn-green float-right my-2" style="width:40%" name="onBtn">On</a>
                            
                            <a href="worker_Home.php?statusOff=off" class="btn btn-orange  my-2" style="width:40%" name="offBtn">Off</a>

                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <?php
require_once("worker_footer.php");    
?>
</body>

</html>