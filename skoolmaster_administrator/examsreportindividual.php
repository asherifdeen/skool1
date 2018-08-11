<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");

include("examsresulttransfer.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$academicyear=$_SESSION['trans_academicyear'];
$term=$_SESSION['trans_term'];
$class=$_SESSION['trans_class'];

$stid=$_SESSION['trans_stid'];

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

    <title>Exams Report | eResult</title>

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
						<li><i class="icon_documents_alt"></i>Exams Report</li>						  	
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
                           
						    $countstid=mysqli_query($con,"Select COUNT(DISTINCT studentid) as totalnum from generalscore where academicyear='$academicyear' and class='$class' and term='$term'");

							$total=mysqli_fetch_array($countstid);
							$total_class=$total['totalnum']; 
							
							
							$checkavailability=mysqli_query($con,"select  * from generalscore where academicyear='$academicyear' and class='$class' and term='$term' and studentid='$stid'");

							if(mysqli_num_rows($checkavailability)<1){
	
							$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
							//header("Location: examsreportenquery.php");	
							
							}
							else
							{
	
							
							
							
							
							
							$studentdetails=mysqli_query($con,"Select * from register where studentid='$stid'");
							
							$detailsrow=mysqli_fetch_array($studentdetails);
							$studentname=$detailsrow['surname'].' '.$detailsrow['studentname'];
							$studentgender=$detailsrow['gender'];
							$studentpassport=$detailsrow['passport'];

							
                              
                         ?>     
                       <table width="650" border="0" align="center" style="color:#000;">
 
                          <tr>
                            <td width="106" rowspan="3" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:14pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><img src="<?php echo $schoolrow['logo']; ?>" width="112" height="120"></td>
                            <td width="369" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:16pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><?php echo $schoolrow['schoolname']; ?></td>
                            <td width="142" rowspan="3" align="center" style="font-family:Tahoma, Geneva, sans-serif; font-size:16pt; color:#000; font-weight:bolder; font-stretch:expanded; text-align:center;"><img style="border-style: solid; border:dotted;" src="<?php echo $studentpassport ?>" width="120" height="110"></td>
                          </tr>
                          <tr>
                            <td height="20" align="center" style="font-family:calibri; font-size:14pt;"><?php echo $schoolrow['address']; ?><br/>
                            <?php echo $schoolrow['location'] ?></td>
                          </tr>
                          <tr>
                            <td align="center" style="font-family:Tahoma; font-size:18px; text-align:center; font-weight:bold;color:#000;">STUDENT TERMLY REPORT</td>
                          </tr>
                          
                        </table>
                        <hr style=" background-color:#000; height:2px;" width="70%" align="center"/>
                        <table width="780" border="0" style="margin-top:30px;color:#000; font-size:14px" align="center">
                        	<tr>
                            	<td width="13%" style="font-weight:bold">Student ID</td>
                        		<td width="25%"><?php echo $stid ?></td>
                                <td width="16%" style="font-weight:bold">Term</td>
                                <td width="16%"><?php echo $term ?></td>
                                <td width="19%" style="font-weight:bold">Sex</td>
                                <td width="11%"><?php echo $studentgender ?></td>
                            </tr>
                            
                            <tr>
                            	<td style="font-weight:bold">Name</td>
                        		<td><?php echo $studentname ?></td>
                                <td style="font-weight:bold">Academic Year</td>
                        		<td><?php echo $academicyear ?></td>
                                <td style="font-weight:bold">Average Score</td>
                                <td>
                                	<?php 
										$getavgscore=mysqli_query($con,"select averagescore from classaverage where studentid='$stid'");
										$avg=mysqli_fetch_array($getavgscore);
										$avg_value=$avg['averagescore']; 
										echo $avg_value;
									?>
                                
                                </td>
                            </tr>
                            
                            <tr>
                            	<td style="font-weight:bold">Class</td>
                                <td><?php echo $class ?></td>
                            	<td style="font-weight:bold">No. On Roll</td>
                                <td><?php echo $total_class ?></td>
                        		<td style="font-weight:bold">Position In Class</td>
                        		<td>
                                	<?php 
										$getclasspos=mysqli_query($con,"select position from classposition where studentid='$stid'");
										$classpos=mysqli_fetch_array($getclasspos);
										$classpos_value=$classpos['position']; 
										echo $classpos_value;
									?>
                                
                                </td>
                            </tr>
                            
                            <tr>
                            	<td style="font-weight:bold" colspan="2">Next Term Begin</td>
                        		
                               
                                <td>
                                
                                <?php 
									$getnextterm=mysqli_query($con,"select nexttermbegin from term");
									$nextterm=mysqli_fetch_array($getnextterm);
									$nexttermdate_value=$nextterm['nexttermbegin']; 
									echo $nexttermdate_value;
								?>
                                
                                </td>
                                <td style="font-weight:bold" colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            
                        </table>
                        
                        <table width="780" border="1" style="margin-top:30px;color:#000;" align="center">
                        	<tr>
                            	<td width="184" rowspan="2" align="center"  style="font-weight: bold;font-size:14px; color: #000;">SUBJECTS</td>
                                <td width="79" align="center" style=" font-weight:bold;font-size:12px; color:#000;">CLASS SCORE </td>
                                <td width="69" align="center" style=" font-weight:bold;font-size:12px; color:#000;">EXAMS SCORE</td>
                                <td width="56" align="center" style=" font-weight:bold;font-size:12px; color:#000;">TOTAL SCORE </td>
                               
                                <td width="64" rowspan="2" align="center" style=" font-weight:bold;font-size:12px; color:#000;">POSITION</td>
                                <td width="37" rowspan="2" align="center" style=" font-weight:bold;font-size:12px; color:#000;">REMARK</td>
                                <td width="38" rowspan="2" align="center" style=" font-weight:bold;font-size:12px; color:#000;">SUBJECT TEACHER'S INITIALS</td>
                        	</tr>
                        	<tr>
                        	  <td align="center" style=" font-weight:bold;font-size:12px; color:#000;">40%</td>
                        	  <td width="69" align="center" style=" font-weight:bold;font-size:12px; color:#000;"> 60%</td>
                        	  <td width="56" align="center" style=" font-weight:bold;font-size:12px; color:#000;">100%</td>
               	          </tr>
                           
                            
                            <tr align="center">
                               <td width="184" align="center" height="25"  style="font-weight: bold;font-size:14px; color: #000;" colspan="8"></td>
                              
                          </tr>
                           <?php
 								$core=mysqli_query($con,"select subject,totalscore from generalscore where studentid='$stid' and academicyear='$academicyear' and class='$class' and term='$term' and category like'JH%' order by subject ASC");
 								while($corerows=mysqli_fetch_array($core)){
									$corefinalscore=$corerows['totalscore'];
									
									include("core_grade_remark.php");
  							?>
                            <tr align="center">
                            	<td><?php echo $corerows['subject'] ?></td>
                            	<td>
									<?php 
										$core40=mysqli_query($con,"select score from assessment where studentid='$stid' and academicyear='$academicyear' and class='$class' and term='$term' and subject='$corerows[subject]'");
										$core40value=mysqli_fetch_array($core40);
										$assessmentscore=$core40value['score'];
										echo round($assessmentscore*0.4);
									?>
                                </td>
                                <td>
                                	<?php 
										$core60=mysqli_query($con,"select score from exams where studentid='$stid' and academicyear='$academicyear' and class='$class' and term='$term' and subject='$corerows[subject]'");
										$core60value=mysqli_fetch_array($core60);
										$examsscore=$core60value['score'];
										echo round($examsscore*0.6);
									?>
                                </td>
                                <td><?php echo $corerows['totalscore'] ?></td>
                                <td><?php
                                		
										$post=mysqli_query($con,"select position from subjectposition where studentid='$stid' and subject='$corerows[subject]'");
										$post_value=mysqli_fetch_array($post);
										$examspost=$post_value['position'];
										echo $examspost;
										
                                	?>
                                 </td>
                                <td><?php echo $coreremark ?></td>
                                <td>
                                <?php
                                		
										$staffid=mysqli_query($con,"select staffid from subjectassign where class='$class' and subject='$corerows[subject]'");
										$staffid_value=mysqli_fetch_array($staffid);
										$staff=$staffid_value['staffid'];
										
										$initial=mysqli_query($con,"select initial from staff where staffid='$staff'");
										$initial_value=mysqli_fetch_array($initial);
										$initials=$initial_value['initial'];
										echo $initials;
										
                                	?>
                                	
                                </td>
                                
                            </tr>
                            
                            <?php 
								}
							?>
                            
                        </table>
                        
                        <table width="780" border="0" style="margin-top:30px;color:#000; font-size:14px" align="center">
                        	<tr>
                            	<td width="15%" height="33" style="font-weight:bold">Attendance</td>
                                <td width="14%" style="font-weight:bold">&nbsp;</td>
                                <td width="10%" style="font-weight:bold">Out Of</td>
                                <td width="16%" style="font-weight:bold">&nbsp;</td>
                                <td width="15%" style="font-weight:bold">Promoted To</td>
                                <td width="30%" style="font-weight:bold">.......................................................</td>
                            </tr>
                            <tr>
                            	<td height="35" colspan="6" style="font-weight:bold">Student Conduct: .................................................................................................................................................................</td>
                            </tr>
                            <tr>
                            	<td height="40" colspan="6" style="font-weight:bold">Student Interest: ..................................................................................................................................................................</td>
                            </tr>
                            <tr>
                            	<td height="40" colspan="6" style="font-weight:bold">Class Teacher's Remark: .....................................................................................................................................................</td>
                            </tr>
                            <tr>
                            	<td height="40" colspan="6" style="font-weight:bold">Student Attitude: ..................................................................................................................................................................</td>
                            </tr>
                        	<tr>
                            	<td height="39" colspan="6" style="font-weight:bold">Head Teacher's Signature: ..................................................................................................................................................</td>
                            </tr>
                        
                        </table>
                   		<p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        
                        <?php
                        
							}
							
							?>
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
