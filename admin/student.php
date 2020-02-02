<?php
include('include/config.php');
$name = $_SESSION['uname'];
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
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Student Details</h4>
      </div>
      <div class="modal-body">
        <div id="view"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
        Student
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student</li>
      </ol>
    </section>
	<section class="content">
	<div class="box box-primary">
	
	 
	 <div class="box">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Phone Number</th>
				  <th>Confirmation Letter</th>
				  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
		     $student = mysqli_query($conn,'SELECT * FROM student');
			 $i=1;
		     while($stu = mysqli_fetch_array($student,MYSQLI_ASSOC)) {
		    ?>
                <tr>
                  <td><?php echo $i++; ?></td>
				  <td><?php echo $stu['firstName']; ?></td>
				  <td><?php echo $stu['lastName']; ?></td>
				  <td><?php echo $stu['phoneNumber']; ?></td>
				  <td><a href="../cletters/<?php echo $stu['cLetter']; ?>" download><?php echo $stu['cLetter']; ?></td>
				  <td><?php if($stu['status'] == 1){ ?> Active <?php } else{ ?> Inactive <?php } ?></td>
				  <td><button class="btn btn-primary view" data-toggle="modal" data-target="#myModal" data-id="<?php echo $stu['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                  </tr>
		<?php } ?>	
				</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
			</div>
	<!--table-->
			
  </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">  
    $(document).ready(function(){
	$('.view').click(function(){
		var id=$(this).data('id');
		$.ajax({
 			 method: "POST",
 			 url: "sview.php",
  			data: { id: id},
			success : function(data){
				$('#view').html(data);
			}
		});
	});
});
</script>
  <!	-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
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
</body>
</html>