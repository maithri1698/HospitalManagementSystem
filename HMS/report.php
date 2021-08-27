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
	<title></title>
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
			<div class="col-md-2"  style="margin-left: -30px;">
				<?php

				include("sidenav.php");

				?>

			</div>
			<div class="col-md-10">
				<h5 class="text-center my-2">Total Report</h5>
				<?php

				$query = "SELECT * FROM report ";
				$res = mysqli_query($conn,$query);
				$output = "";

				$output .= "
				<table class='table table-bordered'>
				<tr>
				<td>ID</td>
				<td>Title</td>
				<td>Message</td>
				<td>Username</td>
				<td>Date Send</td>
				</tr>

				";

				if(mysqli_num_rows($res)<1){
					$output .="
						<tr>
						<td class='text-center' colspan='6'>No Report Yet</td>
						</tr>
					";
				}

			   while($row=mysqli_fetch_array($res)) {
				$output .="
					<tr>
					  <td>".$row['id']."</td>
					  <td>".$row['title']."</td>
					  <td>".$row['message']."</td>
					  <td>".$row['username']."</td>
					  <td>".$row['date_send']."</td>
					  <a href='viewquery.php?id=".$row['id']."'>

	";
}

$output .="
  </tr>
  </table>
";

echo $output;

 				?>
			</div>
		</div>
	</div>
</div>

</body>
</html>