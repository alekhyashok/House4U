<?php 
	error_reporting(0);
	include('include/config.php');
	$owner = $_REQUEST['id'];
	$sql  = mysqli_query($conn,"delete from owner where id = '".$owner."'");
	header('Location:odelete.php');
?>