<?php
include('include/config.php');
$sid = $_SESSION['semail'];
$date = date('Y-m-d');
$sql = mysqli_query ($conn,'INSERT INTO booking (bookingNumber , personId , date , status , accNumber , amount) VALUES 
	("'.$_POST["bno"].'" , "'.$sid.'" , "'.$date.'" , "1" , "'.$_POST["accNumber"].'" , "'.$_POST["cost"].'")');
$property = mysqli_query($conn,"SELECT * FROM accommodation WHERE accNumber = '".$_POST["accNumber"]."'");
$pro= mysqli_fetch_array($property,MYSQLI_ASSOC);
$acc = mysqli_query($conn,"SELECT * FROM accept WHERE accNumber = '".$_POST["accNumber"]."' and studentId = '".$sid."' and ownerId = '".$pro['ownerId']."'");
$a= mysqli_fetch_array($acc,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<?php include('include/head.php'); ?>
<body>

<div class="container" style="padding-top:80px;">
<a href="index.php"><h3 align="center" class="color">Home</h3></a>
<div class="row">
	<div class="col-sm-6"><img src="img/logo.png" height="100px" width="100px"></div>
	<div class="col-sm-6" align="right">
    	<p><b>Email: info@house4U.com<br>
        Phone No: +1 999 999 9999<br>
        Address: Conestoga College</b></p>
    </div>
</div>

    
	<p class="color" align="center">"Congratulation! Your accommodation has been booked Successfully. Below is the information</p>
	<div class="row" style="padding-top:10px;">
    	<div class="col-sm-3"></div>
        <div class="col-sm-6" style="border:1px solid black; padding:20px;">
        	<div class="row">
            	<div class="col-sm-5" align="right">Booking Number:</div>
              	 <div class="col-sm-7">
                 <?php echo $_POST['bno']; ?>
                 </div>      
            </div>
            <div class="row">
            	<div class="col-sm-5" align="right">Accommodation Number:</div>
              	 <div class="col-sm-7">
                 <?php echo $_POST['accNumber']; ?>
                 </div>      
            </div>
            <div class="row">
            	<div class="col-sm-5" align="right">Address:</div>
              	 <div class="col-sm-7">
                 <?php echo $pro['address']; ?>
                 </div>      
            </div>
            <div class="row">
            	<div class="col-sm-5" align="right">Start Date:</div>
              	 <div class="col-sm-7">
                 	<?php echo $a['startdate']; ?>
                 </div>      
            </div>
            <div class="row">
            	<div class="col-sm-5" align="right">Cost:</div>
              	 <div class="col-sm-7">
                 <?php echo $a['amount']; ?>
                 </div>      
            </div>
            <div class="row">
            	<div class="col-sm-5" align="right">No.Of.Days:</div>
              	 <div class="col-sm-7">
                 <?php echo $a['ndays']; ?>
             </div>      
            </div>
            <p align="center">Thanks For Booking With House4U</p>
        </div>
        
        <div class="col-sm-3"></div>
	</div>
    <br><br>
    <div align="center"><button onclick="myFunction()" class="btn btn-primary">Print</button></div>
</div>


<script>
function myFunction() {
  window.print();
}
</script>

</body>
</html>