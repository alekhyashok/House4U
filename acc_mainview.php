  <?php
	  //connection
	  include('include/config.php');
	  //to che
	  if(session_status() != PHP_SESSION_NONE){		
		  $person = $_SESSION['person'];
		  $semail = $_SESSION['semail'];
		  $persons = $_SESSION['persons'];
	  }
	  $accNumber = base64_decode($_REQUEST['accNumber']);
	  $property = mysqli_query($conn,"SELECT * FROM accommodation WHERE accNumber = '".$accNumber."'");
	  $pro= mysqli_fetch_array($property,MYSQLI_ASSOC);
	  $facilities = mysqli_query($conn,"SELECT * FROM facilities WHERE accNumber = '".$accNumber."'");
	  $fac= mysqli_fetch_array($facilities,MYSQLI_ASSOC);
	  $email = $pro['ownerId'];
	  $location = $pro['location'];
	  $owner = mysqli_query($conn,"SELECT * FROM owner WHERE email = '".$email."'");
	  $own = mysqli_fetch_array($owner,MYSQLI_ASSOC);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <?php include('include/head.php'); ?>
  <script type="text/javascript">  
		function create(){
		  var accNumber = $('#accNumber').val();
		  var semailins = $('#semailins').val();
		  var oemailins = $('#oemailins').val();
		  var message = $('#message').val();
		  $.ajax({
			   method: "POST",
			   url: "message.php",
			  data: {semail:semailins, oemail:oemailins, message:message, accNumber:accNumber},
			  success : function(data){
				  $('#view').html(data);
			  }
		  });
	  };
  </script>
  <script type="text/javascript">  
		function request(){
		  var ano = $('#accNumber').val();
		  var se = $('#semailins').val();
		  var oe = $('#oemailins').val();
		  $.ajax({
			   method: "POST",
			   url: "request.php",
			  data: {semail:se, oemail:oe, accNumber:ano},
			  success : function(data){
				  $('#rview').html(data);
			  }
		  });
	  };
  </script>
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
			  <h2>Accommodation Details</h2>
		  </div>
	  </section>
	  <!--  Page top end -->
  
	  <!-- Breadcrumb -->
	  <div class="site-breadcrumb">
		  <div class="container">
			  <a href=""><i class="fa fa-home"></i>Home</a>
			  <span><i class="fa fa-angle-right"></i>Accommodation Details</span>
		  </div>
	  </div>
  
	  <!-- Page -->
	  <section class="page-section">
		  <div class="container">
			  <div class="row">
				  <div class="col-lg-8 single-list-page">
					  <div class="single-list-slider owl-carousel" id="sl-slider">
					  <?php 
						  $image = mysqli_query($conn,"SELECT image FROM images where accNumber ='".$accNumber."'");
						  $i=1;
						  while($img = mysqli_fetch_array($image, MYSQLI_ASSOC)){ ?>
						  <div class="sl-item set-bg" data-setbg="upload/<?php echo $img['image']; ?>">
							  <div class="sale-notic"><?php echo $pro['rentType']; ?></div>
						  </div>
					  <?php } ?>
					  </div>
					  <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
					  <?php
						  $timage = mysqli_query($conn,"SELECT image FROM images where accNumber ='".$accNumber."'");
						  $i=1;
						  while($timg = mysqli_fetch_array($timage, MYSQLI_ASSOC)){ ?>
						  <div class="sl-thumb set-bg" data-setbg="upload/<?php echo $timg['image']; ?>"></div>
						  <?php } ?>
					  </div>
					  <div class="single-list-content">
						  <div class="row">
							  <div class="col-xl-8 sl-title">
								  <h2>Near To <?php echo $pro['nearCollege']; ?></h2>
								  <p><i class="fa fa-map-marker"></i><?php echo $pro['location']; ?></p>
							  </div>
							  <div class="col-xl-4">
								  <a href="#" class="price-btn">$<?php echo $pro['price']; ?> CAD</a>
							  </div>
						  </div>
						  <h3 class="sl-sp-title">Property Details</h3>
						  <div class="row property-details-list">
							  <div class="col-md-4 col-sm-6">
								  <p><i class="fa fa-building-o"></i><?php echo $pro['houseType']; ?></p>
								  <p><i class="fa fa-bed"></i> <?php echo $fac['bedrooms']; ?> Bedrooms</p>
								  <p><i class="fa fa-compass"></i><?php echo $pro['distance']; ?> KM Distance to College </p>
							  </div>
							  <div class="col-md-4 col-sm-6">
								  <p><i class="fa fa-cutlery"></i> <?php echo $fac['kitchen']; ?> Kitchen</p>
								  <p><i class="fa fa-bus"></i>Busroutes: <?php echo $pro['busRoute']; ?></p>
							  </div>
							  <div class="col-md-4">
								  <p><i class="fa fa-bath"></i><?php echo $fac['bathrooms']; ?>  Bathrooms</p>
								  <p><i class="fa fa-trophy"></i><?php echo $pro['days']; ?> Months Lease</p>
							  </div>
						  </div>
						  <h3 class="sl-sp-title bd-no">More Details</h3>
						  <div id="accordion" class="plan-accordion">
							  <div class="panel">
								  <div class="panel-header" id="headingOne">
									  <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Description <i class="fa fa-angle-down"></i></button>
								  </div>
								  <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									  <div class="panel-body">
										  <div class="description">
											  <p style="padding:20px;"><?php echo $pro['description']; ?></p>
										  </div>
									  </div>
								  </div>
							  </div>
							  <div class="panel">
								  <div class="panel-header" id="headingTwo">
									  <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Facilities	<i class="fa fa-angle-down"></i>
									  </button>
								  </div>
								  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									  <div class="panel-body">
										  <div class="row property-details-list" style="padding:20px;">
											  <div class="col-md-4 col-sm-6">
												  <p><?php if($fac['dishwasher'] == "Yes"){ ?><i class="fa fa-check-circle-o"></i>Dishwasher</p><?php } else {?>
												  <i class="fa fa-times-circle-o" style="color:red;"></i>Dishwasher<?php } ?>
												  <p><?php if($fac['laundry'] == "Yes"){ ?><i class="fa fa-check-circle-o"></i>Laundry</p><?php } else {?>
												  <i class="fa fa-times-circle-o" style="color:red;"></i>Laundry<?php } ?>
											  </div>
											  <div class="col-md-4 col-sm-6">
												  <p><?php if($fac['wifi'] == "Yes"){ ?><i class="fa fa-check-circle-o"></i>WIFI</p><?php } else {?>
												  <i class="fa fa-times-circle-o" style="color:red;"></i>WIFI<?php } ?>
												  <p><?php if($fac['parking'] == "Yes"){ ?><i class="fa fa-check-circle-o"></i>Parking</p><?php } else {?>
												  <i class="fa fa-times-circle-o" style="color:red;"></i>Parking<?php } ?>
											  </div>
											  <div class="col-md-4">
												  <p><?php if($fac['furnished'] == "Yes"){ ?><i class="fa fa-check-circle-o"></i>Furnished</p><?php } else {?>
												  <i class="fa fa-times-circle-o" style="color:red;"></i>Furnished<?php } ?>
												  <p><i class="fa fa-check-circle-o"></i> Busroutes</p>
											  </div>
										  </div>
									  </div>
								  </div>
							  </div>
						  </div>
						  <h3 class="sl-sp-title bd-no">Location</h3>
						  <div class="pos-map" id="map-canvas"></div>
					  </div>
				  </div>
				  <!-- sidebar -->
				  <div class="col-lg-4 col-md-7 sidebar">
					  <div class="author-card">
						  <div class="author-img set-bg" data-setbg="img/user.png"></div>
						  <div class="author-info">
							  <h5><?php echo $own['firstName']; ?> <?php echo $own['lastName']; ?></h5>
						  </div>
						  <div class="author-contact">
							  <p><i class="fa fa-phone"></i><?php echo $own['phoneNumber']; ?></p>
							  <p><i class="fa fa-envelope"></i><?php echo $own['email']; ?></p>
						  </div>
					  </div>
					  <?php 
					  if($persons == "Student"){
					   ?>
					  <div class="contact-form-card">
						  <h5>Message To Owner</h5>
						  <form>
							  <input type="hidden" id="accNumber" name="accNumber" value="<?php echo $accNumber; ?>">
							  <input type="hidden" id="oemailins" name="oemailins" value="<?php echo $own['email']; ?>">
							  <input type="text" id="semailins" name="semailins" value="<?php echo $semail; ?>" readonly>
							  <textarea placeholder="Your Message" name="message" id="message"></textarea>	
							  <div align="center" ><p onclick="create()" style="padding:10px; background-color:green; color:white;">SEND </p></div>
							  <span id="view"></span>
						  </form>
					  </div>
                      <div class="row request">
                      	<div class="col-sm-6" align="center">
                        <?php
	  						$request = mysqli_query($conn,"SELECT * FROM request WHERE accNumber = '".$accNumber."' and ownerId = '".$own['email']."' and studentId = '".$semail."'");
							$req= mysqli_fetch_array($request,MYSQLI_ASSOC);
							if($request->num_rows == 0){
						?>
                        	<button class="btn btn-info" onclick="request()">Request</button>
                         <?php } else {?>
                        	<p class="color">Request Already Sent</p>
                         <?php } ?>
                        </div>
                        <div class="col-sm-6" align="center">
                        <?php $approve = mysqli_query($conn,"SELECT * FROM request WHERE accNumber = '".$accNumber."' and ownerId = '".$own['email']."' and studentId = '".$semail."'"); 
						$app = mysqli_fetch_array($approve,MYSQLI_ASSOC);
						if($approve->num_rows == 0){
						?>
                        <p>Request Owner to Book</p>
                        <?php } else if($approve->num_rows == 1 and $app['approve'] == 0 and $app['reject'] == 0){?>
                        <p>Owner not responded. Please wait for response</p>
                        <?php } else if($approve->num_rows == 1 and $app['approve'] == 1 and $app['reject'] == 0){?>
                        	<a href="book.php?acc=<?php echo base64_encode($accNumber);?>&ow=<?php echo base64_encode($own['email']);?>"><button class="btn btn-success">Book</button></a>
                         <?php } else if($approve->num_rows == 1 and $app['approve'] == 0 and $app['reject'] == 1){?>
                         <p>Owner reject. Please Select another accommodation</p>
                         <?php } ?>
                        </div
                        ><span id="rview"></span>
                      </div>
					  <?php } else { ?>
					  <p style="color:red;"><span>&#9733;</span>&nbsp;&nbsp;Please login as Student to contact owner. </p>
					  <?php } ?>
					  <div class="related-properties">
						  <h2>Related Property</h2>
						   <?php 
							  $property = mysqli_query($conn,"SELECT * FROM accommodation where location = '".$location."' ORDER BY id DESC LIMIT 3");
							  $i=1;
							  while($pro= mysqli_fetch_array($property,MYSQLI_ASSOC)){ ?>
							  <?php
							  $image = mysqli_query($conn,"SELECT image FROM images where accNumber ='".$pro['accNumber']."'");
							  $img = mysqli_fetch_array($image, MYSQLI_ASSOC);
				           ?>
						  <div class="rp-item">
							  <div class="rp-pic set-bg" data-setbg="upload/<?php echo $img['image']; ?>">
								  <div class="sale-notic"><?php echo $pro['rentType']; ?></div>
							  </div>
							  <div class="rp-info">
								  <h5>Near To <?php echo $pro['nearCollege']; ?></h5>
								  <p><i class="fa fa-map-marker"></i>Distance <?php echo $pro['distance']; ?> KM</p>
							  </div>
							  <a href="acc_mainview.php?accNumber=<?php echo base64_encode($pro['accNumber']); ?>" class="rp-price">$<?php echo $pro['price']; ?> CAD</a>
						  </div>
						  <?php } ?>
						  
					  </div>
				  </div>
			  </div>
		  </div>
	  </section>
	  <!-- Page end -->
  
  
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
	  <script src="js/map-2.js"></script>
  
  </body>
  </html>