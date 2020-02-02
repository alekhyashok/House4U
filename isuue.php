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
			<h2>Login</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Login</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            	<div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                	<div><?php if(isset($msg)) echo $msg; ?></div>
                	<h4 align="center" style="padding-bottom:20px;">Login Form</h4>
                	<form action="" method="post" name="login">
                    <div class="form-group">
                       <label for="exampleInputEmail1">Person Type</label>
                       <select name="person" class="form-control input-lg" required>
          					<option value="none"> --- Select Person Type --- </option>
		  						<?php 
		  							$person = mysqli_query($conn,'SELECT * FROM person ORDER BY id');
									while($per = mysqli_fetch_array($person,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $per['name'];?>"><?php echo $per['name'];?></option>
				               <?php	} ?>
        			   </select>
                    </div>
                  	<div class="form-group">
                       <label for="exampleInputEmail1">Email address</label>
                       <input type="email" name="email"  class="form-control" id="email"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Password</label>
                       <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
                    </div>                    
                    <div class="form-group">
                         <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                    </div>
                    <div class="col-md-12 text-center ">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Login</button>
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