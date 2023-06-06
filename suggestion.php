<?php session_start(); ?>
<html lang="en">
<head>
<?php
require_once("externalFile.php");    
?>  
<title>Feedback</title>       
</head>
<body>
<?php
require_once("header.php");    
?>
<main role="Contact" id="Contact">
    <div class="container">
            <div class="row">
                <div class="col-md-12 p-1">
                    <h1 class="txt-dark text-center pt-3 pb-2">Feedback</h1>
                </div>
            </div>
			
		
        <div class="row justify-content-center">
            <div class="col-md-6 pb-6">
                <form name="contactForm" method="post" id="form1">
                      <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </div>    
                                </span>
                                <input type="text" id="CName" name="cName" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text"> 
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </span>
                                <input type="email" id="CEMail" name="cEMail" class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">   
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                </span>
                                <input type="text" id="CPhone" name="cPhone" class="form-control" placeholder="Mobile No.">
                            </div>
                        </div>
                   <div class="form-group">
                             <div class="input-group">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </span>
                                <textarea type="text" id="CMsg" name="cMsg" class="form-control py-0" rows="4" placeholder="Message"></textarea>
                            </div>
                        </div>
                    <input type="submit" class="btn btn-block btn-black" name="contactBtn" value="Submit">
				 </form>  
<?php
if(isset($_POST["contactBtn"]))
{
    $cNam = $_POST["cName"];
    $cEma = $_POST["cEMail"];
    $cPho = $_POST["cPhone"];
    $cMsg = $_POST["cMsg"];
    $data='
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 p-2" style="box-shadow: 0px 4px 9px -4px;
        background-color: rgba(120, 170, 214, 0.4);border-top: 6px solid #78aad6;">
            <table>
               <tr class="p-2">
                  <td class="p-2">Name</td> 
                  <th class="p-2">'.$cNam.'</th> 
               </tr>
               <tr class="p-2">
                  <td class="p-2">Email</td> 
                  <th class="p-2">'.$cEma.'</th> 
               </tr>
               <tr class="p-2">
                  <td class="p-2">Phone</td> 
                  <th class="p-2">'.$cPho.'</th> 
               </tr>
               <tr class="p-2">
                  <td class="p-2">Suggestion</td> 
                  <td class="p-2">'.$cMsg.'</td> 
               </tr>               
            </table>  
        </div>
    </div>'; 
    $fp=fopen("suggestion.txt","a");
    fwrite($fp,$data);
    print "Thanks! your Message Send Succesfully";		
}
?>
            </div>          
        </div> 
    </div>
</main> 
<?php
require_once("footer.php");    
?>
</body>
</html>