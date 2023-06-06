<!--
<script>
    function show1() {
        document.getElementById("myInput").style.display = "block";
        document.getElementById("sea-btn").style.display = "none";
        document.getElementById("cls-btn").style.display = "block";
    }

    function show2() {
        document.getElementById("myInput").style.display = "none";
        document.getElementById("cls-btn").style.display = "none";
        document.getElementById("sea-btn").style.display = "block";
    }
</script>
-->

<header role="menus">
    <section role="nav-main">
        <div class="navbar navbar-expand-sm navbar-dark back-dark" style="opacity:1;">
            <div class="container">
                <a href="index.php" class="navbar-brand"><img src="images/khambra3.png"></a>
                <?php
				if(isset($_SESSION["userdata"]["U_Name"])){ ?>
                <div class="">
                    <span class="navbar-brand pl-2" style="font-size:16px">
                        Welcome
                        <?php echo $_SESSION["userdata"]["U_Name"]; ?></span>
                    <img src="uploads/<?php echo $_SESSION["userdata"]["U_Pic"]; ?>" class="img-fluid userImgSty">
                    <ul class="navbar-nav navbar-inline">
                        <li class="nav-item"><a class="nav-link a-color" href="changePass.php">Change Password</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <?php } else { ?>
                <div class="">
                    <p class="navbar-brand mr-1" style="font-size:16px">
                        <span class="text-warning"></span>
                    </p>
                    <ul class="navbar-nav navbar-inline justify-content-end">
                        <li class="nav-item"><a class="a-color nav-link" href="EmpRagistar.php">Signup</a></li>
                        <li class="nav-item"><a class="a-color nav-link" href="login.php">Login</a></li>
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
        <nav class="navbar navbar-expand-md navbar-dark bg-sky" style="opacity:1;">
            <div class="container d-flex justify-content-between">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-data">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                    <div class="form-group mt-3">
                        <div class="input-group ">
                            <input id="tags" name="search" type="text" class="form-control" placeholder="Search Service. ." style="border-radius:0px;opacity:0.9;">
                            <div class="input-group-append">
                                <button type="button" id="sea-btn" onclick="" class="btn btn-dark" style="border-radius:0px;"><i class="fa fa-search sea-link" ></i></button>
<!--                                <button type="button" style="display: none" id="cls-btn" onclick="show2()" class="btn btn-dark sea-btn-sty"><i class="fa fa-times sea-link"></i></button>-->
                            </div>
                        </div>
                    </div>            
                <div id="nav-data" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item"><a class="nav-link a-color" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="corporate.php">Maintenance</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="services.php">Services</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="news.php">News</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="OrderStatus.php">OrderStatus</a></li>
                        <li class="nav-item"><a class="nav-link a-color" href="contact.php">Contact</a></li>
						<li class="nav-item"><a class="nav-link a-color" href="suggestion.php">Feedback</a></li>
                        <!--                    <li class="nav-item"><a class="nav-link a-color" href="Order.php">Order</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</main>


