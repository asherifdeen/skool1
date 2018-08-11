<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$schoolcode=mysqli_query($con,"select * from school");
$schoolcoderow=mysqli_fetch_array($schoolcode);
$codevalue=$schoolcoderow['schoolcode'];


$getstudentid=mysqli_query($con,"select studentid from register ORDER BY studentid DESC
LIMIT 1");
$getstudentidrow=mysqli_fetch_array($getstudentid);
$studentidvalue=$getstudentidrow['studentid'];

$checkstudent=mysqli_query($con,"select * from register");

if (mysqli_num_rows($checkstudent)<1){

$year=date("y");

$studentid=$codevalue.$year."0001";
}
else
{
$year=date("y");
$codecheck=substr($studentidvalue,-4);
$code=$codecheck + 1;

$codelength=strlen($code);
function zeros($length){
	switch($length){
	case 1: return '000';
	case 2: return '00';
	case 3: return '0';
	case 4: return '';

	}
	return $length;
	}

$studentid=$codevalue.$year.zeros($codelength).$code;

}




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

    <title>Registration | SkoolMaster</title>

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
					<h3 class="page-header"><i class="icon_document_alt"></i> Registration</h3>
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
                               Student Registration
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="registrationscript.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-2">
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
                                      <a data-toggle="tab" href="#personal">Personal Information</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#other">Guardian Information</a>
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
                                              <input class="form-control input-sm" id="studentid" name="studentid"  type="text" value="<?php echo $studentid; ?>" readonly/>
                                          </div>
                                      </div>
                                      
                                     
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Last Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="lastname" name="lastname"  type="text" placeholder="Last Name" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">First Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="firstname" name="firstname"  type="text" placeholder="First Name" required />
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Gender <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="gender" name="gender"  required >
                                              
                                              		<option value="">Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                              
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Date of Birth <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="date" name="date"  type="text" placeholder="Date of Birth" required/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Place of Birth</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="birthplace" name="birthplace"  type="text"placeholder="Place of Birth  [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Religion <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="religion" name="religion"  required >
                                              
                                              		<option value="">Religion</option>
                                                    <option value="Christain">Christain</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Others">Others</option>
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Language Spoken</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="language" name="language"  type="text" placeholder="Language Spoken   [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Perculiar Habit(if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="percularhabit" name="percularhabit"  type="text" placeholder="Percular Habit    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Class<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
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
                                      	<div class="col-lg-2 control-label">Previous School(if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="previousschool" name="previousschool"  type="text" placeholder="Previous School    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Reason (if any)</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="reason" name="reason"  type="text" placeholder="Reason For Leaving    [Optional]"/>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label"> Address <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                             <textarea class="form-control input-sm" id="address" name="address"></textarea>
                                          </div>
                                      </div>
                                     
                                     <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Scholarship <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <select class="form-control input-sm" id="scholarship" name="scholarship"  required >
                                              
                                              		<option value="">Status</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                              
                                              </select>
                                          </div>
                                      </div>
                                     
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Passport Picture<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input type="file" name="file"><i class="fa fa-upload"> Upload Image...</i>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Batch<span style="color:#F00;">*</span></div>
                                        <div class="col-lg-2">
                                              <input class="form-control input-sm" id="batch" name="batch" placeholder="2016/2017" required>
                                          </div>
                                      </div>
                                    
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Date of Registration</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="dor" name="dor" value="<?php echo date("d-M-Y"); ?>" type="text" readonly />
                                          </div>
                                      </div>
                                      
                                      
                                  </div>
                                  
                                  
                                  <div id="other" class="tab-pane">
                                  
                                  <p></p>
                                  
                                   <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Name <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardianname" name="guardianname"  type="text" placeholder="Guardian Name" required />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Contact <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardiancontact" name="guardiancontact"  type="text" required />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Place of work</div>
                                        <div class="col-lg-3">
                                              <input class="form-control input-sm" id="guardianwork" name="guardianwork"  type="text" placeholder="Place of Work" />
                                          </div>
                                      </div>
                                      
                                       <div class="row" style="margin-top:5px;">
                                      	<div class="col-lg-2 control-label">Guardian Address <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-3">
                                             <textarea class="form-control input-sm" id="guardianaddress" name="guardianaddress" required ></textarea>
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
