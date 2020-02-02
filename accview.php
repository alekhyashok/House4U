<?php
	include('include/config.php');
	$email = base64_decode($_REQUEST['email']);
	$oview = mysqli_query($conn,"select * from owner where email = '".$email."'");
	$ov= mysqli_fetch_array($oview,MYSQLI_ASSOC);
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
			<h2><?php echo $ov['uname']; ?>'s Accommodations</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>&nbsp;&nbsp;&nbsp;<a href="oaccountview.php"><i class="fa fa-user"></i>Profile</a>
			<span><i class="fa fa-angle-right"></i>Accommodations List</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
            	<div class="col-sm-1"></div>
				<div class="col-sm-10" style="border:1px solid black; padding:10px;">
                	<table class="table table-striped">
    					<thead>
                          <tr>
                            <th>Acc Number</th>
                            <th>Rent Type</th>
                            <th>House Type</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
		    			$list = mysqli_query($conn,"SELECT * FROM accommodation  where ownerId = '".$email."' ORDER BY id");
						$i=1;
						while($lis = mysqli_fetch_array($list,MYSQLI_ASSOC)){ ?>
                          <tr>
                            <td><?php echo $lis['accNumber']; ?></td>
                            <td><?php echo $lis['rentType']; ?></td>
                            <td><?php echo $lis['houseType']; ?></td>
                            <td><?php echo $lis['address']; ?></td>
                            <td><?php echo $lis['price']; ?></td>
                            <td><?php if($lis['status'] == 1){ ?> Active <?php } else{ ?> Inactive <?php } ?></td>
                            <td><a href="hedit.php?id=<?php echo base64_encode($inm1['id']); ?>"><button class="btn btn-info btn-flat" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="hdelete.php?id=<?php echo $inm1['id']; ?>"><button class="btn btn-danger btn-flat" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times" aria-hidden="true"></i></button></a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                </div>
                <div class="col-sm-1"></div>								
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