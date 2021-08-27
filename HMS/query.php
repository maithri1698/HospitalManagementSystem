<?php
session_start();
error_reporting(0);
if(isset($_SESSION['admin'])){
}else{
header('location:adminlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Queries</title>
</head>
<body>
 <?php 
include("link.php");
include("ribbon.php");
include("connection.php");
 ?>
 <div class="container-fluid" style= "background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);">
 	<div class="col-md-12">
 		<div class="row">
 			<div class="col-md-2" style="margin-left: -30px">
 				<?php
 					include("sidenav.php");
 				?>
 			</div>
 			<div class="col-md-10">
                  <h5 class="text-center my-3">Total Queries</h5>

 				<?php


 				$query = "SELECT * FROM queries";
 				$res=mysqli_query($conn,$query);



$output = "";

$output .="

      <table class='table table-bordered'>
      <tr>
      		<th>Full Name</th>
      		<th>Email</th>
      		<th>Phone No.</th>
      		<th>Message</th>
      		<th>Action</th>
  		
      </tr>
";

if(mysqli_num_rows($res)<1){
	$output .="
		<tr>
		<td colspan='10' class='text-center'>No Queries Yet. /<td>
		</tr>




	";
}


while($row=mysqli_fetch_array($res)) {
	$output .="
		<tr>
		  <td>".$row['fullname']."</td>
		  <td>".$row['email']."</td>
		   <td>".$row['phone']."</td>
		  <td>".$row['message']."</td>
		  <td>
		   <a href='viewquery.php?id=".$row['id']."'>

            <button class='btn btn-info'>View</button>
		   </a>
		  </td>


	";
}

$output .="
  </tr>
  </table>
";

echo $output;

 				?>
 								
 			</div>
 		</div>
 	</div>
 </div>



</body>
</html>













