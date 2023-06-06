<?php
if(!isset($_SESSION["userdata"]["U_EMail"]) and ($_SESSION["userdata"]["User_Type"]!="Worker")){
       header("location:Error.php");
} 
?>
<style>
.back-ldark{    
background-color: #1d1f21;
}
</style>
<header role="menus">
    <section role="nav-main">
        <div class="navbar navbar-expand-sm navbar-dark back-dark" style="opacity:1;">
            <div class="container">
                <a href="worker_Home.php" class="navbar-brand"><img src="images/khambra3.png"></a>
				<?php
				if(isset($_SESSION["userdata"]["U_Name"])){ ?>
                <div class="">				
                <span class="navbar-brand pl-2" style="font-size:16px">
				Welcome <?php echo $_SESSION["userdata"]["U_Name"]; ?></span>
                <img src="uploads/<?php echo $_SESSION["userdata"]["U_Pic"]; ?>" class="img-fluid userImgSty">
                <ul class="navbar-nav navbar-inline">
                    <li class="nav-item"><a class=" nav-link" href="changePass.php">Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
                </div>
				<?php }
                else {
                ?>
				<div class="">
				<p class="navbar-brand mr-1" style="font-size:16px">
				<span class="text-warning"></span>				
				</p>
                <ul class="navbar-nav navbar-inline justify-content-end">
                    <li class="nav-item"><a class=" nav-link" href="EmpRagistar.php">Signup</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
                </div>
				<?php } ?>
            </div>
        </div>
    </section>
</header>
<!--1st main end-->
 <main role="menus" class="sticky-top">  
    <section role="nav-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-sky">
            <div class="container d-flex justify-content-between">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-data">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="#" class="navbar-brand">Worker Area</a>
               
                <div id="nav-data" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item"><a class="nav-link a-color" href="worker_Home.php">Home</a></li>
<!--                        <li class="nav-item"><a class="nav-link a-color" href="#"></a></li>-->
                        <li class="nav-item"><a class="nav-link a-color" href="worker_Interview.php">Interview</a></li> 
                        <li class="nav-item"><a class="nav-link a-color" href="worker_ReceiveOrder.php">Receive Order</a></li>                                          
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</main>