<?php 
session_start();
error_reporting(0);
include("connection.php");
if (isset($_POST['login'])){
	$uname=$_POST['uname'];
	$password=$_POST['pass'];

	$error=array();

	$q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
	$qq = mysqli_query($conn,$q);
	$row=mysqli_fetch_array($qq);


	if(empty($uname)){
		$error['login']="Enter Username";
	}else if(empty($password)){
		$error['login']="Enter Password";
	}else if($row['status']=="Pendding"){
		$error['login']="Please Wait For the admin to confirm";

	}else if($row['status']=="Rejected"){
		$error['login']="Invalid Credentials";
	}

	if(count($error)==0){
		$query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
		$res = mysqli_query($conn,$query);

		if(mysqli_num_rows($res)){
			echo "<script>alert('done')</script>";
			$_SESSION['doctor']=$uname;
			header ("Location:doctormainpage.php");
		}else{
			echo "<script>alert('Invalid Account')</script>";
		}

	}
	
}
 if(isset($error['login'])){
 	$l=$error['login'];
 	$show="<h5 class='text-center alert alert-danger'>$l</h5>";
 }else{
 	$show="";
 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login Page</title>
</head>
<body style="background-image: url('images/background.jpg');background-size: cover;background-repeat: no-repeat;background-size: 1300px 630px">
	<?php
	include("link.php");
	include("ribbon.php");
	?>
	<div class="container-fluid center-div shadow" style="position: absolute;top:50%;left:55%; width:50%;transform: translate(-50%,-50%);">
			<div class="heading text-center mb-5 text-uppercase text-white" style="width:100%;line-height: 80px;font-size: 1.4rem;background: -webkit-linear-gradient(left, #0072ff, #8811c5);font-family: 'Staatliches', cursive;">DOCTOR LOGIN</div>
			<div>
				<?php echo $show; ?>
			</div>
			<div class="container row d-flex flex-row justify-content-center mb-5">
				<div class="admin-form shadow p-2" style="margin-left: 60px">
					<form method="POST" style="width:400px;">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" value="" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" value="" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<input type="submit" class="btn btn-success" name="login" value="Login">
						<p>Dont have an account? <a href="apply.php" style="color:white">Apply Now!!!</a></p>

				</form>
		        </div>
		    </div>
		 </div>

</body>
</html>
