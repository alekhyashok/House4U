<?php
    include('include/config.php');
    $email = base64_decode($_REQUEST['email']);
    //Getting student details from database
    $sprofile = mysqli_query($conn,"select * from student where email = '".$email."'");
    $sprof= mysqli_fetch_array($sprofile,MYSQLI_ASSOC);
    $username = $sprof['uname'];	
    $id = $sprof['studentId'];
    if(isset($_POST["submit"])){
        if($_FILES['cLetter']['name'] == ''){
        $files = $_POST['ocLetter'];
    }
    else{
        $target_dir = "cletters";
        $target_file = $target_dir . basename($_FILES['cLetter']['name']);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uplosadOk = 1;
        if($imageFileType == "pdf"){
        $move = move_uploaded_file($_FILES["cLetter"]["tmp_name"], $target_file);
        $files = $id.".".$imageFileType ;
        $file ="cletters/".$files ;
        rename($target_file,$file);
        }
        else{
        $msg = "Invalid File Format";
    }
    }
    $sql = mysqli_query ($conn,'UPDATE student set studentId = "'.$_POST["studentId"].'" , title ="'.$_POST["title"].'" , firstName = "'.$_POST["firstName"].'" , middleName = "'.$_POST["middleName"].'" , lastName ="'.$_POST["lastName"].'", phoneNumber ="'.$_POST["phoneNumber"].'" , dateOfBirth ="'.$_POST["dateOfBirth"].'",gender="'.$_POST["gender"].'", address="'.$_POST["address"].'",college="'.$_POST["college"].'",cLetter="'.$files.'",validDate=" ",status="1"
    WHERE email="'.$email.'"');
    header('Location: saccountview.php');
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
			<h2>Edit Your Details</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>Home</a>&nbsp;&nbsp;&nbsp;<a href="oaccountview.php"><i class="fa fa-user"></i>Profile</a>
			<span><i class="fa fa-angle-right"></i>Edit Information</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
        <div><?php if(isset($msg)) echo $msg; ?></div>
			<div class="row">
            <div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-bottom:20px;">Personal Information</h4>
                	<form action="" method="post" name="login" enctype="multipart/form-data">
                  	<div class="form-group">
                       <label for="studentId">Student ID</label>
                       <input type="text" name="studentId"  class="form-control" id="studentId" value="<?php echo $sprof['studentId']; ?>" readonly>
                    </div>
                    <div class="form-group">
                       <label for="title">Title</label>
                       <select class="form-control" id="exampleFormControlSelect1"name="title" >
                        	<option value="<?php echo $sprof['title']; ?>"><?php echo $sprof['title']; ?></option>
      						<option value="Mr">Mr</option>
      						<option value="Mrs">Mrs</option>
      						<option value="Miss">Miss</option>
    					</select>
                       </div>
                       <div class="form-group">
                       <label for="firstName"><span class="color">*</span>First Name</label>
                       <input type="text" name="firstName" id="firstName"  class="form-control"  value = "<?php echo $sprof['firstName']; ?>" required >
                       </div>
                       <div class="form-group">
                       <label for="firstName">Middle Name</label>
                       <input type="text" name="middleName" id="middleName"  class="form-control"  value = "<?php echo $sprof['middleName']; ?>" >
                       </div>
                       <div class="form-group">
                       <label for="lastName"><span class="color">*</span>Last Name</label>
                       <input type="text" name="lastName" id="lastName"  class="form-control"  value = "<?php echo $sprof['lastName']; ?>" required >
                       </div>
                       <div class="form-group">
                       <label for="phoneNumber"><span class="color">*</span>Phone Number</label>
                       <input type="text" name="phoneNumber" id="phoneNumber"  class="form-control"  value = "<?php echo $sprof['phoneNumber']; ?>" pattern="[0-9]{10}" title="Enter 10 digits only" required>
                       </div>
                       <div class="form-group">
                       <label for="dateOfBirth"><span class="color">*</span>Date Of Birth</label>
                       <input type="date" name="dateOfBirth" id="dateOfBirth"  class="form-control datetimepicker2"  value = "<?php echo $sprof['dateOfBirth']; ?>" required>
                       </div>
                       <div class="form-group">
                        <label for="gender">Gender&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<?php
                        if($sprof['gender'] == 'Male' ){
                        ?>
                       <div class="form-check form-check-inline">
						  	<input type="radio" class="form-check-input" id="gender" name="gender" value="Male" checked>
						  	<label class="form-check-label" for="gender">Male</label>
						</div>
						<div class="form-check form-check-inline">
						  	<input type="radio" class="form-check-input" id="gender" name="gender" value="Female">
						  	<label class="form-check-label" for="gender">Female</label>
						</div>
                        <?php } else { ?>
                        <div class="form-check form-check-inline">
						  	<input type="radio" class="form-check-input" id="gender" name="gender" value="Male">
						  	<label class="form-check-label" for="gender">Male</label>
						</div>
						<div class="form-check form-check-inline">
						  	<input type="radio" class="form-check-input" id="gender" name="gender" value="Female" checked>
						  	<label class="form-check-label" for="gender">Female</label>
                        </div>
                        <?php } ?>
                        </div>
                        <div class="form-group">
  						<label for="comment"><span class="color">*</span>Address</label>
  						<textarea class="form-control" rows="5" id="comment" name="address" required><?php echo $sprof['address']; ?></textarea>
						</div>
                        <div class="form-group">
                        <label for="FormControlFile1">Confirmation Letter &nbsp;&nbsp;<span style="color:red; font-size:11px;">(Please Upload only in pdf format)</span></label>
                        <input type="hidden" id="oidProof"  autocomplete="off" class="form-control input-lg"  name="ocLetter" value="<?php echo $sprof['cLetter']; ?>">
    				    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cLetter">
                        </div>
                        <div class="form-group">
                        <label for="college">College</label>
                        <select name="college" class="form-control input-lg" required>
          					<option value="<?php echo $sprof['college']; ?>"> <?php echo $sprof['college']; ?> </option>
		  						<?php 
                                    // getting colleges from database
		  							$college = mysqli_query($conn,'SELECT * FROM college ORDER BY id');
									while($coll= mysqli_fetch_array($college,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $coll['name'];?>"><?php echo $coll['name'];?></option>
				               <?php	} ?>
        			   </select>
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