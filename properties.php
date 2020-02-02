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
			<h2>Featured Listings</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Featured Listings</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            <?php 
		    $property = mysqli_query($conn,"SELECT * FROM accommodation  where status = '1' ORDER BY id DESC");
				$i=1;
			while($pro= mysqli_fetch_array($property,MYSQLI_ASSOC)){ ?>
				<div class="col-lg-4 col-md-6">
                <?php
                $image = mysqli_query($conn,"SELECT image FROM images where accNumber ='".$pro['accNumber']."'");
				$img = mysqli_fetch_array($image, MYSQLI_ASSOC);
				$facilities = mysqli_query($conn,"SELECT * FROM facilities WHERE accNumber = '".$pro['accNumber']."'");
                $fac= mysqli_fetch_array($facilities,MYSQLI_ASSOC);
				$email = $pro['ownerId'];
                $owner = mysqli_query($conn,"SELECT * FROM owner WHERE email = '".$email."'");
                $own = mysqli_fetch_array($owner,MYSQLI_ASSOC);

				?>
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="upload/<?php echo $img['image']; ?>">
							<div class="sale-notic"><?php echo $pro['rentType']; ?></div>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<h5>Near To <?php echo $pro['nearCollege']; ?></h5>
								<p><i class="fa fa-map-marker"></i>Distance <?php echo $pro['distance']; ?> KM</p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-bed"></i> <?php echo $fac['bedrooms']; ?> Bedrooms</p>
										<p><i class="fa fa-cutlery"></i> <?php echo $fac['kitchen']; ?> Kitchen</p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-bath"></i><?php echo $fac['bathrooms']; ?>  Bathrooms</p>
										<p><i class="fa fa-building-o"></i><?php echo $pro['houseType']; ?></p>
									</div>	
								</div>
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-user"></i><?php echo $own['firstName']; ?> </p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-clock-o"></i><?php echo $pro['days']; ?> Months</p>
									</div>	
								</div>
							</div>
							<a href="acc_mainview.php?accNumber=<?php echo base64_encode($pro['accNumber']); ?>" class="room-price"><?php echo $pro['price']; ?> CAD</a>
						</div>
					</div>
                    
				</div>
                <?php	}
			?>
			</div>
			<div class="site-pagination">
				<span>1</span>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#"><i class="fa fa-angle-right"></i></a>
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
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
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