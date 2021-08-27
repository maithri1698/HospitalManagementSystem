<?php
session_start();
error_reporting(0);
if(isset($_SESSION['doctor'])){
}else{
header('location:doctorlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include("link.php");
    include("ribbon.php");
    include("connection.php");
	?>
		<div class="row">
			<div class="col-md-2"  style="margin-left: -30px;">
				<?php

				include("sidenavdoc.php");

				?>

			</div>
			<?php

						if (isset($_POST['send'])) {
							$title = $_POST['send'];
							$response = $_POST['response'];

							if (empty($title)) {

								
							}else if(empty($response)){

							}else{

								$user = $_SESSION['doctor'];

								$query = "INSERT INTO response(title,response,username,date_send) VALUES('$title','$response','$user',NOW())";
								$res = mysqli_query($conn,$query);

								if($res){
									echo "<script>alert('You have sent Your Reponse')</script>";
								}

							}

						}



			?>
			<div class="col-md-10">
							<div class="row">
								
								<div class="col-md-3"></div>
								<div class="col-md-6 jumbotron bg-info my-5">
									<h5 class="text-center my-2">Send Your Response</h5>
									<form method="post">
										<label>Title</label>
										<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of your reponse">
										<label>Message</label>
										<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">

										<input type="submit" name="send" value="Send Response" class="btn btn-success my-2">

									</form>

								</div>
								<div class="col-md-3"></div>
							</div>
						
						</div>
					</div>
	
</body>
</html>
