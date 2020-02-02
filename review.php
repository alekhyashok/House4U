<?php
include('include/config.php');
$email = $_SESSION['oemail'];
if(isset($_POST["submit"])){
	
	$sql = mysqli_query ($conn,'INSERT INTO rating (name , email , message , rating) VALUES ("'.$_POST["name"].'", "'.$_POST["email"].'" , "'.$_POST["message"].'" , "'.$_POST["rate"].'")');
	header('Location: review.php');
}
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
			<h2>Reviews</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Blog Grid</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-6">
                    <div class="recent-reviews">
                        <div class="section-title">
                            	<h3 class="text-danger">Recent Reviews</h3>
                        </div>
                        <?php
						$review = mysqli_query($conn,'SELECT * FROM rating order by id desc limit 3');
						 $i=1;
						 while($rev = mysqli_fetch_array($review,MYSQLI_ASSOC)){
						?>
                        <h4><?php echo $rev['name']; ?></h4>
                        <p><?php echo $rev['message']; ?></p>
                        <?php } ?>
                    </div>
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Review Page</h3>
							<p>Your Feedback is important to us. Feel free to write a review</p>
						</div>
						<form class="contact-form" method="post">
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="Your name" name="name">
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="Your email" name="email">
								</div>
								<div class="col-md-12">
									<input type="number" placeholder="Rate out of 5" name="rate">
								</div>
								
								<div class="col-md-12">
									<textarea  placeholder="Your message" name="message"></textarea>
									<button class="site-btn" name="submit">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
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

	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script>


</body>
</html>