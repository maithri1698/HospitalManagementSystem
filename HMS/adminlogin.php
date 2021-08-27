<?php
session_start();
include('connection.php');
if(isset($_POST['login'])){
	$username=$_POST['uname'];
	$password=$_POST['pass'];

	$error = array();

	if(empty($username)){
		$error['admin'] = "Enter Username";
	}else if(empty($password)){
		$error['admin'] = "Enter Password";
	}

	if (count($error)==0){
	$query="SELECT * FROM admin WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($conn,$query);
 	if(mysqli_num_rows($result) == 1){
 		echo "<script>alert('You Have Logged In As An Admin')</script>";
 		$_SESSION['admin'] = $username;
 		header ('location:adminmainpage.php');
 		exit();
 	}else{
 		echo "<script>alert('Invalid Username or Password')</script>";
 		header ('location:adminlogin.php');
 	}
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ADMIN LOGIN</title>
</head>
<body style="background:url('images/admin.jpg'); background-repeat: no-repeat; background-size: 1300px 700px">
<?php
 include("link.php");
 include("ribbon.php");
 ?>
		<div class="container center-div shadow" style="position: absolute;top:50%;left:55%; width:50%;transform: translate(-50%,-50%);">
			<div class="heading text-center mb-5 text-uppercase text-white" style="width:100%;line-height: 80px;font-size: 1.4rem;background: -webkit-linear-gradient(left, #0072ff, #8811c5);font-family: 'Staatliches', cursive;">ADMIN LOGIN</div>
			<div class="container row d-flex flex-row justify-content-center mb-5">
				<div class="admin-form shadow p-2" style="margin-left: 60px">
					<form method="POST" style="width:400px;">
						<div class="alert alert-danger">
							<?php
							if(isset($error['admin']))  {
								$show = $error['admin'];

							}else{
								$show="";
							}
							echo $show;

							?>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<input type="Submit" class="btn btn-success" name="login" value="Login">

				</form>
		        </div>
		    </div>
		 </div>
		       
</body>
</html>