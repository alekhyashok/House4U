<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu">
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
          </a>
          
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i><span>Owner</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="cowner.php"><i class="fa fa-circle-o"></i> Create</a></li>
            <li><a href="owner.php"><i class="fa fa-circle-o"></i> View</a></li>
            <li><a href="editowner.php"><i class="fa fa-circle-o"></i> Update</a></li>
			<li><a href="odelete.php"><i class="fa fa-circle-o"></i> Delete</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Student</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="cstudent.php"><i class="fa fa-circle-o"></i> Create</a></li>
            <li><a href="student.php"><i class="fa fa-circle-o"></i> View</a></li>
            <li><a href="editstudent.php"><i class="fa fa-circle-o"></i> Update</a></li>
			<li><a href="sdelete.php"><i class="fa fa-circle-o"></i> Delete</a></li>
          </ul>
		  </li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-commenting" aria-hidden="true"></i> <span>Messages</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="message.php"><i class="fa fa-circle-o"></i> View</a></li>           
          </ul>
		  </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-star" aria-hidden="true"></i> <span>Ratings</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="rating.php"><i class="fa fa-circle-o"></i> View</a></li>
			<li><a href="rdelete.php"><i class="fa fa-circle-o"></i> Delete</a></li>
          </ul>
		  </li>
         <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="locationreport.php"><i class="fa fa-circle-o"></i> Location</a></li>
            <li><a href="studentreport.php"><i class="fa fa-circle-o"></i> Student</a></li>
          </ul>
        </li>
		</ul>
      
       
    </section>
    <!-- /.sidebar -->
  </aside>