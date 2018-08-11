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

    <title>Statistics | SkoolMaster</title>

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
					<h3 class="page-header"><i class="icon_profile"></i> Statistics</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_profile"></i>Statistics</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              	<div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               Statistics
                            </section>
                            <div class="panel-body">
              
								
                                <div class="row" style="margin-bottom:20px;">
                                	<div class="col-md-12">
                                    <button  class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
                                  
                                	</div>
                                </div>
                                
                                <?php 
								echo $_SESSION['result'];
								unset ($_SESSION['result']);
								 ?>
                            
                            	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">Class</th>
                                    		<th style="text-align:center">Number of Male</th>
                                    		<th style="text-align:center">Number of Female</th>
                                    		<th style="text-align:center">Total Class</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
										<?php
                                        $query=mysqli_query($con,"select distinct classname from classes order by classid ASc");
                                        $total=mysqli_num_rows($query);
                                        for($i=0;$i<=$total;$i++){
                                        while($row=mysqli_fetch_array($query)){
                                            $class=$row['classname'];
                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $class ?></td>
                                                <td>
                                                <?php 
                                                $query_male=mysqli_query($con,"select * from register where gender='Male' and class='$class'");
                                                $num_of_male=mysqli_num_rows($query_male);
                                                if($num_of_male<1){
                                                echo 0;
                                                }else
                                                {
                                                echo $num_of_male;  
                                                }  
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                $query_female=mysqli_query($con,"select * from register where gender='Female' and class='$class'");
                                                $num_of_female=mysqli_num_rows($query_female);
                                                if ($num_of_female<1){
                                                    echo 0;
                                                }else
                                                {
                                                echo $num_of_female;  
                                                }  
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                $query_class=mysqli_query($con,"select * from register where class='$class'");
                                                $num_of_class=mysqli_num_rows($query_class);
                                                if ($num_of_class<1){
                                                    echo 0;
                                                }else
                                                {
                                                echo $num_of_class;  
                                                }  
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        }
                                            ?>
                                            <tr>
                                                <td style="font-weight:bold">Total</td>
                                                <td style="font-weight:bold">
                                                <?php 
                                                $query_all_male=mysqli_query($con,"select * from register where gender='Male'");
                                                $num_of_all_male=mysqli_num_rows($query_all_male);
                                                if($num_of_all_male<1){
                                                echo 0;
                                                }else
                                                {
                                                echo $num_of_all_male;  
                                                }  
                                                ?>
                                                </td>
                                                <td style="font-weight:bold">
                                                <?php
                                                $query_all_female=mysqli_query($con,"select * from register where gender='Female'");
                                                $num_of_all_female=mysqli_num_rows($query_all_female);
                                                if ($num_of_all_female<1){
                                                    echo 0;
                                                }else
                                                {
                                                echo $num_of_all_female;  
                                                }  
                                                ?>
                                                </td>
                                                <td style="font-weight:bold">
                                                <?php
                                                $queryallstudent=mysqli_query($con,"select * from register");
                                                $num_of_students=mysqli_num_rows($queryallstudent); 
                                                if ($num_of_students<1){
                                                    echo 0;
                                                }else
                                                {
                                                echo $num_of_students;  
                                                }    
                                                ?>
                                                </td>
                                            </tr>
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
  
  
   
  
  
    

  </body>
</html>
