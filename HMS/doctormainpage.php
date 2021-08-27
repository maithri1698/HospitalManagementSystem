<?php
session_start();
if(isset($_SESSION['doctor'])){
}else{
header('location:doctorlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Dashboard</title>
</head>
<body>
<?php
include("link.php");
include("ribbon.php");
include("connection.php");
?>

<div class="container-fluid">
	<div class="col-md-12" style="margin-left: -30px;">
		<div class="row">
			<div class="col-md-2">
				<?php
					include("sidenavdoc.php");
				?>

			</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<h5>Doctor's Dashboard</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3  my-2 bg-info mx-2" style="height:150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="text-white my-4">My Profile</h5>

										</div>
										<div class="col-md-4">
                                           <a href="profiledoc.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i></a>
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-3  my-2 bg-warning mx-2" style="height:150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
											   $p = mysqli_query($conn,"SELECT * FROM patient");
                                				$pp = mysqli_num_rows($p);
                                			?>
											<h5 class="text-white my-2"style="font-size:30px;"><?php echo $pp;?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Patient</h5>
										</div>
										<div class="col-md-4">
                                           <a href="patientdoc.php"><i class="fa fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
										</div>
									</div>
								</div>
							</div>



							<div class="col-md-3  my-2 bg-success mx-2" style="height:150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
											$user=$_SESSION['doctor'];
												$specialization="SELECT specialization FROM doctors WHERE username='$user'";
												$res1 = mysqli_query($conn,$specialization);
												$appointment_type="SELECT appointment_type FROM appointment";
												$res1=mysqli_fetch_array($res1);
												$s=$res1['specialization'];
											   $app = mysqli_query($conn,"SELECT * FROM appointment WHERE status='Pendding' AND appointment_type='$s'");
                                				$appoint = mysqli_num_rows($app);
                                			?>
											<h5 class="text-white my-2" style="font-size: 30px"><?php echo $appoint;?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white my-4">Appointment</h5>

										</div>
										<div class="col-md-4">
                                           <a href="appointmentdoc.php"><i class="fa fa-calendar fa-3x my-4" style="color:white;"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
</body>
</html>