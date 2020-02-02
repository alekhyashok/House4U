<?php
	include('include/config.php');
    $oemail = base64_decode($_REQUEST['id']);
	$semail = base64_decode($_REQUEST['stuid']);
	$accNumber = base64_decode($_REQUEST['acc']);
	$mid = base64_decode($_REQUEST['mid']);
	$date = date('Y-m-d');
	if(isset($_POST["submit"])){
		$sql = mysqli_query ($conn,'INSERT INTO chating (studentId, ownerId, message, messageFrom, date, status, accNumber) VALUES 
	  ("'.$semail.'","'.$oemail.'","'.$_POST['message'].'","Owner","'.$date.'","0","'.$accNumber.'")');
	  $sql = mysqli_query ($conn,'UPDATE chating set status = "1" where id ="'.$mid.'" ');
	  echo'<script>
	  alert("Message Sent Successfully");
	  window.location="omessage.php";</script>';
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
			<h2>Reply Message </h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Reply Message</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            	<div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-bottom:20px;">Reply Message</h4>
                	<form action="" method="post">
                  	<div class="form-group">
                   
                       <label for="exampleInputEmail1">To</label>
                       <input type="text" name="email"  class="form-control" value="<?php echo base64_decode($_REQUEST['stuid']); ?>" readonly>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Message</label>
                       <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                    </div>                    
                    <div class="col-md-12 text-center">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Send</button>
                    </div>
                  </form>
                </div>
                <div class="col-sm-3"></div>								
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