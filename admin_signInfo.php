<?php
session_start();
?>
<?php
//  echo "<pre>";
//  print_r($_GET);
//  die();
	require_once("myconnection.php");
    $obj=new connection;
	$qs = "SELECT * FROM signup";
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
    <title>Admin Signup Information</title>
    <style>
        tr.HovSty:hover {
        background-color: #f6cc4a;
    } 
</style>
</head>

<body>
    <?php
require_once("admin_header.php");    
?>
    <main role="signupInfo" id="SignupInfo">
        <div class="container-fluid pt-4 pb-5">
            <h1 class="txt-dark text-center py-5">Employee Signup Information Table</h1>

            <?php print $msg; ?>
            <table class="table table-bordered table-responsive">
                <tr class="bg-black txt-grey text-center">
                    <th>User</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Email Id</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Address</th>
                    <th>PinCode</th>
                    <th>User Pic</th>
                    <th>Work</th>
                    <th>Id Prof</th>
                    <th>New Work</th>
                    <th>Time</th>
                    <th>Select</th>
					<th>Update</th>
                    <th>Delete</th>
                    
                </tr>


                <?php  while($s=mysqli_fetch_array($conResult)) { ?>
                <tr class="HovSty">
                    <td>
                        <?php echo $s["User_Type"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Name"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_DOB"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Gender"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_EMail"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Phone"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Password"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Country"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_State"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_Address"]; ?>
                    </td>
                    <td>
                        <?php echo $s["U_ZipCode"]; ?>
                    </td>
                    <td>
						<img src='uploads/<?php echo $s["U_Pic"]; ?>' width='65px' height='65px' />                        
                    </td>
                    <td>
                        <?php echo $s["U_Work"]; ?>
                    </td>
                    <td>
                        <img src='uploads/<?php echo $s["U_IdProf"]; ?>' width='75px' height='65px'/>
                    </td>
                    <td>
                        <?php echo $s["U_New_Work"]; ?>
                    </td>
                    <td>
                        <?php echo ""; ?>
                    </td>
                    <td class="text-center">
                        <input class="" type="checkbox" name="row">
                    </td>
					<td class="text-center">
                        <a title="Update Row" class="txt-green" href="Update.php?sid=<?php echo $s[" U_EMail"]; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a title="Delete Row" class="txt-orange" href="Delete.php?sid=<?php echo $s[" U_EMail"]; ?>">
                            <i class="fas fa-minus-square"></i>
                        </a>
                    </td>
                    
                </tr>
                <?php  }  ?>
            </table>
        </div>
    </main>
    <?php
    require_once("admin_footer.php");    
?>
</body>

</html>