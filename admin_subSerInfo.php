<?php
session_start();
function generate_page_links($cur_page, $num_pages) 
{
$page_links = '';

// If this page is not the first page, generate the "previous" link
if ($cur_page > 1) 
{
$page_links .= '<a href="admin_subSerInfo.php?page=' . ($cur_page - 1) . '">PREV</a> ';
}

// Loop through the pages generating the page number links
for ($i = 1; $i <= $num_pages; $i++) 
{
if ($cur_page == $i) 
{
$page_links .= ' ' . $i;
}
else 
{
$page_links .= ' <a href="admin_subSerInfo.php?page=' . $i . '"> ' . $i . '</a>';
}
}

// If this page is not the last page, generate the "next" link
if ($cur_page < $num_pages) {
$page_links .= ' <a href="admin_subSerInfo.php?page=' . ($cur_page + 1) . '">NEXT</a>';
}
return $page_links;
}
?>
<html lang="en">
<head> 
<title>Sub Services Information</title>  
<?php
require_once("externalFile.php");    
?>      
</head>
<body>
<?php
require_once("admin_header.php");    
?>
<main role="SubServiceInfo" id="SubServiceInfo">
<div class="container-fluid  minHeigh pt-4 pb-5">
    <h1 class="txt-dark text-center py-5">Sub Services Information Table</h1>
	<?php
	require_once("myconnection.php");
    $obj=new connection;
    $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $results_per_page =3; // number of results per page
	$skip = (($cur_page - 1) * $results_per_page); //3*2   
	$q="select * from add_sub_service";
	mysqli_query($obj->conn,$q)or die();
	$count=mysqli_affected_rows($obj->conn);
	$num_pages = ceil($count / $results_per_page);
	$query = "select * from add_sub_service limit $skip, $results_per_page";
	$res=mysqli_query($obj->conn,$query)or die();
	$count=mysqli_affected_rows($obj->conn);
	
	if($count==0)
	{
     print"no records found";
	}
	else	
	{	
  print"<table class='table table-bordered'>";
	print"<tr class='bg-black txt-grey text-center'>
			<th>Root Service Id </th>
			<th>Sub Service Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>";
		while($x=mysqli_fetch_array($res)) 
		{
		print"<tr class='HovSty text-center'>
				<td>
					 $x[Ser_Id]									
			</td>
				<td>
					$x[SubS_Name]
				</td>
				<td>
					 $x[SubS_Desc]
				</td>
				<td class='text-center'>
					<img src='adminUploads/$x[SubS_Pic]' width='50px'/>
				</td>
				<td>
					<a class='updateCls txt-green' 
						href='admin_AddSubService.php?sid=$x[SubSer_Id]'>
							<i title='Update Row' class='fas fa-edit'></i>
						</a>
				</td>
				<td>
					<a class='deleteCls txt-orange' id='$x[SubSer_Id]' href=''>
							<i title='Delete Row' class='fas fa-minus-square'></i>
						</a>
				</td>					
			</tr>";	
		}
		print"</table>";
		if ($num_pages > 1) 
        {
			echo generate_page_links($cur_page, $num_pages);
		}
		}
		?>
</div>
</main> 
<?php
require_once("admin_footer.php");    
?>
	<script>
	
        $(document).ready(function() {
            $(".deleteCls").click(function(e) {
                e.preventDefault();
                var id = $(this).attr("id");
                var par = $(this).parent();
                var gpar = $(this).parent().parent();
                $.ajax({
                    url: "admin_deleteInfoAjax.php",
                    data: {
                        "ssid": id
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