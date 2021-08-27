<?php
include("connection.php");
if(isset($_POST['create'])){
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$password = $_POST['pass'];
	$con_pass = $_POST['con_pass'];

	$error = array();
	if(empty($fname)){
		$error['create']= "Enter Firstname";
	}else if(empty($sname)){
		$error['create']="Enter Surname";
	}else if(empty($uname)){
		$error['create']="Enter Username";
	}else if(empty($email)){
		$error['create']="Enter Email Address";
	}else if(empty($phone)){
		$error['create']="Enter Phone Number";
	}else if($gender == ""){
		$error['create']="Select Your Gender";
	}else if($address == ""){
		$error['create']="Enter your address";
	}else if(empty($password)){
		$error['create']="Enter Password";
	}else if(($con_pass != $password)){
		$error['create']="Both Password do not match";
	}



if(count($error)==0){
	$query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,address,password,date_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$address','$password',NOW(),'patient.jpg')";

	$res = mysqli_query($conn,$query);

	if($res) {
		header("Location:patientlogin.php");

	}else{
		echo "<script>alert('failed')</script>";
	}
}
}

if(isset($error['create'])){
	$s=$error['create'];
	$show="<h5 class='text-center alert alert-danger' >$s</h5>";
}else{
	$show="";
}
mysqli_close($conn);
	?>


?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body>
	<?php
	include("ribbon.php");
	include("link.php")
	?>
	<div class="container-fluid" style="background-image: url('images/account.jpg');background-size: cover;background-repeat: no-repeat;background-size: 1400px 850px">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-2 jumbotron">
					<h5 class="text-center text-info">Create Account</h5>
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
							<span id="availablity"></span>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
						</div>

						<div class="form-group">
							<label>Phone No</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
						</div>

						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Your Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="form-group">
							<label>Address</label>
								<textarea name="address" class="form-control" autocomplete="off" placeholder="Enter your address" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>"></textarea>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
						</div>
						<input type="submit" name="create" value="Create Account" class="btn btn-info">
						<p>Already have an account?<a href="patientlogin.php">Click Here</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#uname").blur(function(){
			var uname = $(this).val();
			$.ajax({
				url:"usecheck.php",
				method:"POST",
				data:{user_name:uname},
				datatype:"text",
				success:function(html)
				{
					$('#availablity').html(html);
				}


			});
		});
	});
	

	</script>
</body>
</html>