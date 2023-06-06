<?php
if(!isset($_SESSION["userdata"]["U_EMail"]) and ($_SESSION["userdata"]["User_Type"]!="Admin")){
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
                <a href="admin_Home.php" class="navbar-brand"><img src="images/khambra3.png"></a>
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
                <a href="#" class="navbar-brand">Admin Area</a>
               
                <div id="nav-data" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link a-color" href="admin_Home.php">Home</a></li>                                            
                        <li class="nav-item"><a class="nav-link a-color" href="admin_Ragistar.php">Register</a></li>
						<li class="nav-item dropdown">
                            <a class="nav-link a-color" data-toggle="dropdown" href="#">Output</a>
                            <ul class="dropdown-menu bg-black mt-1" style="opacity:0.9;">
                                <li class="nav-item"><a class="nav-link a-color" href="admin_signInfo.php">Signup Detail</a></li>
                                <li class="nav-item"><a class="nav-link a-color" href="admin_contactInfo.php">Contact Detail</a></li>                                
                                <li class="nav-item"><a class="nav-link a-color" href="admin_serInfo.php">Service Detail</a></li>
								<li class="nav-item"><a class="nav-link a-color" href="admin_subSerInfo.php">Sub Service Detail</a></li> 
                               <li class="nav-item"><a class="nav-link a-color" href="viewsuggestion.php">View Feedback</a></li>								
                            </ul>
                        </li>
						<li class="nav-item dropdown">
                            <a class="nav-link a-color" data-toggle="dropdown" href="#">Insertion</a>
                            <ul class="dropdown-menu bg-black mt-1" style="opacity:0.9;">
                                <li class="nav-item"><a class="nav-link a-color" href="admin_AddService.php">Add Service</a></li>
                                <li class="nav-item"><a class="nav-link a-color" href="admin_AddSubService.php">Add Sub Service</a></li>
                                <li class="nav-item"><a class="nav-link a-color" href="admin_AddMCQ.php">Add MCQ</a></li>
                                <li class="divider"></li>
								<li class="nav-item"><a class="nav-link a-color" href="admin_MakeDir.php">AddFolder</a></li>
								<li class="nav-item"><a class="nav-link a-color" href="admin_AddGalleryPic.php">AddGalleryPic</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</main>
