<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
include("continueassessmenttransfer.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

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

    <title>Continue Assessment Report | SkoolMaster</title>

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
	function print_div(div){
	var restorepage = document.body.innerHTML;
	var printDiv = document.getElementById(div).innerHTML;
	
	document.body.innerHTML = printDiv;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
    
    
	<style>
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
					<h3 class="page-header"><i class="icon_documents_alt"></i> Exams Report</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_documents_alt"></i>Continue Assessment Report</li>						  	
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
                              
                            
                      <table width="650" border="0" align="center" style="color:#000;">
 
                          <tr>
                            <td width="149" rowspan="3" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:14pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><img src="<?php echo $schoolrow['logo']; ?>" width="112" height="120"></td>
                            <td width="491" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:16pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><?php echo $schoolrow['schoolname']; ?></td>
                          </tr>
                          <tr>
                            <td height="20" align="center" style="font-family:calibri; font-size:14pt;"><?php echo $schoolrow['address']; ?><br/>
                            <?php echo $schoolrow['location'] ?></td>
                          </tr>
                          <tr>
                            <td align="center" style="font-family:Tahoma; font-size:18px; text-align:center; font-weight:bold;color:#000;">STUDENTS YEARLY CONTINUE ASSESSMENT REPORT</td>
                          </tr>
                          
                        </table>
                        <hr style=" background-color:#000; height:2px;" width="70%" align="center"/>
                        <table width="400" border="0" style="margin-top:30px;color:#000; font-size:14px" align="center">
                        	
                            
                            <tr>
                            	<td style="font-weight:bold">BATCH</td>
                        		<td><?php echo $batch ?></td>
                            </tr>
                            
                            <tr>
                            	<td style="font-weight:bold">CLASS</td>
                                <td><?php echo $class ?></td>
                           	</tr>
                            
                            <tr>
                            	<td style="font-weight:bold">NO. OF TERMS</td>
                        		<td><?php echo $numb; ?></td>
                            </tr>
                            
                        </table>
                        
                        <?php 
						
						$gettotalsubject=mysqli_query($con,"select DISTINCT subject from generalscore");
						$totalsubject=mysqli_num_rows($gettotalsubject);
						
						?>
                        <table width="780" border="1" style="margin-top:30px;color:#000;" align="center">
                        	<tr align="center">
                            	<td rowspan="2" style="font-weight:bold">S/N</td>
                                <td rowspan="2" style="font-weight:bold">Student ID</td>
                                <td rowspan="2" style="font-weight:bold">Student Name</td>
                                <td colspan="<?php echo $totalsubject; ?>" style="font-weight:bold">Subject</td>
                             </tr>
                             <tr>
                             	
                                <?php
								 
                                $h=0;
                                $getsubject=mysqli_query($con,"select DISTINCT subject from generalscore");
                                
                              
                                while($rowsubject=mysqli_fetch_array($getsubject)){
                                $h++;
                                $getsubjectok[$h]=$rowsubject['subject'];
                                ?>
                                
                                <td align="center" style=" font-weight:bold;font-size:12px; color:#000;"><?php echo $getsubjectok[$h]; ?></td>
                                <?php
                                }
                                ?>
                                
                            </tr>
                            
                    
								<?php
								$sn=1; 
                                $s=0;
                                $getstudentid=mysqli_query($con,"select DISTINCT studentid from assessmentaverage order by studentid ASC");
                                
                                while($rowstudentid=mysqli_fetch_array($getstudentid)){
                                $s++;
                                $getstudentidok[$s]=$rowstudentid['studentid'];
                                ?>
                            <tr align="center">
                            	<td><?php echo $sn ?></td>
                        		<td><?php echo $getstudentidok[$s];?></td>
                                <td>
                                <?php
                                 $getstudentname=mysqli_query($con,"select surname,studentname from register where studentid='$getstudentidok[$s]'");
                                
                               	$rowstudentname=mysqli_fetch_array($getstudentname);
                                
                                $firstname=$rowstudentname['studentname'];
								$lastname=$rowstudentname['surname'];
								$fullname=$rowstudentname['surname']." ".$rowstudentname['studentname'];
								echo $fullname;
                                ?>
                                
                                </td>
                                <?php
						
								 $i=0;
								
								 while($i<$h){
								 $i++;
							
								$con_ass_average=mysqli_query($con,"select averagescore from assessmentaverage where studentid='$getstudentidok[$s]' and subject='$getsubjectok[$i]'");
								$contass_avaragescore=mysqli_fetch_array($con_ass_average);
								
								$contass_avaragescore_value=$contass_avaragescore['averagescore'];
								
								?>
								
								
								<td><?php echo $contass_avaragescore_value; ?></td>
								<?php
								 }
							
								?>
							</tr>
								 <?php
								 $sn++;
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
   
  </body>
</html>
