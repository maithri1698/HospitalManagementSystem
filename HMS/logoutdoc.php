<?php

session_start();
error_reporting(0);
if(isset($_SESSION['doctor'])){
	unset($_SESSION['doctor']);


	header("Location:index.php");
	
}



?>