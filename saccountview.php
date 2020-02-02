<?php
	include('include/config.php');
	$persons = $_SESSION['persons'];
	$semail = $_SESSION['semail'];
	$suname = mysqli_query($conn,"select * from student where email = '".$semail."'");
	$sun= mysqli_fetch_array($suname,MYSQLI_ASSOC);
	$user = $sun['uname'];
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
        <div align="right"><a href="srequest.php?email=<?php echo base64_encode($semail); ?>"><button class="btn btn-danger"><i class="fa fa-bell"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="sprofileedit.php?email=<?php echo base64_encode($semail); ?>"><button class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="smessage.php?email=<?php echo base64_encode($semail); ?>"><button class="btn btn-danger"><i class="fa fa-envelope"></i></button></a></div>
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
						<p style="font-size:18px;"><b><i class="fa fa-key"></i>&nbsp;student Id:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                                                   
							<?php echo $sun['studentId']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-id-badge"></i>&nbsp;Title:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $sun['title']; ?></span></b></p>
                    		<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i> &nbsp;First Name:&nbsp;&nbsp;&nbsp; 
                             <span style="color:#F95959;"><?php echo $sun['firstName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i>&nbsp;Middle Name:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $sun['middleName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-user-circle-o"></i>&nbsp;Last Name:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<?php echo $sun['lastName']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-phone"></i> &nbsp;Phone Number:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                              
							<?php echo $sun['phoneNumber']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-calendar"></i>&nbsp;Date of Birth:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">                                                           
							<?php echo $sun['dateOfBirth']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-address-book"></i>&nbsp;Address:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">          
							<?php echo $sun['address']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-credit-card-alt"></i>&nbsp;cLetter:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">
							<a href="cletters/<?php echo $sun['cLetter']; ?>" download><?php echo $sun['cLetter']; ?></a></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-vcard"></i>&nbsp;Email:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php echo $sun['email']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-child"></i>&nbsp;gender:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php echo $sun['gender']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-calendar"></i>&nbsp;validDate:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php echo $sun['validDate']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-graduation-cap"></i>&nbsp;college:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php echo $sun['college']; ?></span></b></p>
							<p style="font-size:18px;"><b><i class="fa fa-inbox"></i>&nbsp;status:&nbsp;&nbsp;&nbsp;  <span style="color:#F95959;">      
							<?php if($sun['status'] == 1){ ?>Active<?php } else { ?> Inactive <?php } ?></span></b></p>
                            
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