<?php
include('include/config.php');
$email = $_SESSION['oemail'];
if(isset($_POST["submit"])){
	$sql = mysqli_query ($conn,'INSERT INTO accommodation (accNumber , ownerId , rentType , houseType , location , price , distance , busRoute , address , days , description , nearCollege , status) VALUES ("'.$_POST["accNumber"].'", "'.$email.'" , "'.$_POST["rentType"].'" , "'.$_POST["houseType"].'" , "'.$_POST["location"].'" , "'.$_POST["price"].'" , "'.$_POST["distance"].'" , "'.$_POST["busRoute"].'" , "'.$_POST["address"].'" , "'.$_POST["days"].'" , "'.$_POST["description"].'" , "'.$_POST["nearCollege"].'" , "1")');
	$_SESSION['accNumber'] = $_POST['accNumber'];
	header('Location: facilities.php');
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
			<h2>Register Accommodation</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Register Accommodation</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            <div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:1px solid black; padding:10px;">
                <h4 align="center" style="padding-bottom:20px;">Accommodation Details</h4>
                	<form action="" method="post" name="login">
                  	<div class="form-group">
                       <label for="exampleInputEmail1">Accommodation Number</label>
                       <input type="text" name="accNumber"  class="form-control" id="email" value="<?php echo uniqid(); ?>" readonly>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Rent Type</label>
                       <select name="rentType" class="form-control input-lg" required>
          					<option value=""> --- Rent Type --- </option>
		  						<?php 
		  							$rent = mysqli_query($conn,'SELECT * FROM renttype ORDER BY id');
									while($rt = mysqli_fetch_array($rent,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $rt['name'];?>"><?php echo $rt['name'];?></option>
				               <?php	} ?>
        			   </select>
                       </div>
					   <div class="form-group">
                       <label for="exampleInputEmail1">House type</label>
                       <select name="houseType" class="form-control input-lg" required>
          					<option value=""> --- House type --- </option>
		  						<?php 
                                    // Getting type of the Accommodation from database
		  							$house = mysqli_query($conn,'SELECT * FROM housetype ORDER BY id');
									while($ht = mysqli_fetch_array($house,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $ht['type'];?>"><?php echo $ht['type'];?></option>
				               <?php	} ?>
        			   </select>
                    </div>
					   <div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Location</label>
                       <select name="location" class="form-control input-lg" required>
          					<option value=""> --- Select Location --- </option>
		  						<?php 
                                   // getting Location of the Order from the database 
		  							$location = mysqli_query($conn,'SELECT * FROM location ORDER BY id');
									while($loc = mysqli_fetch_array($location,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $loc['name'];?>"><?php echo $loc['name'];?></option>
				               <?php	} ?>
        			   </select>
                    </div>
					<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Price</label>
                       <input type="text" name="price"  class="form-control" id="email" placeholder="Enter price" required>
                    </div>
					<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Distance to college(In KM)</label>
                       <input type="text" name="distance"  class="form-control" id="email" placeholder="Enter distance to college" required>
                    </div>
					<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Near to college</label>
                       <select name="nearCollege" class="form-control input-lg" required>
          					<option value="none"> --- Select College --- </option>
		  						<?php 
                                    // Getting Orders from database by Order id
		  							$college = mysqli_query($conn,'SELECT * FROM college ORDER BY id');
									while($coll= mysqli_fetch_array($college,MYSQLI_ASSOC)){ 
								?>
  						    <option value="<?php echo $coll['name'];?>"><?php echo $coll['name'];?></option>
				               <?php	} ?>
        			   </select>
                    </div>
					<div class="form-group">
                       <label for="exampleInputEmail1">Bus routes</label>
                       <input type="text" name="busRoute"  class="form-control" id="email"placeholder="Enter bus routes">
                    </div>
					<div class="form-group">
                    	<label for="comment"><span class="color">*</span>Address</label>
  						<textarea class="form-control" rows="5" id="address" name="address" required></textarea>
					</div>
					<div class="form-group">
                       <label for="exampleInputEmail1"><span class="color">*</span>Days For Rent(In Months)</label>
                       <input type="text" name="days"  class="form-control" id="email"placeholder="Enter days for rent" required>
                    </div>
                    <div class="form-group">
                    	<label for="comment"><span class="color">*</span>Description</label>
  						<textarea class="form-control" rows="5" id="description" name="description" required></textarea>
					</div>
                    <div class="form-group">
                         <p class="text-center">By signing up you accept our <a href="#myModal" data-toggle="modal">Terms & conditions</a></p>
                    </div>
                    <div class="col-md-12 text-center ">
                         <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Submit</button>
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