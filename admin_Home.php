<?php
    session_start();
?>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>about</title>
</head>

<body>
    <?php
require_once("admin_header.php");    
?>
    <main class="AdminHome" id="AdminHome">
        <div class="container minHeight">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Welcome Admin</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <p class="txt-dark py-3" style="text-align:justify;">The objective of the project is to design and develop Online House Repair Services Site. KHAMBRA HOUSE REPAIR SERVICE CENTER is a 'One Stop Solution' for all Renovation, Installation, Repair & Maintenance services for Offices & Homes and Solve the Problem of Unemployment.  Hire experienced and professional Plumbers, Electricians, Carpenters and many more on a tap of a finger.  which is a place for Customer and Service Providers to meet. This will act as an interface between them. </p>
                    <p class="txt-dark py-3" style="text-align:justify;">HOUSE REPAIR SERVICE Site stores the record of large amount of different order related all Renovation, Installation, Repair & Maintenance services for Offices & Homes. HOUSE REPAIR SERVICE Site also stores the Registration record of large amount of Workers. This ONLINE House Repair Services Site is divided into three modules such as Customer Module, Worker Module, and Administrator.</p>
                </div>
                <div class="col-md-5">
                    <img src="images/painter%20vector%20image.png" alt="painter image" class="img-fluid">
                </div>
            </div>
        </div>
    </main>
    <?php
require_once("admin_footer.php");    
?>
</body>
</html>