<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


//set the random id length 
$random_id_length = 4; 

//generate a random id encrypt it and store it in $rnd_id 
$rnd_id =(uniqid(rand(),1)); 

//to remove any slashes that might have come 
$rnd_id = strip_tags(stripslashes($rnd_id)); 

//Removing any . or / and reversing the string 
$rnd_id = str_replace(".","",$rnd_id); 
$rnd_id = strrev(str_replace("/","",$rnd_id)); 

//finally I take the first 10 characters from the $rnd_id 
$rnd_id = substr($rnd_id,0,$random_id_length); 

$year=date("Y");

//echo "Random Id:00$year$rnd_id" ;
//echo "<br>";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../resources/img/favicon.png">

    <title>Fee Payment | SkoolMaster</title>

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
					<h3 class="page-header"><i class="fa fa-credit-card"></i> Fee Payment</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-credit-card"></i>Fee Payment</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
                <div class="row">
                
                	<div class="col-lg-3">
                    
                    </div>
                    
                    <div class="col-md-6">
                        <div class="panel">
                            <section class="panel-heading">
                               Fee Payment
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="feepaymentscript.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-4">
                                      <button class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Pay Fees</button>
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
                                      <a data-toggle="tab" href="#personal">Payment Details</a>
                                  </li>
                               
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                      
                                     
                                      
                                     	 <?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      
                                      	<label class="col-lg-4 control-label">Required fields = <span style="color:#F00;">*</span></label>
                                    
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Student ID <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <input class="form-control input-sm" id="studentid" name="studentid"  type="text" value="" required>
                                          </div>
                                      </div>
                                   
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Class <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm" id="class" name="class"  required >
                                              
                                              		<option value="">Class</option>
                                                     <?php
													$sql=mysqli_query($con,"select distinct classname from classes");
													while($classname=mysqli_fetch_array($sql)){
													?>
													<option value="<?php echo $classname['classname'] ?>"><?php echo $classname['classname'] ?></option>
													<?php 
													}
													?>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Term <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm" id="term" name="term"  required >
                                              
                                              		<option value="">Term</option>
                                                    <option value="First Term">First Term</option>
                                                    <option value="Second Term">Second Term</option>
                                                    <option value="Third Term">Third Term</option>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-4 control-label">Amount <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <input class="form-control input-sm" id="amount" name="amount"  type="text"  required/>
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
    <!-- javascripts -->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../resources/js/jquery.scrollTo.min.js"></script>
    <script src="../resources/js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../resources/js/scripts.js"></script>
   
   <script type="text/javascript" src="../resources/datepicker/jquery-ui/jquery-ui.js"></script>
    
     <script>
      
		$(function(){
		var pickopts={
			changeMonth: true,
			changeYear: true,
			dateformat: "d/m/yy"
			};
			$('#date').datepicker(pickopts);
			
	});
	
	</script>

  </body>
</html>
