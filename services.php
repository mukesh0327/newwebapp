<?php
session_start();
?>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Services</title>
</head>

<body>
    <?php
require_once("header.php");    
?>
    <main role="Services" id="Service">
        <div class="container minHeight back-grey">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-black text-center pt-3 pb-2">Services</h1>
                </div>
            </div>
			
						
            <div class="row text-center" id="accordion">			
                <?php
                    require_once("myconnection.php");
                    $obj=new connection;

                    $qs = "SELECT * FROM `add_service` WHERE 1";
                    $result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
                    $affectRes = mysqli_affected_rows($obj->conn);
                    if($affectRes==0) {
                        print "No Any Root Service Available";
                    }
                    else {                           
                    while($x = mysqli_fetch_assoc($result)){  
                    ?>
                <div class="col-md-3 my-3">
                    <div class="card">                        
                        <div class="card-body hvr-grow">
							<form name="selServiceForm" method="post" action="Order.php">
								<button type="submit" class="btn btn-grey" name="sid" value="<?php echo $x['Ser_Id']; ?>">
									<img  src="adminUploads/<?php echo $x["Ser_Pic"]; ?>" alt="Image" class="img-fluid img-back servIconSize">
								</button>
							</form>
                        </div>
                        <a class="dropdown-toggle " data-toggle="collapse" href="#collapse<?php echo $x["Ser_Id"]; ?>">
                            <div class="card-footer">
                                <p class="text-center h5">
                                    <?php echo $x["Ser_Name"]; ?> Detail
                                </p>
                            </div>
                        </a>
                        <div id="collapse<?php echo $x["Ser_Id"]; ?>" class="collapse w-100" data-parent="#accordion">
                            <?php
                                echo substr($x["Ser_Description"],0,100);
                            ?>
                            <a href="ServicesDetail.php?sid=<?php echo $x['Ser_Id']; ?>"> Read More</a>  
                        </div>
                    </div>
                </div>
                <?php } 
                }   ?>
            </div>
        </div>
    </main>
    <?php
require_once("footer.php");    
?>
</body>
</html>