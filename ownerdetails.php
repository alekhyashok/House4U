<?php
include('include/config.php');	
$email = $_SESSION['oemail'];
$id = $_POST['ownerId'];
if(isset($_POST["submit"])){
$target_dir = "idproofs";
$target_file = $target_dir . basename($_FILES['idProof']['name']);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uplosadOk = 1;
if($imageFileType == "pdf"){
$move = move_uploaded_file($_FILES["idProof"]["tmp_name"], $target_file);
$file = $id.".".$imageFileType ;
$target_new ="idproofs/".$file ;
rename($target_file,$target_new);
$sql = mysqli_query ($conn,'UPDATE owner set ownerId = "'.$_POST["ownerId"].'" , title ="'.$_POST["title"].'" , firstName = "'.$_POST["firstName"].'" , middleName = "'.$_POST["middleName"].'" , lastName ="'.$_POST["lastName"].'", phoneNumber ="'.$_POST["phoneNumber"].'" , dateOfBirth ="'.$_POST["dateOfBirth"].'", address ="'.$_POST["address"].'" , idProff ="'.$file.'" where email ="'.$email.'"');
header('Location: oaccountview.php');
}else{
$msg = "Invalid File Format";
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
			<h2>Add Personal Details</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Add Personal Details</span>
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
                       <input type="text" name="ownerId"  class="form-control" id="ownerId" value="<?php echo uniqid(); ?>" readonly>
                    </div>
                    <div class="form-group">
    					<label for="exampleFormControlSelect1">Title</label>
    					<select class="form-control" id="exampleFormControlSelect1"name="title" >
      						<option>Mr</option>
      						<option>Mrs</option>
      						<option>Miss</option>
    					</select>
 					</div>
                    <div class="form-group">
                       <label for="firstName"><span class = "error">* <?php echo $emailErr;?></span>First Name</label>
                       <input type="text" name="firstName" id="firstName"  class="form-control"  placeholder="Enter First Name" required>
                       </div>
                       <div class="form-group">
                       <label for="firstName">Middle Name</label>
                       <input type="text" name="middleName" id="middleName"  class="form-control"  placeholder="Enter Middle Name">
                       </div>
                       <div class="form-group">
                       <label for="lastName"><span class = "error">* <?php echo $emailErr;?></span>Last Name</label>
                       <input type="text" name="lastName" id="lastName"  class="form-control"  placeholder="Enter last Name" required>
                       </div>
                       <div class="form-group">
                       <label for="phoneNumber"><span class = "error">* <?php echo $emailErr;?></span>Phone Number</label>
                       <input type="text" name="phoneNumber" id="phoneNumber"  class="form-control"  placeholder="Enter phoneNumber" required>
                       </div>
                       <div class="form-group">
                       <label for="dateOfBirth"><span class = "error">* <?php echo $emailErr;?></span>Date Of Birth</label>
                       <input type="date" name="dateOfBirth" id="dateOfBirth"  class="form-control"  placeholder="Enter Date Of Birth" required>
                       </div>
                       <div class="form-group">
  					   	<label for="comment"><span class = "error">* <?php echo $emailErr;?></span>Address</label>
                        <textarea class="form-control" rows="5" id="comment" name="address" required></textarea>
                       </div>
                       <div class="form-group">
    				   		<label for="FormControlFile1"><span class = "error">* <?php echo $emailErr;?></span>ID Proff(Any valid photo ID) &nbsp;&nbsp;<span style="color:red; font-size:11px;">(Please Upload only in pdf format)</span></label>
    						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="idProof" required>
  					  </div>
                    <div class="form-group">
                         <p class="text-center">By signing up you accept our <a href="#myModal" data-toggle="modal">Terms & conditions</a></p>
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
<!-- Modal content-->
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <h6 class="modal-title">Terms & Conditions</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div><p>1 General
Interactive Vacation Rentals acts as a booking agent. It arranges bookings and reservations of cottage accommodation as agents for the owners of the holiday accommodation ("the Property Owner"). The person or persons who provide payment on account of a booking are hereafter referred to as the “Vacationer”</p>
<p>2. Contract:
By selecting “I Agree, Reserve this Property” on the booking interface of the www.rentcottage.com web site, the Vacationer understands and agrees that they are entering into a legal binding contract between the Vacationer and Property Owner as per the authority Ontario Electronic Commerce Act, RSO 2000. The issuance of a written or electronic confirmation to the Vacationer by the Agency shall complete a binding contract between the Vacationer and the Property Owner.</p>

<p>3. Limitations of Liability
The Vacationer represent, warrants, acknowledge and agrees with Rentcottage.com (the Agency) and the Property Owner (the Property Owner) that they will use the cottage and its facilities in accordance with the terms and conditions of this agreement and the house hold rules and that they do so at their own risk and that they indemnify and save the Agency and Property Owner harmless from any claim made as a result of personal injury, sickness or death, loss or damage, however caused, to person or property of the Vacationer or their family, guests, visitors, servants and agents during or after the time of occupancy. Further, the Vacationer accepts full responsibility of the use of any recreational equipment, such as boats and motors, etc. and agrees to pay for any repairs to damage to or replacement of said equipment, if caused by the vacationer or any of their family, guests, visitors, servants and agents.</p>

<p>4. Credit Card Guarantee
The Vacationer agrees to provide a valid credit card number as a guarantee:
To pay all outstanding long distance phone charges, and accept all liability for any damage beyond normal wear and tear (for those items not covered by the Accidental Damage Protection Plan, if purchased) during the term of the Vacation;
And to also to pay any penalties listed in this agreement and house rules for failure to meet any of the terms and conditions listed there in.</p>

<p>5. Payment:
5.1 Bookings shall be confirmed in writing by the Agency on payment of a deposit (said confirmation does not refer to the Booking Application Form).
5.2 Receipt of any deposit prior to the Agency's written confirmation of the reservation shall not constitute acceptance of any booking.
5.3 The balance shall be payable 30 days prior to the commencement of the holiday.
5.4 If the Vacationer books the holiday less than 30 days from its commencement the full booking charge shall be payable upon booking.
5.5 All payments shall be made to the Agency by credit card, cheque, money order or in cash only.
5.6 There will be a $25.00 penalty if the balance owing is not paid to the Agency in full 30 days prior to occupancy.
5.7 All payments made within 20 days of occupancy must be made by certified cheque or valid credit card.</p>

<p>6. Alternative Accommodation:
6.1 In the highly unlikely event that the Agency shall be unable to arrange the holiday accommodation requested by the Vacationer, the Agency shall attempt to arrange alternative holiday accommodation of a similar type and cost and standard and in a similar location as that originally requested by the Vacationer. If the alternative holiday accommodation and/or rate, is not acceptable to the Vacationer the Agency shall refund in full, to the Vacationer all monies paid by him/her to the Agency.
6.2 Requests by the Vacationer for alternative accommodation and/or dates, will be processed only if the original booking property/time can be re- booked, and will result in an additional administrative charge of $100.00 per change.</p></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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