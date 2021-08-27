<?php
session_start();
if(isset($_SESSION['admin'])){
}else{
header('location:adminlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctor</title>
</head>
<body>
	<?php
	 include("link.php");
     include("ribbon.php");
     include("connection.php");

	?>


	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php 
                  include("sidenav.php");
				    ?>
				</div>
				<div class="col-md-10">
				<h5 class="text-center">Edit Doctor</h5>


				<?php

                if(isset($_GET['id'])){
                	$id = $_GET['id'];
                	$query = "SELECT * FROM doctors WHERE id='$id'";
                	$res = mysqli_query($conn,$query);
                	$row = mysqli_fetch_array($res);
                }



				?>

				<div class="row">
					<div class="col-md-8">
                        <h5 class="text-center">Doctor Details</h5>
						<h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
						<h5 class="my-3">Firstname : <?php echo $row['firstname']; ?></h5>
						<h5 class="my-3">Surname : <?php echo $row['surname']; ?></h5>
						<h5 class="my-3">Username : <?php echo $row['username']; ?></h5>
						<h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
						<h5 class="my-3">Phone : +<?php echo $row['phone']; ?></h5>
						<h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
						<h5 class="my-3">Address : <?php echo $row['address']; ?></h5>
						<h5 class="my-3">Date Register : <?php echo $row['data_reg']; ?></h5>
						<h5 class="my-3">Salary : <?php echo $row['salary']; ?></h5>
					</div>
					<div class="col-md-4">
						<h5 class="text-center">Update Salary</h5>
						<?php
                          if(isset($_POST['update'])){
                          	$salary = $_POST['salary'];

                          	$q="UPDATE doctors SET salary='$salary' WHERE id='$id'";
                          	mysqli_query($conn,$q);

                          }

						?>
						<form method="post">
						<label>Enter Doctor's Salary</label>
						<input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'] ?>">
						<input type="submit" name="update" class="btn btn-info my-3" value="Update Salary">
					</form>
					</div>

					

			    </div>
				
			</div>
			
		</div>
	</div>

</body>
</html>