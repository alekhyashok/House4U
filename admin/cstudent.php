<?php
include('include/config.php');
$name = $_SESSION['uname'];
if(isset($_POST["submit"])){
	$target_dir = "../cletters";
$target_file = $target_dir . basename($_FILES['cLetter']['name']);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uplosadOk = 1;
if($imageFileType == "pdf"){
$move = move_uploaded_file($_FILES["cLetter"]["tmp_name"], $target_file);
$file = $id.".".$imageFileType ;
$target_new ="../cletters/".$file ;
rename($target_file,$target_new);
$sql = mysqli_query ($conn,'INSERT INTO student (studentId , title , firstName , middleName , lastName , phoneNumber , dateOfBirth , gender , address , cLetter , validDate , college , status , email , username , password)VALUES ("'.$_POST["studentId"].'", "'.$_POST["title"].'" , "'.$_POST["firstName"].'" , "'.$_POST["middleName"].'" , "'.$_POST["lastName"].'" , "'.$_POST["phoneNumber"].'" , "'.$_POST["dateOfBirth"].'" , "'.$_POST["gender"].'" , "'.$_POST["address"].'" , "'.$file.'" , "'.$_POST["validDate"].'" , "'.$_POST["college"].'", "1","'.$_POST["email"].'","'.$_POST["username"].'","'.$_POST["password"].'")');	
}
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include('include/head.php'); ?>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('include/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
        Add Student
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Student</li>
      </ol>
    </section>
	<section class="content">
	<div class="box box-primary">
	<form class="form-horizontal" method="post">
	<div class="row" style="padding-top:30px;">
	<div class="col-md-6 col-md-offset-2">
  
              <div class="box-body">
			  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Title</label>

                  <div class="col-sm-9">
                     <select name="title" class="form-control" id="exampleFormControlSelect1">
      						<option>Mr</option>
      						<option>Mrs</option>
      						<option>Miss</option>
    					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Student Id</label>

                  <div class="col-sm-9">
                     <input type="text" name="studentId" id="firstName"  class="form-control"  value="<?php echo uniqid(); ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>First Name</label>

                  <div class="col-sm-9">
                     <input type="text" name="firstName" id="firstName"  class="form-control"  placeholder="Enter First Name" required>
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Middel Name</label>

                  <div class="col-sm-9">
                    <input type="text" name="middleName" id="middleName"  class="form-control"  placeholder="Enter Middle Name">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Last Name</label>

                  <div class="col-sm-9">
                    <input type="text" name="lastName" id="lastName"  class="form-control"  placeholder="Enter last Name" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Phone Number</label>

                  <div class="col-sm-9">
                    <input type="text" name="phoneNumber" id="phoneNumber"  class="form-control"placeholder="Enter Phone Number (9999)(999)(9999)" pattern="^\d{4}\d{3}\d{3}$" title="Enter 10 digits only" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Date Of Birth</label>

                  <div class="col-sm-9">
                    <input type="text" name="dateOfBirth" id="dateOfBirth"  class="form-control"  placeholder="Enter Date Of Birth" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
				<div class="col-sm-9">
                  <input type="text" name="gender" id="gender"  class="form-control"  placeholder="Enter gender">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
				<div class="col-sm-9">
                  <textarea class="form-control" rows="5" id="comment" name="address"></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Confirmation Letter</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cLetter" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Valid Date</label>
					<div class="col-sm-9">
                  <input type="text" name="validDate" id="validDate"  class="form-control"  placeholder="Enter Valid Date" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>College</label>
				<div class="col-sm-9">
                  <input type="text" name="college" id="college"  class="form-control"  placeholder="College Campus" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Email</label>
				<div class="col-sm-9">
                  <input type="text" name="email" id="email"  class="form-control"  placeholder="Enter email" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Username</label>
				<div class="col-sm-9">
                  <input type="text" name="username" id="username"  class="form-control"  placeholder="Enter Username" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"><span class="color">*</span>Password</label>
				<div class="col-sm-9">
                  <input type="text" name="password" id="password"  class="form-control"  placeholder="Enter Password" required>
                  </div>
                </div>
				<div align="center">
				<button class="btn btn-info btn-flat" type="submit" name="submit">ADD</button>
			</div>
                			

              </div>
              
           
			</div>
			
			</div>
			
	 </form>
	 
	 
	<!--table-->
			
  </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('.datetimepicker2').datetimepicker({
	lang:'ch',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',
	// and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->


</body>
</html>