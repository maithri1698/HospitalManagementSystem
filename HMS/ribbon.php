<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
 include("link.php");
?>
<div class="header">
				<div class="wrap" style="width:100%; background:#2591E7;">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php" style="font-size: 30px; margin-left: 50px; color: white;">HOSPITAL MANAGEMENT SYSTEM</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<?php
							if (isset($_SESSION['admin']))
							{
								$user = $_SESSION['admin'];
								echo '
								<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
								<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';

							}else if(isset($_SESSION['doctor'])){
								$user = $_SESSION['doctor'];
								echo '
								<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
								<li class="nav-item"><a href="logoutdoc.php" class="nav-link text-white">Logout</a></li>';


							}else if(isset($_SESSION['patient'])){
								$user = $_SESSION['patient'];
								echo '
								<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
								<li class="nav-item"><a href="logoutpatient.php" class="nav-link text-white">Logout</a></li>';

							}
							else{
								echo '
						<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
						<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
						<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
						<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
						
						<li><a href="logout.php">Logout</a></li>';
							}

						?>
						
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
	</div>
</div>


</body>
</html>