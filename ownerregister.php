<?php
include('include/config.php');
if(isset($_POST["submit"])){
	$password = $_POST["password"];
	$cpassword = $_POST["cPassword"];
	if($password == $cpassword)
	{
		$npassword = md5($_POST['password']);
        // inserting Owner details into database
		$sql = mysqli_query ($conn,'INSERT INTO owner (firstName, middleName, lastName, phoneNumber, dateOfBirth, address, idProff, ownerId, title, email , password, uname) VALUES (" "," "," "," "," "," "," "," "," ","'.$_POST["email"].'","'.$npassword.'","'.$_POST['uname'].'")');
	}else{
		$msg = "The password and confirm password are nor matched. Please enter correct values";
	}
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<script>
function checkAvailability() {
	var email = $('#email').val();
	$.ajax({
		url: "check_availability.php",
		data: {'email':email},
		type: "POST",
		success:function(data){
			$("#avail_staus").html(data);
	},
	});
}
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
			<h2>Owner Registration</h2>
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
        <div align="center" style="color:red;"> <?php if(isset($msg)) echo $msg; ?> </div>
			<div class="row">
            <div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-bottom:20px;">Owner Details</h4>
                	<form action="" method="post" name="login">
                  	<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Email address</label>
                       <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" onBlur="checkAvailability()" required>
                       <span id="avail_staus"></span>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Password</label>
                       <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Password</label>
                       <input type="password" name="cPassword" id="Confirm Password"  class="form-control" aria-describedby="emailHelp" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Username</label>
                       <input type="text" name="uname" id="uname"  class="form-control" placeholder="Enter Username" required>
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