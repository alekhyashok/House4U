<?php
	 include('include/config.php'); 
	  $result = mysqli_query($conn,"SELECT * FROM owner WHERE email='" . $_POST["email"] . "'");
	  if($result->num_rows > 0) {
		  echo "<span class='status-not-available' style='color:red;'> * Email Already Exist.</span>";
	  }else{
		  echo "<span class='status-available' style='color:green;'> * Email Avaliable.</span>";
	  }
?>