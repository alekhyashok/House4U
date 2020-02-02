<?php
    include('include/config.php');
    $name = $_SESSION['uname'];
    $id = $_POST['id'];
    $owner = mysqli_query($conn,'SELECT * FROM owner where id ="'.$id.'" ');
    $own = mysqli_fetch_array($owner,MYSQLI_ASSOC);
?>
<p><b>Title:</b>  <span><?php echo $own['title']; ?></span></p>
<p><b>First Name:</b>  <span><?php echo $own['firstName']; ?></span></p>
<p><b>Middle Name:</b>  <span><?php echo $own['middleName']; ?></span></p>
<p><b>Last Name: </b> <span><?php echo $own['lastName']; ?></span></p>
<p><b>Phone Number: </b> <span><?php echo $own['phoneNumber']; ?></span></p>
<p><b>Date Of Birth:</b>  <span><?php echo $own['dateOfBirth']; ?></span></p>
<p><b>Adress:</b>  <span><?php echo $own['address']; ?></span></p>
<p><b>ID Proff: </b> <span><?php echo $own['idProff']; ?></span></p>
<p><b>Owner ID:</b>  <span><?php echo $own['ownerId']; ?></span></p>
<p><b>Email: </b> <span><?php echo $own['email']; ?></span></p>
<p><b>User Name: </b> <span><?php echo $own['uname']; ?></span></p>