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


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Register</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Register</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            	<div class="col-sm-4"></div>
				<div class="col-sm-4" style="border:1px solid black; padding:20px;">
                	<h4 align="center" style="padding-bottom:20px;">Continue with</h4>
                	<div class="col-md-12 text-center ">
                         <a href="studentregister.php"><button type="submit" class=" btn btn-block mybtn btn-success tx-tfm">Student</button></a>
                    </div><br><br>
                    <div class="col-md-12 text-center ">
                          <a href="ownerregister.php"><button type="submit" class=" btn btn-block mybtn btn-info tx-tfm">Owner</button></a>
                    </div>
                </div>
                <div class="col-sm-4"></div>								
			</div>
		</div>
	</section>
	<!-- page end -->
  <!-- Modal content-->
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <h6 class="modal-title">Forgot Password?</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Email address</label>
                       <input type="email" name="email"  class="form-control" id="eemail"  placeholder="Enter email" required>
                    </div>
        <div class="col-md-12 text-center ">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit" onclick="email()">Submit</button>
                    </div>
                    <div id="view"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  </div>
</div>
<script type="text/javascript">  
	  function email(){
		var email = $('#eemail').val();
		$.ajax({
 			 method: "POST",
 			 url: "email.php",
  			data: { email:email},
			success : function(data){
				$('#view').html(data);
			}
		});
	};
</script>
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