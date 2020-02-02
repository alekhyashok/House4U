<?php 
	error_reporting(0);
	include('include/config.php');
	$rating = $_REQUEST['id'];
	$sql  = mysqli_query($conn,"delete from rating where id = '".$rating."'");
	header('Location:odelete.php');
?>