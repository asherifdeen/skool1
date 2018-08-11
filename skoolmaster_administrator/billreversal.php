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
    <link rel="shortcut icon" href="../resources/img/favicon.png">

    <title>Bill Reversal | SkoolMaster</title>

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
	  "columnDefs": [ { "orderable": false, "targets": 0 } ]
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
					<h3 class="page-header"><i class="fa fa-reply"></i> Bill Reversal</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-reply"></i>Bill Reversal</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              	<div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                              Bill Reversal
                            </section>
                            <div class="panel-body">
              					
                                
                                <div class="row" style="margin-bottom:20px;">
                                	<div class="col-md-12">
                                    	
                                        <!--tab nav start-->
                                      <section class="panel">
                                          <header class="panel-heading tab-bg-primary ">
                                              <ul class="nav nav-tabs">
                                                  <li class="active">
                                                      <a data-toggle="tab" href="#personal">Bill Information</a>
                                                  </li>
                                                  
                                              </ul>
                                          </header>
                                          <div class="panel-body">
                                              <div class="tab-content">
                                              
                                                <div id="personal" class="tab-pane active">
                                        
                                        		<div class="row" style="margin-top:15px">
                                                    <div class="form-inline" >
                                                        <form action="" method="post">
                                                        <div class="col-lg-2">
                                                          <select class="form-control input-sm" id="feedescription" name="feedescription">
                                                          
                                                                <option value="">Fee Description</option>
                                                                 <?php
                                                                $sql=mysqli_query($con,"select distinct feedescription from fees");
                                                                while($feedescription=mysqli_fetch_array($sql)){
                                                                ?>
                                                                <option value="<?php echo $feedescription['feedescription'] ?>"><?php echo $feedescription['feedescription'] ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                          
                                                          </select>
                                                        </div>
                                                        <div class="col-lg-2">
                                                        	<select class="form-control input-sm" id="term" name="term">
                                                            	<option value="">Select Term</option>
                                                            	<option value="First Term">First Term</option>
                                                                <option value="Second Term">Second Term</option>
                                                                <option value="Third Term">Third Term</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-lg-2">
                                                        	<input type="text" class="form-control input-sm" id="academicyear" name="academicyear" placeholder="Academic Year">
                                                        </div>
                                                        
                                                        <div class="col-lg-2">
                                                        	<select class="form-control input-sm" id="class" name="class">
                                                          
                                                                <option value="">Select Class</option>
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
                                                        
                                                        <div class="col-lg-2">
                                                        	<button class="btn btn-primary btn-sm" type="" name="search"><span class="fa fa-search"></span> Search</button>
                                                            
                                                        </div>
                                                        
                                                    </div><!-- form inline end-->
                                                    </form>
                                        </div><!-- end row-->
                                        
                                        <div class="row" style="margin-top:20px;">
                                            <div class="container" id="reversal">
                                            		<?php 
													echo $_SESSION['result'];
													unset ($_SESSION['result']);
													 ?>
                                           		<form action="billreversalscript.php" method="post">
                                                    
                                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr> 
                                                            	<th>#Check</th>
                                                                <th>Admission No.</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Class</th>
                                                                <th>Fee Description</th>
                                                                <th>Term</th>
                                                                <th>Academic Year</th>
                                                                <th>Fee Amount</th>
                                                                
                                                               
                                                            </tr>
                                                        </thead>
                                                       
                                                        <tbody>
                                                        <?php
													
														if (isset($_POST['search']))
														{
														$feedescription=$_POST['feedescription'];
														$term=$_POST['term'];
														$academicyear=$_POST['academicyear'];
														$class=$_POST['class'];
														
														$_SESSION['reversalfeedescription']=$_POST['feedescription'];
														$_SESSION['reversalterm']=$_POST['term'];
														$_SESSION['reversalacademicyear']=$_POST['academicyear'];
														
														$query=mysqli_query($con,"select * from bills where feedescription='$feedescription' and term='$term' and academicyear='$academicyear' ");
													
														if (mysqli_num_rows($query)<1)
														{
														echo "<div class='alert alert-danger'><strong>Sorry!</strong> There is no match records</div>";
														}
                                                        while($row=mysqli_fetch_array($query))
                                                        {
                                                           $billid=$row['billid'];
                                                        ?>
                                                            <tr>
                                                            	<?php echo       		"<td><input name='check[]' type='checkbox' id='check' value='$billid'></td>" ?>
                                                            	<td><?php echo $row['studentid'];?></td>
                                                                <td>
																	<?php 
																	
																	$firstname=mysqli_query($con,"select surname from register where studentid='$row[studentid]'");
																	$firstnameval=mysqli_fetch_array($firstname);
																	echo $firstnameval['surname'];

																	
																	?>
                                                                </td>
                                                                <td>
																	<?php 
																
																	$lastname=mysqli_query($con,"select studentname from register where studentid='$row[studentid]'");
																	$lastnameval=mysqli_fetch_array($lastname);
																	echo $lastnameval['studentname'];

																	?>
                                                                </td>
                                                                <td>
																	<?php 
																	$class=mysqli_query($con,"select class from register where studentid='$row[studentid]'");
																	$classval=mysqli_fetch_array($class);
																	echo $classval['class'];

																
																	?>
                                                                </td>
                                                                <td><?php echo $row['feedescription'];?></td>
                                                                <td><?php echo $row['term'];?></td>
                                                                <td><?php echo $row['academicyear'];?></td>
                                                                <td><?php echo $row['feeamount']; $_SESSION['reversalfeeamount']=$row['feeamount'];?></td>
                                                                
                                                                
                                                            </tr>
                                                        <?php
                                                        }
														}
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                        <input type="checkbox" name="all" id="all" onClick="return checkall('check[]');">  Check all
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row" style="margin-top:30px">
                                                       <div class="form-group">
                                                          <div class="col-lg-3">
                                                              <button class="btn btn-primary btn-sm" name="reverse" type="submit"><span class="fa fa-reply"></span> Reverse Bill</button>
                                                              <a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                                                          </div>
                                                      </div> 
                                                  </div>
                                                  
													</form>						
                                            </div>
                                            
                                        </div><!--end row-->
                                        
                                        
                                     </div>
                                    </div>
                                  </div>
                                  </section>
                                  
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
