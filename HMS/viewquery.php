<?php
session_start();
error_reporting(0);
if(isset($_SESSION['admin'])){
}else{
header('location:adminlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Queries</title>
</head>
<body>

	<?php
		include("link.php");
		include("ribbon.php");
		include("connection.php");
	?>

	<div class="container-fluid" style= "background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
		<?php
		include("sidenav.php");
		?>

    	    </div>
    	    <div class="col-md-10">
    	    	<h5 class="text-center my-3">View Queries</h5>
    	    	<?php 
    	    	if(isset($_GET['id'])){
    	    		$id = $_GET['id'];
    	    		$query = "SELECT * FROM queries WHERE id='$id'";
    	    		$res = mysqli_query($conn,$query);
    	    		$row = mysqli_fetch_array($res);
    	    	}


    	    	?>
    	    	<div class="col-md-12">
    	    		<div class="row">
    	    			<div class="col-md-3"></div>
    	    			<div class="col-md-6">
    	    				<table class="table table-bordered">
    	    					<tr>
    	    						<th class="text-center" colspan="2">Details</th>
    	    					</tr>
    	    					<tr>
    	    						<td>Fullname</td>
    	    						<td><?php echo $row['fullname'];?></td>
    	    					</tr>
    	    					<tr>
    	    						<td>Email</td>
    	    						<td><?php echo $row['email'];?></td>
    	    					</tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $row['phone'];?></td>
                                </tr>
    	    					<tr>
    	    						<td>Message</td>
    	    						<td><?php echo $row['message'];?></td>
    	    					</tr>
    	    				</table>
    	    			</div>
    	    		</div>
    	    	</div>
    	    </div>
        </div>
    </div>
</div>
</body>
</html>