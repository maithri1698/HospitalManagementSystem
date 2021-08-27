<?php
session_start();
error_reporting(0);
include("connection.php");


if(isset($_POST['login'])){
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];


	if(empty($uname)){
		  echo "<script>alert('Enter Username')</script>";
	}else if(empty($pass)){
          echo "<script>alert('Enter Password')</script>";
	}else{
		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass' ";
		$res = mysqli_query($conn,$query);
		if(mysqli_num_rows($res)==1){
			header("Location:patientmainpage.php");
			$_SESSION['patient'] = $uname;
		}else{
			echo "<script>alert('Invalid Account')</script>";
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>PATIENT LOGIN</title>
</head>
<body style="background-image: url('images/patient.jpg');background-size: cover;background-repeat: no-repeat;background-size: 1300px 780px">
	<?php
	include("ribbon.php");
	include("link.php");
	?>
		<div class="container center-div shadow" style="position: absolute;top:50%;left:55%; width:50%;transform: translate(-50%,-50%);">
			<div class="heading text-center mb-5 text-uppercase text-white" style="width:100%;line-height: 80px;font-size: 1.4rem;background: -webkit-linear-gradient(left, #0072ff, #8811c5);font-family: 'Staatliches', cursive;">PATIENT LOGIN</div>
			<div class="container row d-flex flex-row justify-content-center mb-5">
				<div class="admin-form shadow p-2" style="margin-left: 60px">
					<form method="POST" style="width:400px;">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" value="" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<input type="submit" class="btn btn-success" name="login" value="Login">
						<p>I dont have an account<a href="account.php">Click here.</p>
				</form>
		        </div>
</body>
</html>