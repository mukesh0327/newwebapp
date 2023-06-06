<?php
session_start();
?>
<html lang="en">
<head>
	<?php
require_once("externalFile.php");    
?>
	<title>gallery</title>
</head>
<body>
<?php
require_once("header.php");    
?>
<main role="gallery-part">
	<section role="Gallery" class="bg-grey">
		<div class="container">
			<h1 class="txt-dark text-center pt-3 pb-2">Gallery</h1>
			<div class="row">
			<?php
				
				if(is_dir("Gallery")){
					$path = "Gallery/";
					$opfol = opendir($path);
					while($data= readdir($opfol)){
						if($data!="." && $data!==".."){
							$info = $path.$data;
							$ext = strtolower(pathinfo($info, PATHINFO_EXTENSION));
							if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="gif"){
							?>
								<!--<img src="<?php //echo $info; ?>" width="350px" height="250px">-->
								<div class="col-md-4 hvr-grow px-3 py-2">
									<a href="<?php echo $info; ?>" target="_blank">
										<img src="<?php echo $info; ?>" width="350px" height="200px">
									</a>
								</div>
							<?php
							}
						}
					}
				}
			
			?>		
			</div>
		</div>
</section>
</main>
<?php
require_once("footer.php");    
?>
</body>

</html>