<?php
include('include/config.php');
$email = base64_decode($_REQUEST['email']);
$profile = mysqli_query($conn,"select * from owner where email = '".$email."'");
$prof= mysqli_fetch_array($profile,MYSQLI_ASSOC);
$username = $prof['uname'];	
$id = $prof['ownerId'];
if(isset($_POST["submit"])){
	if($_FILES['idProof']['name'] == ''){
	$files = $_POST['oidProof'];
}
else{
	$target_dir = "idproofs";
	$target_file = $target_dir . basename($_FILES['idProof']['name']);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$uplosadOk = 1;
	if($imageFileType == "pdf"){
	$move = move_uploaded_file($_FILES["idProof"]["tmp_name"], $target_file);
	$files = $id.".".$imageFileType ;
	$file ="idproofs/".$files ;
	rename($target_file,$file);
	}
	else{
	$msg = "Invalid File Format";
}
}
$sql = mysqli_query ($conn,'UPDATE owner set ownerId = "'.$_POST["ownerId"].'" , title ="'.$_POST["title"].'" , firstName = "'.$_POST["firstName"].'" , middleName = "'.$_POST["middleName"].'" , lastName ="'.$_POST["lastName"].'", phoneNumber ="'.$_POST["phoneNumber"].'" , dateOfBirth ="'.$_POST["dateOfBirth"].'", address ="'.$_POST["address"].'" , idProff ="'.$files.'" where email ="'.$email.'"');
header('Location: oaccountview.php');
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
                       <label for="ownerId">Owner ID</label>
                       <input type="text" name="ownerId"  class="form-control" id="ownerId" value="<?php echo $prof['ownerId']; ?>" readonly>
                    </div>
                    <div class="form-group">
    					<label for="exampleFormControlSelect1">Title</label>
    					<select class="form-control" id="exampleFormControlSelect1"name="title" >
                        	<option value="<?php echo $prof['title']; ?>"><?php echo $prof['title']; ?></option>
      						<option value="Mr">Mr</option>
      						<option value="Mrs">Mrs</option>
      						<option value="Miss">Miss</option>
    					</select>
 					</div>
                    <div class="form-group">
                       <label for="firstName">First Name</label>
                       <input type="text" name="firstName" id="title"  class="form-control"value="<?php echo $prof['firstName']; ?>">  
                       </div>
                       <div class="form-group">
                       <label for="firstName">Middle Name</label>
                       <input type="text" name="middleName" id="middleName"  class="form-control"value="<?php echo $prof['middleName']; ?>">
                       </div>
                       <div class="form-group">
                       <label for="lastName">Last Name</label>
                       <input type="text" name="lastName" id="lastName"  class="form-control" value="<?php echo $prof['lastName']; ?>">
                       </div>
                       <div class="form-group">
                       <label for="phoneNumber">Phone Number</label>
                       <input type="text" name="phoneNumber" id="phoneNumber"  class="form-control"  value="<?php echo $prof['phoneNumber']; ?>">
                       </div>
                       <div class="form-group">
                       <label for="dateOfBirth">Date Of Birth</label>
                       <input type="date" name="dateOfBirth" id="dateOfBirth"  class="form-control" value="<?php echo $prof['dateOfBirth']; ?>">
                       </div>
                       <div class="form-group">
  					   	<label for="comment">Address</label>
                        <textarea class="form-control" rows="5" id="comment" name="address"><?php echo $prof['address']; ?></textarea>
                       </div>
                       <div class="form-group">
    				   		<label for="FormControlFile1">ID Proff(Any valid photo ID)&nbsp;&nbsp;<span style="color:red; font-size:11px;">(Please Upload only in pdf format)</span></label>
                            <input type="hidden" id="oidProof"  autocomplete="off" class="form-control input-lg"  name="oidProof" 
                            value="<?php echo $prof['idProff']; ?>">
    						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="idProof" ><span><?php echo $prof['idProff']; ?></span>
  					  </div>
                    <div class="form-group">
                         <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                    </div>
                    <div class="col-md-12 text-center ">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Update</button>
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