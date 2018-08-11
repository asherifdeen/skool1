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

    <title> Promotion Enquiry | eResult</title>

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
    
    <script type="text/javascript" rel="javascript">
		
	function checkall(check)
  {
    if(document.getElementById('all').checked==true)
    {
      var chkelement=document.getElementsByName(check);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(check);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
  
  
  
  function promote_class(str) {
    if (str == "") {
        document.getElementById("class").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("class").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","promotion.php?q="+str,true);
        xmlhttp.send();
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
            <a href="dashboard.php" class="logo">e<span class="lite">Result</span></a>
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
					<h3 class="page-header"><i class="icon_check"></i> Promotion Enquiry</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Promotion Enquiry</li>						  	
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
                               Promotion Enquiry
                            </section>
                            <div class="panel-body">
                            <form class="form-horizontal" method="post" action="promotionscript.php" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-6">
                                      <button class="btn btn-primary btn-sm" type="submit" name="promote"><span class="icon_folder"></span> Promote</button>
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
                                      <a data-toggle="tab" href="#personal">Promotion Enquiry Detials</a>
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
                                      	<div class="col-lg-4 control-label">Current Class <span style="color:#F00;">*</span></div>
                                        
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm"  name="class" onChange="promote_class(this.value)" >
                                              		
                                                   
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
                                      	<div class="col-lg-4 control-label">Promote To Class <span style="color:#F00;">*</span></div>
                                        <div class="col-lg-4">
                                              <select class="form-control input-sm"  name="promoteto"  required >
                                              		
                                                   
                                              		<option value="">Class</option>
                                              		<?php
													$sql=mysqli_query($con,"select distinct classname from classes");
													while($class=mysqli_fetch_array($sql)){
													?>
													<option value="<?php echo $class['classname'] ?>"><?php echo $class['classname'] ?></option>
													<?php 
													}
													?>
                                                    <option value="Graduate">Graduate</option>
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <!--alert -->
                                      <div class="col-md-12" style="margin-top:5px;">
                                      <?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                       </div>
                                     <!--end alert-->
                                      
                                      <div id="class" style="margin-top:20px;">
         								
                                        
                                        
									  </div>
                                      
                                      <div class="col-md-12">
                                      		<input type="checkbox" name="all" id="all" onClick="return checkall('check[]');">  Check all
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
    
    

  </body>
</html>
