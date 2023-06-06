<?php
session_start();

?>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Worker Receive Order Detail</title>    
</head>
<body>
    <?php
require_once("worker_header.php");    
?>
    <main role="workerReceiveOrder" id="WorkerReceiveOrder">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Worker Receive Order</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-header p-0 text-center">
<!--                            <img src="uploads/1551261186sm1.jpg" class="bg-grey userImgSty m-2 p-1" alt="Customer Image" width="40%" style="">-->
                            <img src="uploads/noImg3.png" class="bg-grey userImgSty m-2 p-1" alt="Customer Image" width="40%" style="">
                            <p class="text-center lead">Satish Kumar</p>
                        </div>
                        <div class="card-body text-left p-3">
                            <!--  <i class="fas fa-star"></i><i class="far fa-star"></i><i class="fas fa-star-half-alt"></i> -->
                            <div class="">
                                <p class="py-1 text-muted">Customer Detail</p>
                                <p class="d-flex justify-content-between py-1 my-0 text-muted align-items-center">
                                Estimated Distance
                                <span class="text-muted" style="font-size:15px;"><i class="fas fa-map-marker-alt"></i> 25 km</span>
                                </p> 
                                <p class="d-flex justify-content-between py-1 my-0 align-items-center text-muted">
                                   Start Work Date
                                    <span class="text-muted" style="font-size:15px;"><i class="fas fa-calendar"></i> 03/03/2019</span>
                                </p>
                                <p class="d-flex justify-content-between py-1 my-0 align-items-center text-muted">
                                   Require Service
                                    <span class="text-muted" style="font-size:15px;">Painter -> <i>Painter Type 1</i></span>
                                </p>                                    
                            
                            <hr>
                            <div class="" style="display:none;"><!--Customer Contact Information show After Accept Order-->         
                                <p class="text-muted float-right">144001</p>
                                <p class="text-muted">Vpo Khambra</p>
                                <p class="text-muted float-right">goldy@gmail.com</p>
                                <p class="text-muted">9988776655</p>
                                <hr>
                            </div>                          
                                            
<!--
                            <div class="mb-2">
                                <i class="far fa-clock mr-2"> </i><span>From 10:30AM </span><span> To 5:30PM</span>
                            </div>                           
-->
                            <button type="submit" class="btn btn-green float-right" style="width:40%" name="">Accept</button> <button type="submit" class="btn btn-orange" style="width:40%" name="">Reject</button>
                        </div>
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