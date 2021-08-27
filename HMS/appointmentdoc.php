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
	<title>Total Appointment</title>
	<?php
	session_start();
	?>
</head>
<body>
	<?php
	include("link.php");
	include("ribbon.php");
    include("connection.php");
	?>
	<div class="container-fluid" style= " background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);">
	  <div class="col-md-12">
		 <div class="row">
			<div class="col-md-2" style="margin-left:-30px">
				<?php
					include("sidenavdoc.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my-2">Total Appointment</h5>
				<?php
				$user=$_SESSION['doctor'];
				$specialization="SELECT specialization FROM doctors WHERE username='$user'";
				$res1 = mysqli_query($conn,$specialization);
				$appointment_type="SELECT appointment_type FROM appointment";
				$res1=mysqli_fetch_array($res1);
				$s=$res1['specialization'];
				$query="SELECT * FROM appointment WHERE status='Pendding' AND appointment_type='$s'";
				
				$output = "";
				$output .= "
				<table class='table table-bordered'>
				<tr>
				<td>ID</td>
				<td>Firstname</td>
				<td>Surname</td>
				<td>Gender</td>
				<td>Phone</td>
				<td>Appointment Type</td>
				<td>Appointment Date</td>
				<td>Symptoms</td>
				<td>Date Booked</td>
				<td>Action</td>
				</tr>

				";
				$res = mysqli_query($conn,$query);
				if(mysqli_num_rows($res)<1){
					$output .="
						<tr>
						<td class='text-center' colspan='9'>No Appointment Yet</td>
						</tr>
					";
				}

			   while($row=mysqli_fetch_array($res)) {

				$output .="
					<tr>
					  <td>".$row['id']."</td>
					  <td>".$row['firstname']."</td>
					  <td>".$row['surname']."</td>
					  <td>".$row['gender']."</td>
					  <td>".$row['phone']."</td>
					  <td>".$row['appointment_type']."</td>
					  <td>".$row['appointment_date']."</td>
					  <td>".$row['symptoms']."</td>
					  <td>".$row['date_booked']."</td>
					  <td>
					  <a href='discharge.php?id=".$row['id']."'>
					  <button class='btn btn-info'>Check</button>
					  </a>
					  </td>

	";


$output .="
  </tr>
  </table>
";
			}
		
		

echo $output;

 				?>

			</div>
		</div>
	</div>
</div>

</body>
</html>