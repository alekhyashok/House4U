<?php
	include('include/config.php'); 
	$accNumber = $_SESSION['accNumber'];
	if(isset($_POST["submit"])){
	$sql = mysqli_query ($conn,'INSERT INTO facilities (bedrooms , kitchen , bathrooms , dishwasher , parking , laundry , furnished , wifi , accNumber) VALUES 
	("'.$_POST["BedroomsRadios"].'" , "'.$_POST["KitchenRadios"].'" , "'.$_POST["BathroomRadios"].'" , "'.$_POST["DishWasherRadios"].'" , "'.$_POST["ParkingRadios"].'" , "'.$_POST["LaundryRadios"].'" , "'.$_POST["FurnishedRadios"].'" , "'.$_POST["WIFIRadios"].'", "'.$accNumber.'")');
	header('Location: image.php');
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
			<h2>Add Facilities & Images</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>facilities</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            <div class="col-sm-2"></div>
				<div class="col-sm-8" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-top:10px; padding-bottom:20px;">Facilities</h4>
                	<form action="" method="post" name="login">
                    <input type="hidden" name="accNumber" value="<?php echo $accNumber; ?>">
                    	<div class="form-group">
                        	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-bed"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Bedrooms : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BedroomsRadios1" name="BedroomsRadios" value="1">
						  				<label class="form-check-label" for="BedroomsRadios1">One</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BedroomsRadios2" name="BedroomsRadios" value="2">
						  				<label class="form-check-label" for="BedroomsRadios2">Two</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BedroomsRadios3" name="BedroomsRadios" value="3">
						  				<label class="form-check-label" for="BedroomsRadios3">Three</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BedroomsRadios4" name="BedroomsRadios" value="4">
						  				<label class="form-check-label" for="BedroomsRadios4">Four</label>
									</div>
                                </div>
                            </div>
					   </div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-cutlery"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Kitchen : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="KitchenRadios1" name="KitchenRadios" value="Individual">
						  				<label class="form-check-label" for="KitchenRadios1">Individual</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="KitchenRadios2" name="KitchenRadios" value="Shared">
						  				<label class="form-check-label" for="KitchenRadios2">Shared</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="KitchenRadios2" name="KitchenRadios" value="No">
						  				<label class="form-check-label" for="BedroomsRadios3">No</label>
									</div>
									
                                </div>
                            </div>
					 </div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-s15"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Bathrooms : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BathroomRadios1" name="BathroomRadios" value="1">
						  				<label class="form-check-label" for="BathroomRadios1">One</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BathroomRadios2" name="BathroomRadios" value="2">
						  				<label class="form-check-label" for="BathroomRadios2">Two</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BathroomRadios3" name="BathroomRadios" value="3">
						  				<label class="form-check-label" for="BathroomRadios3">Three</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="BathroomRadios4" name="BathroomRadios" value="4">
						  				<label class="form-check-label" for="BathroomRadios4">Four</label>
									</div>
                                </div>
                            </div>
           			</div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-object-ungroup"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Dish Washer : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="DishWasherRadios1" name="DishWasherRadios" value="Yes">
						  				<label class="form-check-label" for="DishWasherRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="DishWasherRadios2" name="DishWasherRadios" value="No">
						  				<label class="form-check-label" for="DishWasherRadios2">No</label>
									</div>
                                </div>
                           </div>
                     </div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-car"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Parking : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="ParkingRadios1" name="ParkingRadios" value="Yes">
						  				<label class="form-check-label" for="ParkingRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="ParkingRadios2" name="ParkingRadios" value="No">
						  				<label class="form-check-label" for="ParkingRadios2">No</label>
									</div>
                                </div>
                           </div>
					</div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-power-off"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Laundry : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="LaundryRadios1" name="LaundryRadios" value="Yes">
						  				<label class="form-check-label" for="LaundryRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="LaundryRadios2" name="LaundryRadios" value="No">
						  				<label class="form-check-label" for="LaundryRadios2">No</label>
									</div>
                                </div>
                           </div>
					</div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-shopping-cart"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; Furnished : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="FurnishedRadios1" name="FurnishedRadios" value="Yes">
						  				<label class="form-check-label" for="FurnishedRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="FurnishedRadios2" name="FurnishedRadios" value="No">
						  				<label class="form-check-label" for="FurnishedRadios2">No</label>
									</div>
                                </div>
                           </div>
					</div>
					    <div class="form-group">
                    	<div class="row">
                            	<div class="col-sm-3" align="right"><label><b><span style="color:#F95959;"><i class="fa fa-rss"></i></span>
                                &nbsp;&nbsp;&nbsp;&nbsp; Wifi : </b></label></div>
              	   				<div class="col-sm-9">
                                	<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="WIFIRadios1" name="WIFIRadios" value="Yes">
						  				<label class="form-check-label" for="WIFIRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
						  				<input type="radio" class="form-check-input" id="WIFIRadios2" name="WIFIRadios" value="No">
						  				<label class="form-check-label" for="WIFIRadios2">No</label>
									</div>
                                </div>
                           </div>
					</div>
                    <div class="row">
                    	<div class="col-sm-4"></div>
					 	<div class="col-md-4" style="padding-bottom:20px;">	
                         	<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Submit</button>
                    	</div>
                   		<div class="col-sm-4"></div> 
                    </div>  
                    </form>
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