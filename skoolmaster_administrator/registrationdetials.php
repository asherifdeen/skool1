<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


$code=$_GET['studentid'];

$query=mysqli_query($con,"select * from register where studentid='$code'");

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

    <title>Registration Details | SkoolMaster</title>

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
					<h3 class="page-header"><i class="icon_document_alt"></i> Edit Registration</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Registration</li>						  	
					</ol>
				</div>
			</div>
              
                <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <section class="panel-heading">
                               Student Registration Details
                            </section>
                            <div class="panel-body">
                            
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-4">
                                      <a href="students.php" class="btn btn-default btn-sm"> Move Back</a>
                                      <a href='<?php echo "registrationedit.php?studentid=$row[studentid]"; ?>' class="btn btn-primary btn-sm"> Edit Info</a>
                                      <a href='<?php echo "registrationdelete.php?studentid=$row[student]"; ?>' onClick="return confirm('You are about deleting a student.')" class="btn btn-danger btn-sm">Delete Student</a>
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
                                  <li class="">
                                      <a data-toggle="tab" href="#otherinfo">Other Information</a>
                                  </li>
               
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                  	
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col-lg-3">
                                              <img id="blah" src="<?php echo $row['passport']; ?>" width="150" height="150" style="border: 3px solid #248038;">
                                          </div>
                                      </div>
                                      
                                     <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Student ID</div>
                                        <div class="col-lg-3">
                                              <?php echo $row['studentid'] ?>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:10px;">
                                      	<div class="col-lg-2 control-label">Last Name</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['surname'];?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:10px;">
                                      	<div class="col-lg-2 control-label">First Name</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['studentname']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:10px;">
                                      	<div class="col-lg-2 control-label">Gender</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['gender']?>  
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:10px;">
                                      	<div class="col-lg-2 control-label">Birth Of Date</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['birthdate']?>  
                                          </div>
                                      </div>
                                      
                                      
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Place Of Birth</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['birthplace'] ?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Religion</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['religion']; ?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Language Spoken</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['languagespoken']; ?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Percular Habit</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['percularhabit']; ?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Class</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['class']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Previous School</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['previousschool']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Reason for Leaving</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['reason']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Address</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['residentialaddress']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Date of Registration</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['admissiondate']?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Batch</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['batch'] ?>  
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Scholarship Status</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['scholarship'] ?>  
                                          </div>
                                      </div>
                                      
                                  </div>
                                  <div id="otherinfo" class="tab-pane">
                                  
                                  		<div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Guardian Name</div>
                                        <div class="col-lg-3">
                                              <?php echo $row['guardianname'] ?>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:10px;">
                                      	<div class="col-lg-2 control-label">Guardian Contact</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['guardiancontact']?>  
                                          </div>
                                      </div>
                                      
                                      
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Place of Work</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['guardianwork'] ?>    
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:15px;">
                                      	<div class="col-lg-2 control-label">Address</div>
                                        <div class="col-lg-3">
                                            <?php echo $row['guardianaddress'] ?>  
                                          </div>
                                      </div>
                                      
                                      
                                  </div>
                                  
                              </div>
                          </div>
                      </section>
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
