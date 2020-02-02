<?php
	include('include/config.php');
    
	if(isset($_POST["submit"])){
		$password = md5($_POST['password']);
		$identify = $_POST['person'];
		if($identify == "Student"){
            // getting details of student from database 
			$squery = mysqli_query($conn,"SELECT * FROM student where email = '".$_POST['email']."' AND password = '".$password."'") or die(mysql_error()); 
			if($squery->num_rows == 1){
				$sres = mysqli_fetch_array($squery, MYSQLI_ASSOC);
				$fname = $sres['firstName'];
				$_SESSION['semail'] = $sres['email'];
				$_SESSION['persons'] = "Student";
			}
			if($squery->num_rows == 1 && $fname == " ") {
				echo'<script>window.location="studentdetails.php";</script>';
			}else if($squery->num_rows == 1 && $fname != " "){
				echo'<script>window.location="index.php";</script>';
			}else{
				$msg = "<p style='color:red;'>The Username and Password are invalid. Please Retry.</p>";
			}
		}else if($identify == "Owner"){
            //getting details of Owner from databse
			$query = mysqli_query($conn,"SELECT * FROM owner where email = '".$_POST['email']."' AND password = '".$password."'") or die(mysql_error()); 
			if($query->num_rows == 1){
				$res = mysqli_fetch_array($query, MYSQLI_ASSOC);
				$ofname = $res['firstName'];
				$_SESSION['oemail'] = $res['email'];
				$_SESSION['person'] = "Owner";
			}
			if($query->num_rows == 1 && $ofname == " ") {
				echo'<script>window.location="ownerdetails.php";</script>';
			}else if($query->num_rows == 1 && $ofname != " "){
				echo'<script>window.location="index.php";</script>';
			}else{
				$msg = "<p style='color:red;'>The Username and Password are invalid. Please Retry.</p>";
			}
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
                       <label for="exampleInputEmail1"><span class="color">*</span>Person Type</label>
                       <select name="person" class="form-control input-lg" required>
          					<option value="none"> --- Select Person Type --- </option>
		  						<?php  
                                    //Getting person Orders from Database
		  							$person = mysqli_query($conn,'SELECT * FROM person ORDER BY id');
									while($per = mysqli_fetch_array($person,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $per['name'];?>"><?php echo $per['name'];?></option>
				               <?php	} ?>
        			   </select>
                    </div>
                  	<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Email address</label>
                       <input type="email" name="email"  class="form-control" id="email"  placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Password</label>
                       <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password" required>
                    </div>                    
                    
                    <div class="col-md-12 text-center ">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Login</button>
                    </div>
                    <div class="form-group">
                        <p align="center"> <a href="#myModal" data-toggle="modal">Forget Password</a>    </p>                                                                  
                    </div>
                  </form>
                </div>
                <div class="col-sm-3"></div>								
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