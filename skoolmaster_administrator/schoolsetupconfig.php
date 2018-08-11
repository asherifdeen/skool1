<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$queryschool=mysqli_query($con,"select * from school");
$schoolrow=mysqli_fetch_array($queryschool);
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

    <title>School Setup | SkoolMaster</title>

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
	
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
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
					<h3 class="page-header"><i class="fa fa-cogs"></i> School Setup</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-cogs"></i>School Setup</li>					  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              
              
              <div class="col-lg-8">
					
                    <div class="panel">
                    	<div class="panel-heading">
                        Setup School
                        </div>
                        <div class="panel-body">
                        
                        <form class="form-horizontal" method="post" action="schoolsetupdatescript.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-3">
                                      <button class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Save</button>
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
                                      <a data-toggle="tab" href="#personal">School Details</a>
                                  </li>
                               
                              </ul>
                          </header>
                          <div class="panel-body">
                        
                        	<div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<label class="col-lg-3 control-label">Required fields = <span style="color:#F00;">*</span></label>
                                    
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-3 control-label">School Code<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <input class="form-control input-sm" value="<?php echo $schoolrow['schoolcode'] ?>" id="schoolcode" name="schoolcode"  type="text" readonly />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-3 control-label">School Name<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-6">
                                              <input value="<?php echo $schoolrow['schoolname'] ?>" class="form-control input-sm" id="schoolname" name="schoolname"  type="text" placeholder="School Name" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-3 control-label">Address <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-6">
                                              <input value="<?php echo $schoolrow['address'] ?>" class="form-control input-sm" id="address" name="address"  type="text" placeholder="Address" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-3 control-label">Location <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <input value="<?php echo $schoolrow['location'] ?>" class="form-control input-sm" id="location" name="location"  type="text" placeholder="Location" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-3 control-label">School Logo<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <img id="blah" src="<?php echo $schoolrow['logo']; ?>" width="150" height="150" style="border: 3px solid #248038;">
                                   
                                   				<input name="file" type="file" onchange="readURL(this);" style="width:85px;">
                                          </div>
                                      </div>
                                      
                        				
                                        <?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                    
                                    </div>
                                 </div>
                              </div><!--/panel body end-->
							</section><!-- /panel section-->
                            </div><!--/ col-lg-12-->
						</div><!--/.row-->
                        </form>
                        </div><!--/div panel-->
                        </div><!--/col-lg-8-->
              
              
              
             
              
              		
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
    
    
  </body>
</html>
