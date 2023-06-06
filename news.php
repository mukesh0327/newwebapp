<?php 
    session_start();
?>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>news</title>
</head>

<body>
    <?php
require_once("header.php");    
?>
    <!-- News -->
    <section class="News-section">
        <div class="container">
            <h1 class="txt-black text-center pt-3 pb-2">Latest News</h1>
            <div class="row">
                <div class="col-md-4 news-padd">
                    <div class="overflow">
                        <div class="rotate-img">
                            <a href="#">
                                <img src="images/g8.jpg" class="img-fluid">
                            </a>
                        </div>
                        <div class="date-sty">
                            <span>10 august</span>
                        </div>
                    </div>
                    <h6 class="link-padd">
                        <a class="news-link-sty" href="single-news.html">Lorem ipsum dolor sit amet.</a>
                    </h6>
                    <p class="text-muted">Suspendisse dapibus felis mauris, id efficitur lacus tincidunt id.
                    </p>
                    <a class="btn btn-style" href="single-news.html" role="button">Read More</a>
                    <hr>
                </div>
                <div class="col-md-4 news-padd">
                    <div class="overflow">
                        <div class="rotate-img">
                            <a href="single-news.html">
                                <img src="images/g5.jpg" class="img-fluid">
                            </a>
                        </div>
                        <div class="date-sty">
                            <span>12 august</span>
                        </div>
                    </div>
                    <h6 class="link-padd">
                        <a class="news-link-sty" href="single-news.html">Lorem ipsum dolor sit amet.</a>
                    </h6>
                    <p class="text-muted">Suspendisse dapibus felis mauris, id efficitur lacus tincidunt id.
                    </p>
                    <a class="btn btn-style" href="single-news.html" role="button">Read More</a>
                    <hr>
                </div>
                <div class="col-md-4  news-padd">
                    <div class="overflow">
                        <div class="rotate-img">
                            <a href="single-news.html">
                                <img src="images/g6.jpg" class="img-fluid" alt="Responsive image">
                            </a>
                        </div>
                        <div class="date-sty">
                            <span>14 august</span>
                        </div>
                    </div>
                    <h6 class="link-padd">
                        <a class="news-link-sty" href="single-news.html">Lorem ipsum dolor sit amet.</a>
                    </h6>
                    <p class="text-muted">Suspendisse dapibus felis mauris, id efficitur lacus tincidunt id.
                    </p>
                    <a class="btn btn-style" href="single-news.html" role="button">Read More</a>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-6  news-padd">
                        <div class="overflow">
                            <div class="rotate-img">
                                <a href=" ">
                                    <img src="images/g8.jpg" class="img-fluid">
                                </a>
                            </div>
                            <div class="date-sty">
                                <span>15 august</span>
                            </div>
                        </div>
                        <h6 class="link-padd">
                            <a class="news-link-sty" href="single-news.html">Lorem ipsum dolor sit amet.</a>
                        </h6>
                        <p class="text-muted">Suspendisse dapibus felis mauris, id efficitur lacus tincidunt id.
                        </p>
                        <a class="btn btn-style" href="single-news.html" role="button">Read More</a>
                        <hr>
                    </div>

                    <div class="col-md-6  news-padd">
                        <div class="overflow">
                            <div class="rotate-img">
                                <a href="single-news.html">
                                    <img src="images/g8.jpg" class="img-fluid">
                                </a>
                            </div>
                            <div class="date-sty">
                                <span>16 august</span>
                            </div>
                        </div>
                        <h6 class="link-padd">
                            <a class="news-link-sty" href="single-news.html">Lorem ipsum dolor sit amet.</a>
                        </h6>
                        <p class="text-muted">Suspendisse dapibus felis mauris, id efficitur lacus tincidunt id.
                        </p>
                        <a class="btn btn-style" href="single-news.html" role="button">Read More</a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //News -->
    <?php
require_once("footer.php");    
?>
</body>

</html>