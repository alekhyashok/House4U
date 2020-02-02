<?php
	include('include/config.php');
	$email = $_SESSION['oemail'];
	$name = mysqli_query($conn,"select * from owner where email = '".$email."'");
	$n= mysqli_fetch_array($name,MYSQLI_ASSOC);
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
			<h2><?php echo $n['uname']; ?>'s Requests</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>&nbsp;&nbsp;&nbsp;<a href="oaccountview.php"><i class="fa fa-user"></i>Profile</a>
			<span><i class="fa fa-angle-right"></i>Requests</span>
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
                            <th>Request From</th>
                            <th>For Accommodation</th>
                            <th>Address</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
						$oreq = mysqli_query($conn,"select * from request where ownerId = '".$email."' and approve = '0' and reject ='0'");
						$i=1;
						while($or= mysqli_fetch_array($oreq,MYSQLI_ASSOC)){ 
						$stuemail = $or['studentId'];
						$stu = mysqli_query($conn,"SELECT * FROM student where email = '".$stuemail."'");
						$s = mysqli_fetch_array($stu,MYSQLI_ASSOC);
						$accNumber = $or['accNumber'];
						$acc = mysqli_query($conn,"SELECT * FROM accommodation where accNumber = '".$accNumber."'");
						$a = mysqli_fetch_array($acc,MYSQLI_ASSOC);
						?>
                          <tr>
                            <td><?php echo $s['firstName'];?>&nbsp;&nbsp <?php echo $s['lastName']; ?></td>
                            <td><?php echo $or['accNumber']; ?></td>
                            <td><?php echo $a['address']; ?></td>
                            <td><a href="accept.php?id=<?php echo base64_encode($email);?>&stuid=<?php echo base64_encode($stuemail);?>&acc=<?php echo base64_encode($accNumber); ?>&rid=<?php echo base64_encode($or['id']); ?>"><button class="btn btn-success btn-flat" type="submit">
                            Accept</button></a>&nbsp;&nbsp&nbsp;&nbsp <a href="reject.php?id=<?php echo base64_encode($email);?>&stuid=<?php echo base64_encode($stuemail);?>&acc=<?php echo base64_encode($accNumber); ?>&rid=<?php echo base64_encode($or['id']); ?>"><button class="btn btn-danger btn-flat" type="submit">Reject</button></td></a>
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