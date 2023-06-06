<?php
session_start();
if(isset($_GET["sid"])){
    $sid = $_GET["sid"];
}
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>Sub Services</title>       
</head>
<body>
<?php
require_once("header.php");    
?>
  <main role="SubServices" id="SubService">
    <div class="container minHeight">
        <div class="row">
            <div class="col-md-12 p-1">
                <h1 class="txt-dark text-center pt-3 pb-2">Select Services Detail</h1>
            </div>
        </div>
        <div class="row p-2" style="border:1px solid #e5e3e3">
            <?php
                require_once("myconnection.php");
                $obj=new connection;

                $qs = "SELECT * FROM `add_service` WHERE Ser_Id = $sid";
                $result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
                $affectRes = mysqli_affected_rows($obj->conn);
                if($affectRes==0) 
                {
                    print "Service Detail Not Available";
                }
                else
                {
                    while($x = mysqli_fetch_assoc($result)){
                    //    echo "<pre>";
                    //    print_r($x);
                    //    die();
                    ?>                    
                    <div class="col-md-3 p-2 text-center">
                    <img src="adminUploads/<?php echo $x["Ser_Pic"]; ?>" alt="PlumberIMAGE" class="img-fluid img-back img-thumbnail p-5" style="width:300px;">
                    <h4><?php echo $x["Ser_Name"]; ?></h4>
                    </div> 
                    <div class="col-md-9 p-2">
                    <h4><?php echo $x["Ser_Name"]; ?> Service Discription</h4>
                    <p><?php echo $x["Ser_Description"]; ?></p>
               <a href="Order.php?sid=<?php echo $x['Ser_Id']; ?>" class="btn btn-dark">Place Order</a>
              </div>    
                 <?php       
                    }  
                }
            ?>
            
        </div>
<!--
        <div class="row text-center">
            <div class="col-md-4 p-4 hvr-grow">
                <a href="Order.php"><img src="images/trowel.png" alt="Mason IMAGE" class="img-fluid" class="img-fluid"></a>  
                <h5>Mason</h5>
            </div>
             <div class="col-md-4 p-4 hvr-grow">
                 <a href="Order.php"><img src="images/gardner-tool.png"  alt="Gardener IMAGE" class="img-fluid"></a>
                <h5>Gardener</h5>
            </div>
            <div class="col-md-4 p-4 hvr-grow">
                <a href="Order.php"><img src="images/paint-brush.png"  alt="Painter IMAGE" class="img-fluid"></a>
                <h5>Painter</h5>
            </div>           
        </div>
-->
    </div>
</main>
<?php
require_once("footer.php");    
?>
</body>
</html>