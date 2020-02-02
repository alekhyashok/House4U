<?php 
	error_reporting(0);
	include('include/config.php');
	$img = base64_decode($_REQUEST['id']);
	$sql  = mysqli_query($conn,"delete from images where id = '".$img."'");
	header('Location:image.php');
?>