<?php
include("connection.php");
if(isset($_POST['submit'])){
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];

	$error = array();
	if(empty($fullname)){
		$error['submit']= "Enter Fullname";
	}else if(empty($email)){
		$error['submit']="Enter Email";
	}else if(empty($message)){
		$error['submit']="Enter Message";
	}

	if(count($error)==0) {
		$query = "INSERT INTO queries(fullname,email,phone,message) VALUES('$fullname','$email','$phone','$message')";
		$result = mysqli_query($conn,$query);

		if($result) {
			echo "<script>alert('You have Successfully sent a message')</script>";
			
		}else{

			echo "<script>alert('Failed')</script>";

		}
	}
}
if(isset($error['submit'])){
	$s=$error['submit'];
	$show="<h5 class='text-center alert alert-danger' >$s</h5>";
}else{
	$show="";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial scale=1.0">
	<title>Contact Us</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
				<div class="wrap" style="width:100%;background:#2591E7;">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php" style="font-size: 30px; color:white; margin-left: 50px;">HOSPITAL MANAGEMENT SYSTEM</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav" style="background: #088E93">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						
						<li><a href="contact.php">contact</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
	<section class="contact">
		<div class="content">
			<h2>Contact Us</h2>
			<p>Not all of us can do great things.But we can do small things with great love <br>~Mother Teresa</p>
		</div>


		<div class="container" style="min-width: 300px;">
		   <div class="contactInfo">
			  <div class="box">
			   <div class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
			    <div class="text">
					<h3>Address</h3>
					<P>4671 Sugar Camp Road,<br>Owatonna,Minnesota,</br>55060</P>
				</div>
			</div>
			<div class="box">
			   <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
			    <div class="text">
					<h3>Phone</h3>
					<P>507-475-6090</P>
				</div>
			</div>
			<div class="box">
			   <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
			    <div class="text">
					<h3>Email</h3>
					<P>hms@gmail.com</P>
				</div>
			</div>
	</div>
	<div class="contactForm">
		<form method="post" action="#">
			<h2>Send Message</h2>
			<div class="inputBox">
				<input type="text" name="fullname" required="required">
				<span>Full Name</span>
			</div>
			<div class="inputBox">
				<input type="text" name="email" required="required">
				<span>Email</span>
			</div>
			<div class="inputBox">
				<input type="text" name="phone" required="required">
				<span>Phone No.</span>
			</div>
			<div class="inputBox">
				<textarea required="required" name="message"></textarea>
				<span>Type Your Message...</span>
			</div>
			<div class="inputBox">
				<input type="submit" name="submit" value="Send">
			</div>
		</form>
	</div>
</div>
</section>
</body>
</html>

