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

    <title> Exams | SkoolMaster</title>

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
	  "columnDefs": [ { "orderable": false, "targets": 6 } ]
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
					<h3 class="page-header"><i class="icon_check"></i> Exams</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Exams</li>						  	
					</ol>
				</div>
			</div>
            
            
              <!-- page start-->
              
                <div class="row">
                	<div class="col-lg-3">
                    
                    </div>
                    <div class="col-lg-6">
                        <div class="panel">
                            <section class="panel-heading">
                               Student Exams
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="examsscore.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-6">
                                      <button class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Enter Score</button>
                                      <a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                                  </div>
                          	  </div> 
                            </div>
                            
                       <div class="row">
                   		<div class="col-md-12">
                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-primary ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#personal">Exams Detials</a>
                                  </li>
                                  
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<label class="col-lg-4 control-label">Required fields = <span style="color:#F00;">*</span></label>
                                    
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Category<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm" id="category" name="category"  required >
                                              		
                                                   
                                              		<option value="">Category</option>
                                              		<option value="JHS">JHS</option>
                                                    <option value="Primary">Primary</option>
                                                    
                                              </select>
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Class <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm" id="class" name="class"  required >
                                              		
                                                    <option value="">Class</option>
                                              		<?php
													$sql=mysqli_query($con,"select distinct classname from classes");
													while($class=mysqli_fetch_array($sql)){
													?>
													<option value="<?php echo $class['classname'] ?>"><?php echo $class['classname'] ?></option>
													<?php 
													}
													?>
                                                    
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Subject <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-6">
                                              <select class="form-control input-sm" id="subject" name="subject"  required >
                                              
                                              		<option value="">Subject</option>
                                                    <?php
													$sql=mysqli_query($con,"select distinct subjecttitle from subjects");
													while($subject=mysqli_fetch_array($sql)){
													?>
													<option value="<?php echo $subject['subjecttitle'] ?>"><?php echo $subject['subjecttitle'] ?></option>
													<?php 
													}
													?>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      
                                  </div>
                                 
                           
                          </div>
                      </section>
                      </div>
                   </div>
                              
                               </form> 
                            
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
