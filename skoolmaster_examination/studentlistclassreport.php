<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$academicyear=$_SESSION['academicyear'];
$academicterm=$_SESSION['academicterm'];

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
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Student List Report | SkoolMaster</title>

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
    
    <script>
	function print_div(div){
	var restorepage = document.body.innerHTML;
	var printDiv = document.getElementById(div).innerHTML;
	
	document.body.innerHTML = printDiv;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
    
    
	<style>
    body{
        padding:0;
    margin:0;}
    
    @media print{
    .break{ page-break-after:always;}
    }
    
    </style>
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
					<h3 class="page-header"><i class="icon_documents_alt"></i> Student List Report</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_documents_alt"></i>Student List Report</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              
              		<div class="row" style="margin-bottom:15px; margin-left:10px;"> 
                        <div class="form-group">
                          <div class="col-lg-6">
                              <button onClick="print_div('printable_area')" class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Print Report</button>
                              <a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                          </div>
                      </div> 
                    </div>
                    
              		<div class="row">
                    	<div class="col-lg-12">
                        	<div class="panel">
                           	  <div id="printable_area" class="panel-body">
                              
                        <?php      
						
                           
						   $sql=mysqli_query($con,"select * from register");

							if(mysqli_num_rows($sql)<1){
	
							echo "<div class='alert alert-danger'><strong>Sorry!</strong> No student found.</div>";
								
							
							}
							
							
							
                         ?>     
                      <table width="650" border="0" align="center" style="color:#000;">
 
                          <tr>
                                            <td width="149" rowspan="3" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:14pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><img src="../schoolmaster_administrator/<?php echo $schoolrow['logo']; ?>" width="112" height="120"></td>
                                            <td width="491" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:16pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><?php echo $schoolrow['schoolname']; ?></td>
                                          </tr>
                                          <tr>
                                            <td height="20" align="center" style="font-family:calibri; font-size:14pt;"><?php echo $schoolrow['address']; ?><br/>
                                            <?php echo $schoolrow['location'] ?></td>
                                          </tr>
                          <tr>
                            <td align="center" style="font-family:Tahoma; font-size:18px; text-align:center; font-weight:bold;color:#000;">STUDENTS LIST BY CLASS</td>
                          </tr>
                          
                        </table>
                        <hr style=" background-color:#000; height:2px;" width="60%" align="center"/>
                        
                        <table class="table table-striped table-bordered" cellspacing="0">
                        	<?php 
								$class=$_POST['class'];
								$query=mysqli_query($con,"select * from register where class='$class'");
								if(mysqli_num_rows($query)<1){
	
							echo "<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
								
							
							}
							
							?>
                             <thead>
                                <tr>
                                	<th>S/N</th>
                                    <th>Admission No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                </tr>
                            </thead>
                        	<?php
								$sn=0;
                            	while($row=mysqli_fetch_array($query))
									{
										$sn++;
							?>
                             <tr>
                             	<td><?php echo $sn; ?></td>
                                <td><?php echo $row['studentid']; ?></td>
                                <td><?php echo $row['surname'];?></td>
                                <td><?php echo $row['studentname'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['class'];?></td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                        </table>
                       
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


  </body>
</html>
