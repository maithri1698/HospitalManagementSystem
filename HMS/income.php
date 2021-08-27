<?php
session_start();
if(isset($_SESSION['admin'])){
}else{
header('location:adminlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Income</title>
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
			<div class="col-md-2"  style="margin-left: -30px;">
				<?php

				include("sidenav.php");

				?>

			</div>
			<div class="col-md-10">
				<h5 class="text-center my-2">Total Income</h5>

				<?php

				$query = "SELECT * FROM income ";
				$res = mysqli_query($conn,$query);
				$output = "";

				$output .= "
				<table class='table table-bordered'>
				<tr>
				<td>ID</td>
				<td>Doctor</td>
				<td>Patient</td>
				<td>Date_Discharge</td>
				<td>Amount Paid</td>
				</tr>
				
				";

				if(mysqli_num_rows($res)<1){
					$output .="
						<tr>
						<td class='text-center' colspan='4'>No Patient Discharged Yet.</td>
						</tr>
					";
				}

			   while($row=mysqli_fetch_array($res)) {
				$output .="
					<tr>
					  <td>".$row['id']."</td>
					  <td>".$row['doctor']."</td>
					  <td>".$row['patient']."</td>
					  <td>".$row['date_discharge']."</td>
					  <td>".$row['amount_paid']."</td>

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