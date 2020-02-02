<?php
	include('include/config.php'); 
	$accNumber = $_SESSION['accNumber'];
	if(isset($_POST["submit"])){
	$image = mysqli_query($conn,"SELECT id FROM images ORDER BY id DESC LIMIT 1");
	$img = mysqli_fetch_array($image, MYSQLI_ASSOC);
	$id = $img['id'];
	$nid = $img['id'] + 1;
	$target_dir = "upload";
	$target_file = $target_dir . basename($_FILES['image']['name']);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if($imageFileType == "JPG" || $imageFileType == "jpg"){
	$move = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	$file = $nid.".".$imageFileType ;
	$target_new ="upload/".$file ;
	rename($target_file,$target_new);
	$sql = mysqli_query ($conn,'INSERT INTO images (image , accNumber) VALUES ("'.$file.'" , "'.$accNumber.'")');
	}else {
        echo "<script>alert('Please Upload a JPG Image')</script>";
        $uploadOk = 0;
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
			<h2>Add Facilities & Images</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Images</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
        <div class="row" style="padding-bottom:20px;">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        	<table class="table table-striped">
    					<thead>
                          <tr>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
		    			$list = mysqli_query($conn,"SELECT * FROM images where accNumber = '".$accNumber ."' ORDER BY id");
						$i=1;
						while($lis = mysqli_fetch_array($list,MYSQLI_ASSOC)){ 
						?>
                          <tr>
                            <td><img src="upload/<?php echo $lis['image'];?>" height="100px" width="100px"></td>
                            <td><a href="imagei.php?id=<?php echo base64_encode($lis['id']);?>"><button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-remove"></i></button></a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
        </div>
        <div class="col-sm-2"></div>
        </div>
			<div class="row">
            <div class="col-sm-2"></div>
				<div class="col-sm-8" style="border:1px solid black; padding:10px;">
                	<h4 align="center" style="padding-top:10px; padding-bottom:20px;">Images</h4>
                    <form action="" method="post" name="login" enctype="multipart/form-data">
                    <input type="hidden" name="accNumber" value="<?php echo $accNumber; ?>">
                    	<div class="form-group">
                       <label for="firstName">Add Image</label>
                       <input type="file" name="image" id="image"  class="form-control">  
                       </div>
                    <div class="row">
                    	<div class="col-sm-4"></div>
					 	<div class="col-md-4" style="padding-bottom:20px;">	
                         	<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Submit</button>
                    	</div>
                   		<div class="col-sm-4"></div> 
                    </div>  
                    </form>
                </div>
                <div class="col-sm-2"></div>
								
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