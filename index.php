<?php
include('include/config.php');
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


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpeg">
		<div class="container hero-text text-white">
        	<div class="layer">
			<h2>First Housing Website for International Students</h2>
			<p>100% Trusted owners and Students</p>
			<a href="#" class="site-btn">VIEW DETAIL</a>
            </div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			<form class="filter-form">
				<input type="text" placeholder="Enter a street name, address number or keyword">
				<select>
					<option value="City">City</option>
				</select>
				<select>
					<option value="City">State</option>
				</select>
				<button class="site-btn fs-submit">SEARCH</button>
			</form>
		</div>
	</div>
	<!-- Filter form section end -->



	<!-- Properties section -->
	<section class="properties-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3 class="color">OUR NEW PROPERTIES</h3>
			</div>
			<div class="row">
            <?php 
		    $property = mysqli_query($conn,"SELECT * FROM accommodation  where status = '1' ORDER BY id DESC LIMIT 4");
				$i=1;
			while($pro= mysqli_fetch_array($property,MYSQLI_ASSOC)){ ?>
				<div class="col-md-6">
                <?php
                $image = mysqli_query($conn,"SELECT image FROM images where accNumber ='".$pro['accNumber']."'");
				$img = mysqli_fetch_array($image, MYSQLI_ASSOC);
				?>
					<div class="propertie-item set-bg" data-setbg="upload/<?php echo $img['image']; ?>">
                    	<div class="row">
							<div class="col-sm-6"><span class="sale-notic"><?php echo $pro['rentType']; ?></span></div>
                        	<div class="col-sm-6" align="right"><span class="rent-notic">$<?php echo $pro['price']; ?> CAD</span></div>
                    	</div>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>Near To <?php echo $pro['nearCollege']; ?></h5>
								<p><i class="fa fa-map-marker"></i>Distance <?php echo $pro['distance']; ?> KM</p>
							</div>
							<a href="acc_mainview.php?accNumber=<?php echo base64_encode($pro['accNumber']); ?>"><div class="price">VIEW</div></a>
						</div>
					</div>
				</div>
                <?php	}
			?>
			</div>
		</div>
	</section>
	<!-- Properties section end -->


	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="img/service.jpg" alt="">
				</div>
				<div class="col-lg-5 offset-lg-1 pl-lg-0">
					<div class="section-title text-white">
						<h3>OUR SERVICES</h3>
						<p>We provide the perfect service for </p>
					</div>
					<div class="services">
						<div class="service-item">
							<i class="fa fa-comments"></i>
							<div class="service-text">
								<h5>Communication</h5>
								<p>There is perfect communication between the owner and the student.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-home"></i>
							<div class="service-text">
								<h5>Properties Management</h5>
								<p>We will give correct details about the properties and the process is to book the accommodation.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-briefcase"></i>
							<div class="service-text">
								<h5>Security</h5>
								<p>We have 100% trusted owners and the students. Students can trust the owners and owners can trust the students.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->


	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3 class="color">Our Featured Listings</h3>
			</div>
			<div class="row">
            <?php 
		    $property = mysqli_query($conn,"SELECT * FROM accommodation  where status = '1' ORDER BY id DESC LIMIT 3");
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
		</div>
	</section>
	<!-- feature section end -->

	<!-- Review section -->
	<section class="review-section set-bg" data-setbg="img/review-bg.jpg">
		<div class="container">
        	<h3 class="review">Our Reviews</h3>
			<div class="review-slider owl-carousel">
                       <?php
						$review = mysqli_query($conn,'SELECT * FROM rating order by id desc limit 3');
						 $i=1;
						 while($rev = mysqli_fetch_array($review,MYSQLI_ASSOC)){
						?>
				<div class="review-item text-white">
					<p><?php echo $rev['message']; ?></p>
					<h5><?php echo $rev['name']; ?></h5>
				</div>
                <?php } ?>
			</div>
		</div>
	</section>
	<!-- Review section end-->

	<!-- feature category section -->
	<section class="feature-category-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3 class="color">PROPERTY Types</h3>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/1.jpg" alt="">
					<h5>Apartments</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/2.jpg" alt="">
					<h5> Individual Homes</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/3.jpg" alt="">
					<h5>Summer Sublets</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/4.jpg" alt="">
					<h5>Semidetached</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- feature category section end-->

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