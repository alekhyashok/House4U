<?php
include('include/config.php');
$npassword = md5($_POST['password']);
if(isset($_POST["submit"])){
	$password = $_POST["password"];
	$cpassword = $_POST["cPassword"];
	if($password == $cpassword)
	{
        //inserting student details into database
$sql = mysqli_query ($conn,'INSERT INTO student (title,firstName,middleName,lastName,phoneNumber,dateOfBirth,gender,address,cLetter,validDate,college,status,studentId,email,password,uname) VALUES 
(" "," "," "," "," "," "," ", " "," ", " "," "," "," ","'.$_POST["email"].'","'.$npassword.'","'.$_POST["uname"].'")');
header('Location:login.php');
	}else{
		$msg = "The password and confirm password are nor matched. Please enter correct values";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<script>
function checkAvailability() {
	var email = $('#email').val();
	$.ajax({
		url: "scheck_availability.php",
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
			<h2>Student Registration</h2>
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
                	<h4>Student</h4>
                	<form action="" method="post" name="login" id="login">
                  	<div class="form-group">
                       <label for="email"><span class="color">*</span>Email address</label>
                       <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email" onBlur="checkAvailability()" required>
                    </div>
                    <span id="avail_staus"></span>
                    <div class="form-group">
                       <label for="password"><span class="color">*</span>Password</label>
                       <input type="password" name="password"  class="form-control" id="password"  placeholder="Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    
                    <div class="form-group">
                       <label for="confirmpassword"><span class="color">*</span>Confirm Password</label>
                       <input type="password" name="cPassword" id="confirmPassword"  class="form-control"  placeholder="Confirm Password" required title="""Same As Password" required>
                       </div>
                    <div class="form-group">
                       <label for="uname"><span class="color">*</span>Username</label>
                       <input type="text" name="uname" id="uname"  class="form-control"  placeholder="Enter User Name" required>
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