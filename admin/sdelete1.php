<?php 
	error_reporting(0);
	include('include/config.php');
	$student = $_REQUEST['id'];
	$sql  = mysqli_query($conn,"delete from student where id = '".$student."'");
	header('Location:sdelete.php');
?>