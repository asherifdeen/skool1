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

    <title>System Info |  SkoolMaster</title>

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
    
    
   
    
    <link href="../resources/datepicker/jquery-ui/jquery-ui.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
      <script src="../resources/js/respond.min.js"></script>
      <script src="../resources/js/lte-ie7.js"></script>
    <![endif]-->
    
    
    
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
					<h3 class="page-header"><i class="fa fa-cogs"></i> About & Support</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-cogs"></i>About & Support</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              		<div class="alert alert-info">
                      <strong>For Help!</strong> contact us: sherifdata@gmail.com || 0203548414.</br>
                      Incase of any challanges or problem relating to the use of this application contact the above email or contact number for more details. Thank You.
                   </div>
                   
                   <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            <strong>Basic System Components</strong><br>
                            
                            <p style="margin-left:25px">SchoolMaster Portal is an application or platform that give you access to important resources and information critical to student academic life in the school.
                            </p>
                            
                            <p style="margin-left:25px">The application or platform has captured severeal areas relating to students and academic staff, which are as followed.
                            </p>
                            
                            <ol style="list-style:circle;">
                                <li>
                                Student enrollment or registration which include student ID generation and Picture Capturing.
                                </li>
                                <li>
                                Registration of academic staffs and generation of Staff ID						
                                </li>
                                <li>
                                Registration of academic classes.						
                                </li>
                                <li>
                                Assignment of classes to academic staffs.						
                                </li>
                                <li>
                                Students bills generation.						
                                </li>
                                <li>
                                Fees Payment and Reciept generation.						
                                </li>
                                <li>
                                General Ledger for student fees payment.						
                                </li>
                                <li>
                                Fee defaulters tracker.						
                                </li>
                                <li>
                                Data upload from excel file component						
                                </li>
                                <li>
                                System configuration for school and academic term detials.						
                                </li>
                                <li>
                                Accepts student Exams score and Class Assessment score						
                                </li>
                                <li>
                                Generation of all kinds of reports including, End of term Exams Report, Continue Assessment Report, Termly Average Student Score, Exams score Sheet, Various Student List Report,Fee payment report,Re-generation of reciept, etc.						
                                </li>
                                <li>
                                Student Promotion component						
                                </li>
                                <li>
                                Database Backup and Restore component						
                                </li>
                                <li>
                                Mulitiple user platform					
                                </li>
                                <li>
                                It can be assessed on any computer when depolyed on a network.						
                                </li>
                            </ol>
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
