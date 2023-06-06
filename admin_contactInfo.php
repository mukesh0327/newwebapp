<?php
session_start();
	require_once("myconnection.php");
    $obj=new connection;
	$qs = "SELECT * FROM contact";
	$conResult = mysqli_query($obj->conn,$qs) or die("Select Query Error :".mysqli_error($obj->conn));
  	$count = mysqli_affected_rows($obj->conn);
	if($count>0){
		$msg = "";
	}
	else{
		$msg = "Not Any Record Available";
	}

?>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>Admin Contact Information</title>
</head>

<body>
    <?php
require_once("admin_header.php");    
?>
    <main role="Contact" id="Contact">
        <div class="container-fluid minHeigh pt-4 pb-5">
            <h1 class="txt-dark text-center py-5">Contact Information Table</h1>

            <?php print $msg; ?>
            <form name="ConInfoForm" id="ConInfo" method="post">
                <table class="table table-bordered">
                    <tr class="bg-black txt-grey text-center">
                        <th>Contact_Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Select</th>
                    </tr>
                    <?php  while($s=mysqli_fetch_array($conResult)) { ?>
                    <tr class="HovSty">
                        <td>
                            <?php echo $s[0]; ?>
                        </td>
                        <td>
                            <?php echo $s[1]; ?>
                        </td>
                        <td>
                            <?php echo $s[2]; ?>
                        </td>
                        <td>
                            <?php echo $s[3]; ?>
                        </td>
                        <td>
                            <?php echo $s[4]; ?>
                        </td>
                        <td>
                            <?php echo $s[5]; ?>
                        </td>
                        <td>
                            <?php echo ""; ?>
                        </td>
                        <td class="text-center">
                            <a class="updateCls txt-green" id="<?php echo $s[0]; ?>" href="javascript:void()">
                                <i title="Update Row" class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="deleteCls txt-orange" id="<?php echo $s[0]; ?>" href="javascript:void()">
                                <i title="Delete Row" class="fas fa-minus-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <input class="selCls" type="checkbox" name="cb[]" id="<?php echo $s[0]; ?>" value="<?php echo $s[0]; ?>">
                        </td>
                    </tr>
                    <?php  }  ?>
                </table>
                <input type="submit" class="btn btn-danger float-right" value="Delete" name="delAllBtn">
            </form>
        </div>
    </main>
    <?php
require_once("admin_footer.php");    
?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script/>-->
    <script>
        $(document).ready(function() {
            $("#ConInfo").submit(function(e) {             
                e.preventDefault();              
                var par1 = $(".selCls").parent();
                var gpar1 = $(".selCls").parent().parent();
                $.ajax({
                    url: "admin_deleteInfoAjax.php",
                    data:$("#ConInfoForm").serialize(),
                    type: "Post",
                    success: function(res) {
                        alert(res);
//                        gpar1.css({
//                            'backgroundColor': '#f2776d'
//                        });
//                        gpar1.fadeOut(600, function() {
//                            gpar1.remove();
//                        });
                    },
                    beforeSend: function() {
                        par1.append("<img src='images/preloader.gif' width='40px'>");
                    },
                    error: function() {
                        alert("Error In Ajax");
                    }
                });
            });

            $(".deleteCls").click(function(e) {
                e.preventDefault();
                var id = $(this).attr("id");
                var par = $(this).parent();
                var gpar = $(this).parent().parent();
                $.ajax({
                    url: "admin_deleteInfoAjax.php",
                    data: {
                        "cid": id
                    },
                    type: "Post",
                    success: function(res) {
                        gpar.css({
                            'backgroundColor': '#f2776d'
                        });
                        gpar.fadeOut(600, function() {
                            gpar.remove();
                        });
                    },
                    beforeSend: function() {
                        par.append("<img src='images/preloader.gif' width='40px'>");
                    },
                    error: function() {
                        alert("Error In Ajax");
                    }
                });
            });
        });
    </script>
</body>

</html>