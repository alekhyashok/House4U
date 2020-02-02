<?php
	include('include/config.php'); 
	$sid = $_SESSION['semail'];
	$oemail = base64_decode($_REQUEST['ow']);
	$accNumber = base64_decode($_REQUEST['acc']);
	$acc = mysqli_query($conn,"SELECT * FROM accept WHERE accNumber = '".$accNumber."' and studentId = '".$sid."' and ownerId = '".$oemail."'");
	$a= mysqli_fetch_array($acc,MYSQLI_ASSOC);
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
			<h2>Booking</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Booking</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            <div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-top:10px; padding-bottom:20px;">Booking Information</h4>
                	<form action="confirmation.php" method="post" name="login">
                          <input type="hidden" name="bno" value="<?php echo uniqid(); ?>">
                        	<div class="form-group">
                               <label for="firstName">Accommodation No</label>
                               <input type="text" name="accNumber" id="middleName"  class="form-control"  readonly value="<?php echo $a['accNumber']; ?>">
                            </div>
                            <div class="form-group">
                               <label for="firstName">Cost</label>
                               <input type="text" name="cost" id="middleName"  class="form-control"  readonly value="<?php echo $a['amount']; ?>">
                            </div>
                            <div class="form-group">
                               <label for="firstName">Start Date</label>
                               <input type="text" name="sdate" id="middleName"  class="form-control"  readonly value="<?php echo $a['startdate']; ?>">
                            </div>
                            <div class="form-group">
                               <label for="firstName">No.Of.Days</label>
                               <input type="text" name="ndays" id="middleName"  class="form-control"  readonly value="<?php echo $a['ndays']; ?>">
                            </div>
					   
                   		 <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-md-4" style="padding-bottom:20px;">	
                         	<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" >Proceed</button>
                    	</div>
                   		<div class="col-sm-4"></div> 
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