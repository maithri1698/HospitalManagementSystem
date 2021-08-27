<?php
session_start();
error_reporting(0);
if(isset($_SESSION['doctor'])){
}else{
header('location:doctorlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Doctors</title>
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
 					include("sidenavdoc.php");
 				?>
 			</div>
 			<div class="col-md-10">
                  <h5 class="text-center my-3">Total Patient</h5>

 				<?php


 				$query = "SELECT * FROM patient";
 				$res=mysqli_query($conn,$query);



$output = "";

$output .="

      <table class='table table-bordered'>
      <tr>
      		<th>ID</th>
      		<th>Firstname</th>
      		<th>Surname</th>
      		<th>Username</th>
      		<th>Email</th>
      		<th>Phone</th>
      		<th>Gender</th>
      		<th>Address</th>
      		<th>Date Reg.</th>
      		<th>Action</th>
      		
      </tr>
";

if(mysqli_num_rows($res)<1){
	$output .="
		<tr>
		<td colspan='10' class='text-center'>No Patient Yet. /<td>
		</tr>




	";
}


while($row=mysqli_fetch_array($res)) {
	$output .="
		<tr>
		  <td>".$row['id']."</td>
		  <td>".$row['firstname']."</td>
		  <td>".$row['surname']."</td>
		  <td>".$row['username']."</td>
		  <td>".$row['email']."</td>
		  <td>".$row['phone']."</td>
		  <td>".$row['gender']."</td>
		  <td>".$row['address']."</td>
		  <td>".$row['date_reg']."</td>
		  <td>
		   <a href='viewdoc.php?id=".$row['id']."'>

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