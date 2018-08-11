<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$code=$_GET['staffid'];

$query=mysqli_query($con,"select * from staff where staffid='$code'");

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

   <title>Subject Assigned | SkoolMaster</title>

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
            <a href="dashboard.php" class="logo">School<span class="lite">Master</span></a>
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
					<h3 class="page-header"><i class="fa fa-tachometer"></i> Subject Assigned</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-tachometer"></i>Subject Assigned</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <section class="panel-heading">
                               Subject Assigned
                            </section>
                            <div class="panel-body">
                            
                            <!-- patient information-->
                            <div class="row">
                            	<div class="col-lg-12">
                            		<div class="panel">
                                    	<div class="panel-body">
                                        
                                        	<div class="row">
                                            	<!-- patient icon-->
                                                <div class="col-lg-1" style="font-size:80px">
                                                	<span class="icon_profile"></span>
                                                </div>
                                                
                                                <!-- patient details-->
                                                <div class="col-lg-11">
                                                	<div class="row">
                                                    	<div class="col-lg-4">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Staff ID</u> <br>
                                                                    <?php echo $row['staffid'] ?>
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                    
                                                    <div class="row">
                                                    	<div class="col-lg-4">
                                                        	<div class="row" style="margin-top:15px;">
                                                                <div class="col-lg-12 control-label">
                                                                	<u>Staff Name</u> <br>
                                                                    <?php echo $row['lastname'].' '.$row['firstname']?> 
                                                                 </div>    
                                                              </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                    
                                    
                                    	</div>
                                    </div>
                            	</div>
                            </div>
                            <!-- patient information end-->
                           
                            
                       <div class="row">
                   		<div class="col-md-12">
                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-primary ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#general">Subjects Assigned</a>
                                  </li>
                                 
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                              
                                  <div id="general" class="tab-pane active">
                                      
                                     <div class="row" style="margin-top:15px;">
                                     	
                                        <div class="col-md-12">
                                      	
                                        	 <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th>Assigned ID</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Level</th>
                                                <th>Unassign</th>
                                              </tr>
                                            </thead>
                                            
                                            
                 <?php
				
				
				
				$query=mysqli_query($con,"select * from subjectassign where staffid='$code'");
				
				if (mysqli_num_rows($query)<1)
				{
				echo'<div class="alert alert-danger" style="margin-top:10px">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo 'No subject has been assigned to this staff!</div>';
				
				}
				while($row=mysqli_fetch_array($query))
				{
					
				?>
                                            
                                            
                                            
                                            <tbody>
                                              <tr>
                                                <td><?php echo $row['assignedid']; ?></td>
                                                <td><?php echo $row['class']; ?> </td>
                                                <td><?php echo $row['subject']; ?> </td>
                                                <td><?php echo $row['category']; ?> </td>
                                                <td>
                                                 <div class="btn-group">
                                                 <a class="btn btn-danger btn-sm" href='<?php echo "staffassigneddelete.php?assignedid=$row[assignedid]"; ?>' onClick="return confirm('You are about unassigned subject to staff.')" title="Click to unassigned <?php echo $row['subject']; ?> to <?php echo $row['class']; ?>"><i class="icon_close_alt2"></i></a>
                                                  </div>
                                                </td>
                                              </tr>                              
				  <?php 
                  } 
                  ?>
                                            </tbody>
                                          </table>
                                        
                                        
                                        
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
    

  </body>
</html>
