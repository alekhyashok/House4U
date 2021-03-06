<?php
	include('include/config.php');
	$email = $_SESSION['oemail'];
	$oview = mysqli_query($conn,"select * from chating where ownerId = '".$email."'");
	$ov= mysqli_fetch_array($oview,MYSQLI_ASSOC);
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
			<h2><?php echo $n['uname']; ?>'s Messages</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>&nbsp;&nbsp;&nbsp;<a href="oaccountview.php"><i class="fa fa-user"></i>Profile</a>
			<span><i class="fa fa-angle-right"></i>Messages</span>
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
                            <th>Message From</th>
                            <th>Message</th>
                            <th>For Accommodation</th>
                            <th>Address</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
		    			$list = mysqli_query($conn,"SELECT * FROM chating where ownerId = '".$email."' AND messageFrom = 'Student' ORDER BY id");
						$i=1;
						while($lis = mysqli_fetch_array($list,MYSQLI_ASSOC)){ 
						$stuemail = $lis['studentId'];
						$stu = mysqli_query($conn,"SELECT * FROM student where email = '".$stuemail."'");
						$s = mysqli_fetch_array($stu,MYSQLI_ASSOC);
						$accNumber = $lis['accNumber'];
						$acc = mysqli_query($conn,"SELECT * FROM accommodation where accNumber = '".$accNumber."'");
						$a = mysqli_fetch_array($acc,MYSQLI_ASSOC);
						?>
                          <tr>
                            <td><?php echo $s['firstName'];?>&nbsp;&nbsp <?php echo $s['lastName']; ?></td>
                            <td><?php echo $lis['message']; ?></td>
                            <td><?php echo $lis['accNumber']; ?></td>
                            <td><?php echo $a['address']; ?></td>
                            <td><a href="mreply.php?id=<?php echo base64_encode($email);?>&stuid=<?php echo base64_encode($stuemail);?>&acc=<?php echo base64_encode($accNumber); ?>&mid=<?php echo base64_encode($lis['id']); ?>"><?php if($lis['status'] == 0){ ?><button class="btn btn-info btn-flat" type="submit"><i class="fa fa-reply"></i></button><?php }else{ ?><button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-reply"></i></button><?php } ?></a></td>
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