<?php
include("connection.php");
if(isset($_POST['apply'])){
	$firstname=$_POST['fname'];
	$surname=$_POST['sname'];
	$username=$_POST['uname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$phone = $_POST['phone'];
	$address=$_POST['address'];
	$specialization=$_POST['specialization'];
	$password = $_POST['pass'];
	$confirm_password=$_POST['con_pass'];


	$error = array();
	if(empty($firstname)){
		$error['apply']= "Enter Firstname";
	}else if(empty($surname)){
		$error['apply']="Enter Surname";
	}else if(empty($username)){
		$error['apply']="Enter Username";
	}else if(empty($email)){
		$error['apply']="Enter Email Address";
	}else if($gender == ""){
		$error['apply']="Select Your Gender";
	}else if(empty($phone)){
		$error['apply']="Enter Phone Number";
	}else if($address== ""){
		$error['apply']="Enter your Address";
	}else if($specialization == ""){
		$error['apply']="Select your specialization";
	}else if(empty($password)){
		$error['apply']="Enter Password";
	}else if(($confirm_password != $password)){
		$error['apply']="Both Password do not match";
	}
	if(count($error)==0) {
		$query ="INSERT INTO doctors(firstname,surname,username,email,gender,phone,address,specialization,password,salary,data_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$address','$specialization','$password','$salary',NOW(),'Pendding','img.jpg')";
		$result = mysqli_query($conn,$query);

		if($result) {
			echo "<script>alert('You have Successfull Applied')</script>";
			
			header("Location: doctorlogin.php");

		}else{

			echo "<script>alert('Failed')</script>";

		}
	}
}
if(isset($error['apply'])){
	$s=$error['apply'];
	$show="<h5 class='text-center alert alert-danger' >$s</h5>";
}else{
	$show="";
}
mysqli_close($conn);
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Apply Now!!!</title>
</head>
<body>
	<?php
	include("ribbon.php");
	include("link.php")
	?>
	<div class="container-fluid" style="background-image: url('images/doct.jpg');background-size: cover;background-repeat: no-repeat;background-size: 1600px 1000px">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-3 jumbotron">
					<h5 class="text-center">Apply now!!!</h5>
						<div>
							<?php echo $show; ?>
						</div>
					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
						</div>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
						</div>
						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Gender">Others</option>
							</select>
						</div>

						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
						</div>
						<div class="form-group">
							<label>Address</label>
								<textarea name="address" class="form-control" autocomplete="off" placeholder="Enter your address" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>"></textarea>
						</div>
						<div class="form-group">
						<label>Specialization</label><br>
							<select name="specialization" class="form-control">
							  <option value="">Select Specilization</option>
							  <option value="Primary Care Provider">Primary Care Provider</option>
							  <option value="Eye Specialist">Eye Specialist</option>
							  <option value="Dentist">Dentist</option>
							  <option value="Gynecologist">Gynecologist</option>
							</select>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
						</div>
						<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
						<p>Already have an account<a href="doctorlogin.php">Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</body>
</html>