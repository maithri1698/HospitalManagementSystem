<?php
session_start();
error_reporting(0);
if(isset($_SESSION['patient'])){
}else{
header('location:patientlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
</head>
<body>
<?php
include("link.php");
include("ribbon.php");
include("connection.php");
?>
<div class="container-fluid" style="background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left:-30px;">
				<?php
				include("sidenavpatient.php");

				$patient= $_SESSION['patient'];
				$query = "SELECT * FROM patient WHERE username='$patient'";
				$res = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($res);

				?>
			</div>
			<div class="col-md-10" >
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">

							<?php
							if (isset($_POST['upload'])) {
								$img = $_FILES['img']['name'];

								if(empty($img)){

							}else{
							$query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
							$res = mysqli_query($conn,$query);

							if($res){
								move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
								
									
							  		}
								}
							}

							?>
							<h5> My Profile </h5>
							<form method="post" enctype="multipart/form-data">
								<?php
								echo "<img src='img/".$row['profile']."' class='col-md-12' style='height:250px;'>";
								?>
								
								<input type="file" name="img" class="form-control my-2" >
								<input type="submit" name="upload" class="btn btn-info" value="Update Profile">




							</form>
							<table class="table table-bordered">
								<tr>
									<th colspan="2" class="text-center"> My Details</th>
								</tr>
								<tr>
									<td>Firstname</td>
									<td><?php echo $row['firstname'];?></td>
								</tr>
								<tr>
									<td>Surname</td>
									<td><?php echo $row['surname'];?></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><?php echo $row['username'];?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $row['email'];?></td>

								</tr>
								<tr>
									<td>Phone Number</td>
									<td><?php echo $row['phone'];?></td>

								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo $row['gender'];?></td>

								</tr>
								<tr>
									<td>Address</td>
									<td><?php echo $row['address'];?></td>
								</tr>
							</table>

						</div>
						<div class="col-md-6">
							<h5 class="text-center">Change Username</h5>

							<?php

							if(isset($_POST['update'])){
								$uname = $_POST['uname'];

								if(empty($uname)){

								}else{
									$query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
									$res = mysqli_query($conn,$query);

									if($res){
										$_SESSION['patient'] = $uname;
									}
								}
							}

							?>

							<form method="post">
								<label>Enter Username</label><br>
								<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
								<input type="submit" name="update" class="btn btn-info my-2" value="Update Username">

							</form>

							<?php

							if(isset($_POST['change'])) {

								$old = $_POST['old_pass'];
								$new = $_POST['new_pass'];
								$con = $_POST['con_pass'];
								$q = "SELECT * FROM patient WHERE username='$patient'";
								$re = mysqli_query($conn,$q);
								$row = mysqli_fetch_array($re);

								if(empty($old)){
									echo "<script>alert('Enter old password')</script>";
								}else if(empty($new)){
									echo "<script>alert('Enter new password')</script>";
								}else if($con != $new){
									echo "<script>alert('Both password do not match')</script>";
								}else if($old != $row['password']){
									echo "<script>alert('Check the password')</script>";
								}else{
									$query = "UPDATE patient SET password='$new' WHERE username='$patient'";
									mysqli_query($conn,$query);
								}

							}
							?>
							<h5 class="my-4 text-center">Change Password</h5>
							<form method="post">
								<label>Old Password</label><br>
								<input type="password" name="old_pass" class="form_control" autocomplete="off" placeholder="Enter old Password"><br><br>

								<label>New Password</label><br>
								<input type="password" name="new_pass" class="form_control" autocomplete="off" placeholder="Enter New Password"><br><br>

								<label>Confirm Password</label><br>
								<input type="password" name="con_pass" class="form_control" autocomplete="off" placeholder="Enter Confirm Password"><br><br>
								<input type="submit" name="change" class="btn btn-info my-2" value="Change Password">
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