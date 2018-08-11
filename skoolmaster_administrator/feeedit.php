<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$code=$_GET['feeid'];

$query=mysqli_query($con,"select * from fees where feeid='$code'");

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
    <link rel="shortcut icon" href="../resources/img/favicon.png">

    <title>Fee Edit | SkoolMaster</title>

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
    	
	$(document).ready(function(){
	 
		$("#feeamount").keyup(function(){
		
			if(isNaN(this.value)){
			alert("Key not allowed")
			this.value="<?php echo $row['feeamount'] ?>";		
			}
		});
	
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
					<h3 class="page-header"><i class="icon_archive"></i> Fee Edit</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_archive"></i>Fee Edit</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              	<div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <section class="panel-heading">
                               Fee Edit
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="feeupdatescript.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-2">
                                      <button class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Update</button>
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
                                      <a data-toggle="tab" href="#personal">Personal Information</a>
                                  </li>
                                 
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                    						<label class="col-lg-2 control-label">Required fields = <span style="color:#F00;">*</span></label>
                
                  					  </div>
                					
                                       <div class="row" style="margin-top:5px;">
                                          <div class="col-lg-2 control-label">Fee ID <span style="color:#F00;">*</span></div>
                                          <div class="col-lg-2">
                                              <input type="text" class="form-control input-sm" id="feeid" value="<?php echo $row['feeid'] ?>" name="feeid" readonly>
                                          </div>
                                      </div>
                  
                                      <div class="row" style="margin-top:5px;">
                                          <div class="col-lg-2 control-label">Fee Description <span style="color:#F00;">*</span></div>
                                          <div class="col-lg-3">
                                              <input type="text" class="form-control input-sm" id="feedescription"value="<?php echo $row['feedescription'] ?>"  name="feedescription">
                                          </div>
                                      </div> 
                        
                                       <div class="row" style="margin-top:5px;">
                                          <div class="col-lg-2 control-label">Duration</div>
                                          <div class="col-lg-2">
                                          
                                              <select type="text" class="form-control input-sm" id="feeduration" placeholder="Fee Duration" name="feeduration">
                                                <option value="<?php echo $row['feeduration'] ?>"><?php echo $row['feeduration'] ?></option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Termly">Termly</option>
                                              
                                              </select>
                                          </div>
                                      </div> 
                  
                                      <div class="row" style="margin-top:5px;">
                                          <div class="col-lg-2 control-label">Fee Amount <span style="color:#F00;">*</span></div>
                                          <div class="col-lg-2">
                                              <input type="text" class="form-control input-sm" id="feeamount" value="<?php echo $row['feeamount'] ?>" name="feeamount">
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
