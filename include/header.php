<?php
	include('include/config.php'); 
    if(session_status() != PHP_SESSION_NONE){
	$person = $_SESSION['person'];
	$email = $_SESSION['oemail'];
	$persons = $_SESSION['persons'];
	$semail = $_SESSION['semail'];
	if($person == "Owner"){
	$uname = mysqli_query($conn,"select * from owner where email = '".$email."'");
	$un= mysqli_fetch_array($uname,MYSQLI_ASSOC);
	$username = $un['uname'];
	}
	if($persons == "Student"){
	$suname = mysqli_query($conn,"select * from student where email = '".$semail."'");
	$sun= mysqli_fetch_array($suname,MYSQLI_ASSOC);
	$susername = $sun['uname'];
	}
	}
?>
<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							(+1) 999 999 9999
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							info.house4U.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="user-panel">
                        <?php
						if(session_status() == PHP_SESSION_ACTIVE){
						if($person != "Owner" && $persons != "Student"){ ?>
							<a href="register.php"><i class="fa fa-user-circle-o"></i> Register</a>
							<a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
						<?php } }
						?>
                        <?php
							if(session_status() == PHP_SESSION_ACTIVE){
							if($person == "Owner"){
						?>
							<a href="oaccountview.php"><i class="fa fa-user-circle-o"></i> <?php echo $username; ?></a>
							<a href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
                         <?php } }
						 ?>
                         <?php
							if(session_status() == PHP_SESSION_ACTIVE){
							if($persons == "Student"){
						?>
							<a href="saccountview.php"><i class="fa fa-user-circle-o"></i> <?php echo $susername; ?></a>
							<a href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
                         <?php } }
						 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="img/logo.png" alt="" height="70" width="120"></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
                        <?php
							if(session_status() == PHP_SESSION_ACTIVE){
							if($person == "Owner"){
						?>
                        	<ul class="main-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="aboutus.php">ABOUT US</a></li>
                                <li><a href="properties.php">Properties</a></li>
                                <li><a href="accregister.php">Create Accommodation</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                         <?php } else if($person == "Student"){?>
                             <ul class="main-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="aboutus.php">ABOUT US</a></li>
                                <li><a href="properties.php">Properties</a></li>
                                <li><a href="contact.php">Contact</a></li>
                             </ul>
						 <?php } } ?>
						 <?php
							if(session_status() == PHP_SESSION_ACTIVE){
							if($person != "Owner" && $person != "Student"){ ?>
                         	<ul class="main-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="aboutus.php">ABOUT US</a></li>
                                <li><a href="properties.php">Properties</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                         <?php } } ?>
					</div>
				</div>
			</div>
		</div>
	</header>