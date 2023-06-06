<?php
session_start();
?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>House Repair Service Center</title>       
</head>
<body>
<?php
require_once("header.php");    
?>
<?php 
    if(isset($_GET["res"])){
    $res = $_GET["res"];
    if($res == "orderConditionMsg"){
        print "Please Login or Signup First Befor Place Order";
    }
}
?>
<main role="home">
    <section role="home-top">
        <div id="banner-bg">
            <div class="dark-overlay">
                <div class="container pt-5">
                    <p style="max-width:420px;font-size: 45px" class="txt-light my-3 py-4">
                        It is an initiative to mould the unorganized repair industry into an organized one
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
<main role="home">
    <section role="home-top">    
                    <div class="container">
                        <p class="display-4 txt-black py-5">
                        It is an initiative to mould the unorganized repair industry into an organized one
                        </p>
                    </div>           
    </section>
</main>
<?php
require_once("footer.php");    
?>
</body>
</html>