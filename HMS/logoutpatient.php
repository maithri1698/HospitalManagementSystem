<?php

session_start();
error_reporting(0);
if(isset($_SESSION['patient'])){
	unset($_SESSION['patient']);


	header("Location:index.php");
	
}



?>