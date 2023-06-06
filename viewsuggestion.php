<?php
session_start();
?>

<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>Feedback</title>       
</head>
<body>
<?php
require_once("admin_header.php");    
?>

<main role="Contact" id="Contact">
    <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">View Feedback</h1>
					<?php
						$fp=fopen("suggestion.txt","r");
						$data=fread($fp,filesize("suggestion.txt"));
						print $data."</br>";
						fclose($fp);
						?>
                </div>
            </div>
			
		
         
    </div>
</main> 
<?php
require_once("admin_footer.php");    
?>
</body>
</html>