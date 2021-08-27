<?php
session_start();
if(isset($_SESSION['patient'])){
}else{
header('location:patientlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Appointment</title>
</head>
<body>
	<?php
	include("link.php");
	include("ribbon.php");
	include("connection.php");
	?>
	<div class="container-fluid" style="background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);>
	  <div class="col-md-12">
		 <div class="row">
			<div class="col-md-2" style="margin-left:-30px">
				<?php
					include("sidenavpatient.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my-2">Book Appointment</h5>
				<?php
				$pat = $_SESSION['patient'];
				$sel = mysqli_query($conn,"SELECT * FROM patient WHERE username='$pat'");
				$row = mysqli_fetch_array($sel);
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				$gender = $row['gender'];
				$phone = $row['phone'];
				
		
					if(isset($_POST['book'])){
					$appointment_type=$_POST['appointment_type'];
					$date = $_POST['date'];
					$sym = $_POST['sym'];


					if(empty($sym)){


					}else{
						$query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_type,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$appointment_type','$date','$sym','Pendding',NOW())";

						$res = mysqli_query($conn,$query);

						if($res){
							echo "<script>alert('You have  booked an appointment.')</script>";
						}


					}
				}

			    ?>
		
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 jumbotron">
						<form method="post">
							<label>Appointment Type</label><br>
							<select name="appointment_type" id="appointment_type" class="form-control">
							  <option value="">Select Appointment Type</option>
							  <option value="Primary Care Provider">Primary Care Provider</option>
							  <option value="Eye Specialist">Eye Specialist</option>
							  <option value="Dentist">Dentist</option>
							  <option value="Gynecologist">Gynecologist</option>
							</select>
							<label>Appointment Date</label>
							<input type="date" name="date" class="form-control">
							<label>Symptoms</label>
							<input type="text" name="sym" class="form-control"  autocomplete="off" placeholder="Enter Symptoms">
							<input type="submit" name="book" class="btn btn-info my-2" value="Book Appointment">
						</form>
					</div>
				</div>
			</div>
		</div>
				


			</div>
		</div>
	</div>
</body>
</html>