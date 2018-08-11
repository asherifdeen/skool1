<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Graduates | SkoolMaster</title>

    <!-- Bootstrap CSS -->    
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../resources/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../resources/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../resources/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../resources/css/style.css" rel="stylesheet">
    <link href="../resources/css/style-responsive.css" rel="stylesheet" />
   
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
      <script src="../resources/js/respond.min.js"></script>
      <script src="../resources/js/lte-ie7.js"></script>
    <![endif]-->
    
    
    
    
    
<link rel="stylesheet" href="../resources/datatable/dataTables.bootstrap.min.css">

<script type="text/javascript" src="../resources/datatable/jquery-1.12.3.js"></script>
<script type="text/javascript" src="../resources/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../resources/datatable/dataTables.bootstrap.min.js"></script>
<script src="../resources/js/jquery.slimscroll.min.js"></script>
<script src="../resources/js/jquery.scrollTo.min.js"></script>
    <script src="../resources/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../resources/js/scripts.js" type="text/javascript"></script>

<script src="../resources/js/bootstrap.min.js"></script>
    
    
	
	<script>
    $(document).ready(function() {
    $('#example').DataTable( {
	  "columnDefs": [ { "orderable": false, "targets": 9 } ]
	});
	} );
	
	
	$(document).ready(function(){
	
	window.setTimeout(function(){
			$(".alert").fadeOut(3000).slideUp(500,
			function(){
				$(this).remove();
			});
		},3000);
		
	});	
    </script>
    
    
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="dashboard.php" class="logo">Skool<span class="lite">Master</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" width="35" height="35" src="../resources/img/avatar1.jpg">
                            </span>
                            <span class="username"><?php echo $staffnname; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profileview.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="../systemfiles/logoutscript.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

       <!--sidebar start-->
      <aside>
           <?php include("sidebar.php") ?>
      </aside>
      <!--sidebar end-->

      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-graduation-cap"></i> Graduates</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-graduation-cap"></i>Graduates</li>						  	
					</ol>
				</div>
			</div>
            
            
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               Graduates
                            </section>
                            <div class="panel-body">
                               
                                <div class="row">
                                    <div class="col-md-12">
                                    	<?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                        
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Admission No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Religion</th>
                                            <th>Class</th>
                                            <th>Contact</th>
                                            <th>Batch</th>
                                            <th>Admission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php
                                    $query=mysqli_query($con,"select * from graduate");
				
									if (mysqli_num_rows($query)<1)
									{
									echo'<div class="alert alert-danger" style="margin-top:10px">';
									echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
									echo 'No student has been graduated!</div>';
									}
									while($row=mysqli_fetch_array($query))
									{
										
									?>
                                        <tr>
                                            <td><?php echo $row['studentid']; ?></td>
                                            <td><?php echo $row['surname'];?></td>
                                            <td><?php echo $row['studentname'];?></td>
                                            <td><?php echo $row['gender'];?></td>
                                            <td><?php echo $row['religion'];?></td>
                                            <td><?php echo $row['class'];?></td>
                                            <td><?php echo $row['guardiancontact'];?></td>
                                            <td><?php echo $row['batch'];?></td>
                                            <td><?php echo $row['admissiondate'];?></td>
                                            <td>
                                            <div class="btn-group">
                                               <a class="btn btn-primary btn-sm" href='<?php echo "graduatereversal.php?studentid=$row[studentid]"; ?>' onClick="return confirm('You are about to reverse a graduated student.')" title="Click to reverse <?php echo $row['surname']." " .$row['studentname']; ?>"><i class="fa fa-reply"></i></a>
                                             </div>
                                            </td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
               </div>
               
               
               
               
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
   


  </body>
</html>
