<?php
    include('include/config.php');
    $name = $_SESSION['uname'];
    $id = $_POST['id'];
    $student = mysqli_query($conn,'SELECT * FROM student where id ="'.$id.'" ');
    $stu = mysqli_fetch_array($student,MYSQLI_ASSOC);
?>
<p><b>Title:</b>  <span><?php echo $stu['title']; ?></span></p>
<p><b>First Name: </b> <span><?php echo $stu['firstName']; ?></span></p>
<p><b>Middle Name: </b> <span><?php echo $stu['middleName']; ?></span></p>
<p><b>Last Name: </b> <span><?php echo $stu['lastName']; ?></span></p>
<p><b>Phone Number: </b> <span><?php echo $stu['phoneNumber']; ?></span></p>
<p><b>Date Of Birth: </b> <span><?php echo $stu['dateOfBirth']; ?></span></p>
<p><b>Gender:</b>  <span><?php echo $stu['gender']; ?></span></p>
<p><b>Email:</b>  <span><?php echo $stu['email']; ?></span></p>
<p><b>Address: </b> <span><?php echo $stu['address']; ?></span></p>
<p><b>Confirmation Letter:</b>  <span><?php echo $stu['cLetter']; ?></span></p>
<p><b>Valid Date: </b> <span><?php echo $stu['validDate']; ?></span></p>
<p><b>College:</b>  <span><?php echo $stu['college']; ?></span></p>
<p><b>Status:</b>  <span><?php if($stu['status'] == 1){ ?> Active <?php } else{ ?> Inactive <?php } ?></span></p>
<p><b>Student ID:</b>  <span><?php echo $stu['studentId']; ?></span></p>
<p><b>User Name:</b>  <span><?php echo $stu['uname']; ?></span></p>