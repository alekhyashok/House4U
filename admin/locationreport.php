<?php
include('include/config.php');
if(!isset($_SESSION['uname'])){
    header( 'Location:index.php' );
}
$name = $_SESSION['uname'];
$image = $_SESSION['image'];
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
        Accomodation Location
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Accomodation Location</li>
      </ol>
    </section>
	<section class="content">
	<div class="box box-primary">
	
	 
	 <div class="box">
           
            <!-- /.box-header -->
            <form class="form-horizontal" method="post">
	<div class="row" style="padding-top:30px;">
    <div class="col-md-4 col-md-offset-2">
  
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-9">
       <select name="location" class="form-control" required id="class">
          <option value=""> --- Select Location --- </option>
		  <?php 
		  $inm6 = mysqli_query($conn,"select * from location");
				$i=1;
			while($inm7= mysqli_fetch_array($inm6,MYSQLI_ASSOC)){ ?>
						<option value="<?php echo $inm7['name'];?>"><?php echo $inm7['name'];?></option>
				<?php	}
			?>
        </select>                  </div>
                </div>
                
                
              </div>

           
			</div>
	
            
			<div class="col-md-1" style="padding-top:10px;">
			<button class="btn btn-block btn-info btn-flat" type="submit" name="veh">Submit</button>
			</div>
			</div>
	 </form>
     <?php
	 if(isset($_POST["location"])){
		 $location = $_POST['location'];

		 ?>
            <div class="box-body table-responsive">
            <div class="box-header">
              <h3 class="box-title">Location:&nbsp;&nbsp;<?php echo $location; ?></h3>&nbsp;&nbsp;
            </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Accomodation Number</th>
                  <th>Owner Id</th>
				  <th>Near College</th>
				  <th>Distance(KM)</th>
                </tr>
                </thead>
                <tbody>
				<?php 
		     $student = mysqli_query($conn,'SELECT * FROM accommodation where location ="'.$location.'"');
			 $i=1;
		     while($stu = mysqli_fetch_array($student,MYSQLI_ASSOC)) {
		    ?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $stu['accNumber']; ?></td>
				  <td><?php echo $stu['ownerId']; ?></td>
				  <td><?php echo $stu['nearCollege']; ?></td>
				  <td><?php echo $stu['distance']; ?></td>
				  
				  <td><button class="btn btn-primary view" data-toggle="modal" data-target="#myModal" data-id="<?php echo $stu['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                  </tr>
		<?php } ?>	
				</tbody>
              </table>
            </div>
            <!-- /.box-body -->
         <?php } ?>
          </div>
			</div>
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
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
