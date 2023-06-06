<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Add Interview MCQ</title>
</head>

<body id="MainHome">
    <?php
require_once("admin_header.php");   ;    
?>
<main role="AddInterviewMCQ" id="AddInterviewMCQ">
<div class="container">
<div class="row">
    <div class="col-md-12 p-1">
        <h1 class="txt-dark text-center pt-3 pb-2">Add Interview MCQ</h1>
    </div>
</div>
<?php if(isset($amsg)){
			if($amsg=="1"){ ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success! </strong>Service Add Successfully
            </div>
			<?php }	else {?>
			<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning! </strong>Service Add not Successfully! Please Try Again.
            </div>
			<?php } 
            }?>
<form name="AddInterviewMCQForm" id="MCQForm" method="POST" enctype="multipart/form-data" class="w-70 mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group">
                <label for="ServiceName">Select Service</label>
                <div class="input-group">
                    <select id="Serv" name="ser" class="pt-1 form-control">
                        <option selected value="">-- Select --</option>
                        <?php
                        require_once("myconnection.php");
                        $obj=new connection;

                        $qs = "SELECT * FROM `add_service` WHERE 1";
                        $result = mysqli_query($obj->conn,$qs) or die("Error in query :".mysqli_error($obj->conn));
                        $affectRes = mysqli_affected_rows($obj->conn);
                        if($affectRes==0){
							print '<option selected value="">-- Select --</option>';
                            print '<option value="">No Root Service Found</option>';
                        }
                        else{
							//print '<option selected value="">-- Select --</option>';
							while($x = mysqli_fetch_assoc($result)){   
                            ?>
                            <option value="<?php echo $x["Ser_Id"]; ?>">
                                <?php echo $x["Ser_Name"];  ?>
                            </option>
                            <?php
//                                  echo "<pre>";    
//									print_r($x);
//									die();
                            }
                        }
                        ?>
                    </select>
                </div>
				<div id="output"></div>
            </div>
            <div class="form-group">
                <label for="SubServiceName">Select Sub Service</label>
                <div class="input-group">
                    <select id="SubServ" name="subSer" class="pt-1 form-control">
                        <option selected value="">-- Select --</option>                                                   
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="question">Enter Question</label>
                <div class="input-group">
                    <input type="text" id="Question" class="form-control" name="que">
                </div>
            </div>
            <div class="form-group">
                <label for="Ans1">Answer Option 1st</label>
                <div class="input-group">
                    <input type="text" id="Ans1" class="form-control" name="ans1">
                </div>
            </div>
            <div class="form-group">
                <label for="Ans1">Answer Option 2ed</label>
                <div class="input-group">
                    <input type="text" id="Ans2" class="form-control" name="ans2">
                </div>
            </div>
            <div class="form-group">
                <label for="Ans1">Answer Option 3rd</label>
                <div class="input-group">
                    <input type="text" id="Ans3" class="form-control" name="ans3">
                </div>
            </div>
            <div class="form-group">
                <label for="Ans1">Answer Option 4th</label>
                <div class="input-group">
                    <input type="text" id="Ans4" class="form-control" name="ans4">
                </div>
            </div>
            <div class="form-group">
                <label for="Ans1">Correct Answer in Number</label>
                <div class="input-group">
                    <input type="text" id="corAns" class="form-control" name="cAns">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-black mt-5" name="MCQAddBtn" value="Add MCQ">
				<div class="py-2" id="result"></div>
            </div>
        </div>
    </div>
</form>

</div>
</main>
<!--2ed main end-->
    <?php
require_once("footer.php");    
?>
<script>
	$(document).ready(function(){
		 $("#Serv").change(function(){
            var id = $(this).val();
            $.ajax({
                url:"admin_AddMCQAjax.php",
                data:{"serid":id},
                type:"Post",
                success:function(res){
                    $("#output").html("");
                    $("#SubServ").html(res);
                },
                beforeSend:function(){
                    $("#output").html("<img src='images/preloader.gif' width='40px'>");
                },
                error:function(){
                    $("#output").html("Ajax Error");
                }
            });
        }); 
		
		$("#MCQForm").submit(function(e)
		{
			e.preventDefault();
			var fd = new FormData($(this)[0]);
			$.ajax({
				url:"admin_AddMCQAjax.php",
				data:fd,
				type:"post",
				cache:false,
				contentType:false,
                processData:false,
                success:function(res)
				{
					if(res=="1"){
					    $("#result").html("MCQ Add Successfully");
					}
					else if(res=="0"){
					    $("#result").html("MCQ Not Add Successfully! Please try Again.");
					}	
					else if(res=="2"){
					    $("#result").html("Please Select Root Service");
					}
					else{
						$("#result").html(res);					
					}									
                    $("#MCQForm")[0].reset();
                },
                beforeSend:function()
				{
                    $("#result").html("<img src='images/preloader.gif' width='50px'>");
                },
                error:function()
				{
                    $("#result").html("ajax Error");
                }
            }); 
        });
		
	});
</script>
</body>
</html>