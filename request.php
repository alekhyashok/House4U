<?php
	 include('include/config.php'); 
	 $date = date('Y-m-d');
        //inserting request into database
	  $sql = mysqli_query ($conn,'INSERT INTO request (studentId, ownerId, rdate, status, accNumber, adate, approve, reject) VALUES 
	  ("'.$_POST["semail"].'","'.$_POST["oemail"].'","'.$date.'","0","'.$_POST['accNumber'].'"," ","0","0")');
       echo "Request Sent Sucessfully";

	  ?>