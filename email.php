<?php
include('include/config.php');
        $to = $_POST['email'];
		$subject = " New Password Link";
		$message = "localhost/house4U/npassword.php";
		$header = "From: info@house4u.com \r\n";
		$retval = mail($to, $subject, $message, $header);
		if ($retval == true) {
			$msg = "Message sent successfully...";
		} else {
			$msg = "Message could not be sent...";
		}
		echo"An email was sent. Please check";
?>