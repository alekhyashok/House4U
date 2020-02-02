<?php
	include('include/config.php');
    $oemail = base64_decode($_REQUEST['id']);
	$semail = base64_decode($_REQUEST['stuid']);
	$accNumber = base64_decode($_REQUEST['acc']);
	$rid = base64_decode($_REQUEST['rid']);
	  $sql = mysqli_query ($conn,'UPDATE request set reject = "1" where id ="'.$rid.'" and accNumber = "'.$accNumber.'"');
	  echo'<script>
	  alert("Rejected Successfully");
	  window.location="orequest.php";</script>';
?> 