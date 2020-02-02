<?php
	include('include/config.php');
	if(session_status() != PHP_SESSION_NONE){		
		  $person = $_SESSION['person'];
		  $sem = $_SESSION['semail'];
		  $persons = $_SESSION['persons'];
		  $oem = $_SESSION['oemail'];
	}
	if(isset($_POST["submit"])){
	if($_SESSION['persons'] == "Student" ){
		$date = date('Y-m-d');
        //inserting messages into database
	  $sql = mysqli_query ($conn,'INSERT INTO message (personNumber, message, respondStatus, replyMessage, mDate, rDate) VALUES("'.$sem.'","'.$_POST["message"].'"," "," ","'.$date.'"," ")');
     
	}else{
		
		$date = date('Y-m-d');
        //inserting messages into database
	  $sql = mysqli_query ($conn,'INSERT INTO message (personNumber, message, respondStatus, replyMessage, mDate, rDate) VALUES("'.$oem.'","'.$_POST["message"].'"," "," ","'.$date.'"," ")');
		
	 	}
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
			<h2>Contact Us</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Contact Us</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.101506976401!2d-80.52072978512602!3d43.479351971674085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882bf3ee945ec577%3A0x2176770f7ed8738c!2sConestoga+College+-+Waterloo+Campus!5e0!3m2!1sen!2sca!4v1554946926409!5m2!1sen!2sca" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			<div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>Conestoga College</p>
				<p><i class="fa fa-envelope"></i>info@house4u.com</p>
				<p><i class="fa fa-phone"></i>(+1) 999 999 9999</p>
			</div>
			<div class="row">
					
				<div class="col-lg-6">
                    <div class="Contact Form">
                        <div class="text-left">
                            <h3 class="text-success">FAQ</h3>
                        </div>
                        <h5>Q:How much will it takes to get Confirmation?</h5>
						<p>Depends on owners avalability..</p>
                        
                        <h5>Q:Will I get any Student Discount?</h5>
						<p>No, the prices are fixed by the owner..</p>
        
                        <h5>Q:will it avaialble for other colleg students in Canada?<h5>
							<p>This is only for students in KW region..</p>
                        <h5>Q:How to make Payment?</h5>
							<p>You can use either Net banking or ur Debit/Credit cards..</p>
                        
                    </div>
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Contact Form</h3>
							<p>Any Issues Type your message. Admin will Reply Soon</p>
						</div>
						<form class="contact-form" method="post">
							<div class="row">
								 <div class="col-md-12">
									 <label>Message</label>
									<textarea  placeholder="Your message" name="message"></textarea>
									<?php if($persons == "Student" || $person == "Owner" ){ ?><button class="site-btn" name="submit">SUBMIT NOW</button><?php } else { ?><p>Please Login to submit the message.</p> <?php } ?>
								 </div>
							</div>
						</form>
					</div>
				</div>
            </div>
            <a href="review.php"><h4 align="center" class="color" style="padding-top:20px;">Review Here</h4></a>
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

	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script>


</body>
</html>