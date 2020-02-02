<?php
	include('include/config.php');
	$person = $_SESSION['person'];
	$email = $_SESSION['oemail'];
    // Getting Owner details details from datatbase
	$uname = mysqli_query($conn,"select * from owner where email = '".$email."'");
	$un= mysqli_fetch_array($uname,MYSQLI_ASSOC);
	$user = $un['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<?php include('include/header.php'); ?>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Welcome <?php echo $user; ?></h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Profile</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
        <div align="right"><a href="orequest.php?email=<?php echo base64_encode($email); ?>"><button class="btn btn-danger"><i class="fa fa-bell" aria-hidden="true"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="oprofileedit.php?email=<?php echo base64_encode($email); ?>"><button class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="omessage.php?email=<?php echo base64_encode($email); ?>"><button class="btn btn-danger"><i class="fa fa-envelope"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="accview.php?email=<?php echo base64_encode($email); ?>"><button class="btn btn-danger"><i class="fa fa-home"></i></button></a></div>
        <hr>
			<div class="row">
            	<div class="col-sm-2"></div>
            	<div class="col-sm-8">
                	<div class="row">
                		<div class="col-sm-3" style="border:1px solid black; padding:5px;"><img src="img/user.png">
                        <hr>
                        <p style="padding:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem.</p>
                        </div>
                    	<div class="col-sm-1"></div>
                    	<div class="col-sm-8" style="border:1px solid black; padding:20px;">
						<p style="font-size:18px;"><b><i class="fa fa-key"></i>&nbsp;Owner Id:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                                                   
							<?php echo $un['ownerId']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-id-badge"></i>&nbsp;Title:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $un['title']; ?></span></b></p>
                    		<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i> &nbsp;First Name:&nbsp;&nbsp;&nbsp; 
                             <span style="color:#F95959;"><?php echo $un['firstName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i>&nbsp;Middle Name:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $un['middleName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i>&nbsp;Last Name:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $un['lastName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-phone"></i> &nbsp;Phone Number:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                              
							<?php echo $un['phoneNumber']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-calendar"></i>&nbsp;Date of Birth:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                                                           
							<?php echo $un['dateOfBirth']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-address-book"></i>&nbsp;Address:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">          
							<?php echo $un['address']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-credit-card-alt"></i>&nbsp;Id Proof:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<a href="idproofs/<?php echo $un['idProff']; ?>" download><?php echo $un['idProff']; ?></a></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-envelope"></i>&nbsp;Email:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php echo $un['email']; ?></span></b></p>
                            
                    	</div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
			</div>
		</div>
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->


	<!-- Footer section -->
	<?php include('include/footer.php'); ?>
	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>