<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


$code=$_GET['studentid'];

$query=mysqli_query($con,"select * from register where studentid='$code'");

$row=mysqli_fetch_array($query);



$studentid=$row['studentid'];
$lastname=$row['surname'];
$firstname=$row['studentname'];
$gender=$row['gender'];
$birthdate=$row['birthdate'];
$birthplace=$row['birthplace'];
$religion=$row['religion'];
$language=$row['languagespoken'];
$habit=$row['percularhabit'];
$class=$row['class'];
$previousschool=$row['previousschool'];
$reason=$row['reason'];
$address=$row['residentialaddress'];
$scholarship=$row['scholarship'];
$batch=$row['batch'];
$dor=$row['admissiondate'];
$guardianname=$row['guardianname'];
$guardiancontact=$row['guardiancontact'];
$guardianwork=$row['guardianwork'];
$guardianaddress=$row['guardianaddress'];
$passport=$row['passport'];


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

    <title>Registration Edit | SchoolMaster</title>

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
                               Edit Registration
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="registrationupdatescript.php" enctype="multipart/form-data">
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
                                  <li class="">
                                      <a data-toggle="tab" href="#other">Guardian Information</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#passport">Change Passport</a>
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
                                      	<div class="col-lg-2 control-label">Student ID</div>
                                        <div class="col-lg-2">
                                              <input class="form-control input-sm" id="studentid" name="studentid"  type="text" value="<?php echo $studentid?>" readonly/>
                                          </div>
                                      </div>
                                      
                                     
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Last Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="lastname" name="lastname" value="<?php echo $lastname?>"  type="text" placeholder="Last Name" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">First Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="firstname" name="firstname" value="<?php echo $firstname?>"  type="text" placeholder="First Name" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Gender <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="gender" name="gender"  required >
                                              
                                              		<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Date of Birth <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="date" name="date" value="<?php echo $birthdate ?>"  type="text" placeholder="Date of Birth" required/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Place of Birth</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="birthplace" name="birthplace" value="<?php echo $birthplace ?>"  type="text"placeholder="Place of Birth  [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Religion <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="religion" name="religion"  required >
                                              
                                              		<option value="<?php echo $religion ?>"><?php echo $religion ?></option>
                                                    <option value="Christain">Christain</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Others">Others</option>
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Language Spoken</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="language" name="language" value="<?php echo $language ?>"  type="text" placeholder="Language Spoken   [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Percular Habit(if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="percularhabit" name="percularhabit"  type="text" value="<?php echo $habit ?>" placeholder="Percular Habit    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Class<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                             <select class="form-control input-sm" id="class" name="class"  required >
                                              
                                              		<option value="<?php echo $class ?>"><?php echo $class ?></option>
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
                                      	<div class="col-lg-2 control-label">Previou School(if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="previousschool" value="<?php echo $previousschool ?>" name="previousschool"  type="text" placeholder="Previous School    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Reason (if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="reason" name="reason" value="<?php echo $reason ?>" type="text" placeholder="Reason For Leaving    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label"> Address <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                             <textarea class="form-control input-sm" id="address" name="address"><?php echo $address ?></textarea>
                                          </div>
                                      </div>
                                     
                                     <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Scholarship <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="scholarship" name="scholarship"  required >
                                              
                                              		<option value="<?php echo $scholarship ?>"><?php echo $scholarship ?></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Batch <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <input class="form-control input-sm" id="batch" name="batch" value="<?php echo $batch ?>" type="text">
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Date of Registration</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="dor" name="dor" value="<?php echo $dor ?>" type="text" readonly />
                                          </div>
                                      </div>
                                      
                                      
                                  </div>
                                  
                                  
                                  <div id="other" class="tab-pane">
                                  
                                  <p></p>
                                  
                                   <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardianname" value="<?php echo $guardianname ?>" name="guardianname"  type="text" placeholder="Guardian Name" required />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Contact <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardiancontact" value="<?php echo $guardiancontact ?>" name="guardiancontact"  type="text" required />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Place of work</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardianwork" value="<?php echo $guardianwork ?>" name="guardianwork"  type="text" placeholder="Place of Work" />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Address <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                             <textarea class="form-control input-sm" id="guardianaddress" name="guardianaddress" required ><?php echo $guardianaddress ?></textarea>
                                          </div>
                                      </div>
                                      
                                  
                                  </div>
                                  
                                  <div id="passport" class="tab-pane">
                                  
                                  <p></p>
                                  
                                   <img id="blah" src="<?php echo $passport; ?>" width="150" height="150" style="border: 3px solid #248038;">
                                   
                                   <input name="file" type="file" onchange="readURL(this);" style="width:85px;">
                                  
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
