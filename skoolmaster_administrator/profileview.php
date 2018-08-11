<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];
$staffid=$_SESSION['staffid'];

$query=mysqli_query($con,"select * from staff where staffid='$staffid'");

$row=mysqli_fetch_array($query);

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

    <title>Profile | SkoolMaster</title>

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
    <link rel="stylesheet" href="../resources/jquery_ui/jquery-ui.theme.css">
	<link rel="stylesheet" href="../resources/jquery_ui/jquery-ui.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
      <script src="../resources/js/respond.min.js"></script>
      <script src="../resources/js/lte-ie7.js"></script>
    <![endif]-->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/jquery_ui/jquery-ui.js"></script> 
    
<script>
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
					<h3 class="page-header"><i class="fa fa-tachometer"></i> Profile View</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-tachometer"></i>Profile View</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <section class="panel-heading">
                               Profile View
                            </section>
                            <div class="panel-body">
                            
                            <!-- patient information-->
                            <div class="row">
                            	<div class="col-lg-12">
                            		<div class="panel">
                                    
                                    	<div class="row" style="margin-bottom:15px; margin-left:10px;">
                                            	<div class="col-lg-4">
                                                	<a href="profileedit.php" class="btn btn-primary btn-sm"> Edit Profile </a>
                                      				<a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                                                </div>
                                            </div>
                                    
                                    	<div class="panel-body">
                                        
                                        
                                            
                                        	<div class="row">
                                            	<!-- patient icon-->
                                                <div class="col-lg-1" style="font-size:80px">
                                                	<span class="icon_profile"></span>
                                                </div>
                                                
                                                <!-- patient details-->
                                                <div class="col-lg-11">
                                                	<div class="row">
                                                    	<div class="col-lg-3">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Staff ID</u> <br>
                                                                    <?php echo $staffid ?>
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-2">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Contact</u> <br>
                                                                    <?php echo $row['contact']; ?> 
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>User Name</u> <br>
                                                                     <?php echo $row['username'] ?>
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div class="row">
                                                    	<div class="col-lg-3">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Staff Name</u> <br>
                                                                    <?php echo $staffnname ?> 
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-2">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Status</u> <br>
                                                                    <?php echo $row['system'] ?> 
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                        
                                                    
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                                
                                              <!--alert -->
                                                  <div style="margin-top:5px;">
                                                  <?php 
                                                    echo $_SESSION['result'];
                                                    unset ($_SESSION['result']);
                                                     ?>
                                                   </div>
                                                 <!--end alert-->  
                                                
                                                
                                        </div>
                                    <!--panel body-->
                                    	</div>
                                    </div>
                            	</div>
                            </div>
                            <!-- patient information end-->
                        
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
    <!-- javascripts -->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../resources/js/jquery.scrollTo.min.js"></script>
    <script src="../resources/js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../resources/js/scripts.js"></script>


  </body>
</html>
