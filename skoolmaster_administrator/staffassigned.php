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

    <title>Staff Assigned | SkoolMaster</title>

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
	  "columnDefs": [ { "orderable": false, "targets": 5 } ]
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
					<h3 class="page-header"><i class="icon_genius"></i> Staff Assigned</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_genius"></i>Staff Assigned</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              	<div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               Staff Assigned
                            </section>
                            <div class="panel-body">
              
								
                                <div class="row" style="margin-bottom:20px;">
                                	<div class="col-md-12">
                                    <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary btn-sm"><i class="icon_plus_alt2"></i> Add New Assign</a>
                                  
                                	</div>
                                </div>
                                
                                <?php 
								echo $_SESSION['result'];
								unset ($_SESSION['result']);
								 ?>
                            
                            	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>Subject</th>
                                        <th>Level</th>
                                        <th>Class</th>
                                        <th>Unassign</th>
                                      </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php
                                    $query=mysqli_query($con,"select * from subjectassign");
				
									if (mysqli_num_rows($query)<1)
									{
									echo'<div class="alert alert-danger" style="margin-top:10px">';
									echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
									echo 'No Staff has been assigned to class or subject!</div>';
									}
									while($row=mysqli_fetch_array($query))
									{
										
									?>
                                       <tr>
                                                 <td><?php echo $row['staffid']; $getstaffid=$row['staffid'];?> </td>
                                                 
                                                 <td>
												 <?php
												
												 $staffnamequery=mysqli_query($con,"select lastname,firstname from staff where staffid='$getstaffid'");
												$staffrow=mysqli_fetch_array($staffnamequery);
												 echo $staffrow['lastname'].' '.$staffrow['firstname'];
												  
												  ?>
                                                 </td>
                                                 
                                                <td><?php echo $row['subject']; ?> </td>
                                                <td><?php echo $row['category']; ?> </td>
                                                <td><?php echo $row['class']; ?> </td>
                                                <td>
                                                 <div class="btn-group">
                                                      
                                                      <a class="btn btn-danger btn-sm" href='<?php echo "staffassigneddelete.php?assignedid=$row[assignedid]"; ?>' onClick="return confirm('You are about unassigned subject to staff.')" title="Click to unassign <?php echo $staffrow['lastname']." " .$staffrow['firstname']; ?> to <?php echo $row['class']; ?>"><i class="icon_close_alt2"></i></a>
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
           
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
  
  
   <!------- Add New Department Modal Start------> 
               
               <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      
                          <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Assign Staff</h4>
                          </div>
                          
                          <form class="form-horizontal" role="form"  action="staffassignedscript.php" method="post">
                          <div class="modal-body">
  							
                            
                              <div class="row" style="margin-top:5px;">
                    			<label class="col-lg-4 control-label">Required fields = <span style="color:#F00;">*</span></label>
                
                  			  </div>
                    
            				  <div class="row" style="margin-top:5px;">
                                  <label class="col-lg-3 control-label">Assigned ID</label>
                                  <div class="col-lg-4">
                                      <input type="text" class="form-control input-sm" id="staffid" placeholder="" value="<?php echo "$rnd_id"; ?>" name="assignedid" readonly>
                                  </div>
                              </div> 
                              
                              <div class="row" style="margin-top:5px;">
                                  <label class="col-lg-3 control-label">Staff ID</label>
                                  <div class="col-lg-4">
                                      <input type="text" class="form-control input-sm" id="staffid" placeholder=""  name="staffid">
                                  </div>
                              </div> 
                                    
                               <div class="row" style="margin-top:5px;">
                                  <label class="col-lg-3 control-label">Subject</label>
                                  <div class="col-lg-6">
                                      <select class="form-control input-sm" id="subject" name="subject"required>
                                      		<option value="">Subject</option>
                                            <?php
											$sql=mysqli_query($con,"select distinct subjecttitle from subjects");
											while($subjecttitle=mysqli_fetch_array($sql)){
											?>
											<option value="<?php echo $subjecttitle['subjecttitle'] ?>"><?php echo $subjecttitle['subjecttitle'] ?></option>
											<?php 
											}
											?>
                                            <option value="All Subjects">All Subjects</option>
                                      </select>
                                  </div>
                              </div> 
                              
                              <div class="row" style="margin-top:5px;">
                                  <label class="col-lg-3 control-label">Level</label>
                                  <div class="col-lg-6">
                                      <select class="form-control input-sm" id="category" name="category"  required >
                                                <option value="">Level</option>
                                                <option value="Primary">Primary</option>
                                                <option value="JHS">JHS</option>
                                          
                                      </select>
                                  </div>
                              </div>     
                                                                            
                              <div class="row" style="margin-top:5px;">
                                  <label class="col-lg-3 control-label">Class</label>
                                  <div class="col-lg-6">
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
                             
                            
  							</div><!-- /Modal-body -->
                            
                             <div class="modal-footer">
                           <div class="form-group">
                          	<div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary btn-sm" name="update">Assign</button>
                              <button type="button" class="btn btn-danger btn-sm" name="cancel" data-dismiss="modal" aria-hidden="true">Cancel</button>
                          	</div>
                           </div>
                          </div>
             			 </form>
                </div>
                </div>
                </div>
                
               <!------- Edit Department Modal End------>
  
  
    

  </body>
</html>
