<?php
$conn = mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['user_name']))
{
	$query = "SELECT * FROM patient WHERE username='".$_POST['user_name']."'";
	$result = mysqli_query($query,$conn);
	if(mysqli_num_rows($result>0))
	{
		echo "<span class='text-danger'>username alredy exists</span>";
	}
	else{
		echo "<span class='text-success'>username is available</span>";
	}
}



?>