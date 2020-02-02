<?php
	 include('include/config.php'); 
	 $date = date('m-d-Y');
        //inserting messages into database
	  $sql = mysqli_query ($conn,'INSERT INTO chating (studentId, ownerId, message, messageFrom, date, status, accNumber) VALUES 
	  ("'.$_POST["semail"].'","'.$_POST["oemail"].'","'.$_POST['message'].'","Student","'.$date.'","0","'.$_POST['accNumber'].'")');
       echo "Message Sent Sucessfully";
?>