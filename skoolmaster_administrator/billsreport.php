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

    <title>Bills Report | SkoolMaster</title>

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
					<h3 class="page-header"><i class="icon_documents_alt"></i> Bills Report</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_documents_alt"></i>Bills Report</li>						  	
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
						
                           
						   $sql=mysqli_query($con,"select * from bills where term='$academicterm' and academicyear='$academicyear'");

							if(mysqli_num_rows($sql)<1){
	
							echo "<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
								
							
							}
							else
							{
							$i=0;

							$getid=mysqli_query($con,"select DISTINCT studentid from bills where term='$academicterm' and academicyear='$academicyear'");
							
							$i++;
							
							while($foundid=mysqli_fetch_array($getid)){
							
							$idok[$i]=$foundid['studentid'];
								
							//$reportheader=mysqli_query($con,"select * from bills where term='$term' and academicyear='$academicyear' and studentid='$idok[$i]'");
							
							//$row=mysqli_fetch_array($reportheader);
							//$studentid=$row['studentid'];
							
                         ?>     
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
                            <td align="center" style="font-family:Tahoma; font-size:18px; text-align:center; font-weight:bold;color:#000;">STUDENT BILLS </td>
                          </tr>
                          
                        </table>
                        <hr style=" background-color:#000; height:2px;" width="60%" align="center"/>
                        <table width="580" border="0" style="margin-top:20px;color:#000; font-size:14px" align="center">
                        	
                            <tr>
                            	<td width="" style="font-weight:bold">STUDENT NO.</td>
                        		<td width=""><?php echo $idok[$i] ?></td>
                                
                                <td width="" style="font-weight:bold">CLASS</td>
                        		<td width=""><?php 
								
								$studentclass=mysqli_query($con,"select * from register where studentid='$idok[$i]'");
								$class=mysqli_fetch_array($studentclass);
								
								
								echo $class['class'] ?></td>
                                <td style="font-weight:bold">DATE</td>
                                <td><?php echo date('d-M-Y');?></td>
                            </tr>
                            
                            
                            <tr>
                            	<td style="font-weight:bold">STUDENT NAME</td>
                                <td><?php 
								
								$studentname=mysqli_query($con,"select * from register where studentid='$idok[$i]'");
								$name=mysqli_fetch_array($studentname);
								
								
								echo $name['surname']." ".$name['studentname'] ?>
                                </td>
                                
                                <td style="font-weight:bold">TERM</td>
                                <td><?php
								
								$billterm=mysqli_query($con,"select * from bills where term='$academicterm' and academicyear='$academicyear' and studentid='$idok[$i]'");
								$term=mysqli_fetch_array($billterm);
								
								 echo $term['term'] ?>
                                 </td>
                                 <td></td>
                                 <td></td>
                           	</tr>
                            
                            
                            
                        </table>
                        <table width="680" border="0" style="margin-top:10px;color:#000;" align="center">
                        
                        <tr>
                            <td style="font-weight:bold">
                            Dear Parent, Below are the bills for this term.
                            </td>
                        </tr>
                        </table>
                        <table width="680" border="1" style="margin-top:10px;color:#000;" align="center">
                        	
                            <tr>
                            	<td style="font-weight:bold" align="center">S/N</td>
                                <td style="font-weight:bold" align="center">FEE DESCRIPTION</td>
                                <td style="font-weight:bold" align="center">FEE AMOUNT</td>
                                
                            </tr>
                            
                            <?php
							$sn=1;
							

								$sumbills=mysqli_query($con,"select Sum(feeamount) as total from bills where studentid='$idok[$i]' and academicyear='$academicyear' and term='$academicterm'");
								
								$total=mysqli_fetch_array($sumbills);
								$totalbills=$total['total'];
								
								$fees=mysqli_query($con,"select * from bills where studentid='$idok[$i]' and academicyear='$academicyear' and term='$academicterm'");
								while ($row=mysqli_fetch_array($fees)){
								?>
							
                            <tr>
                            	<td align="center"><?php echo $sn; ?></td>
                            	<td align="center"><?php echo $row['feedescription']; ?></td>
                                <td align="center"><?php echo number_format($row['feeamount'],2); ?></td>
                                
                            </tr>
                            <?php 
							$sn++;
							}
							?>
                            <tr style="font-size:11pt; font-weight:bold;">
                            	<td></td>
                                <td align="center">Total Bills</td>
                                <td align="center"><?php echo "GHC".' '. number_format($totalbills,2);?></td>
    						</tr>
                        </table>
                        
                        <table width="600px" border="0" align="center" style="margin-top:30px; border-collapse:collapse">
                          <tr style="text-align:center">
                          <td >Bills Issued By</td>
                          <td width="40%"></td>
                          <td >Signature and Stamp</td>
                          </tr>
                          <tr style="text-align:center" height="50px">
                          <td >
                                <?php 	
                                        echo $staffnname;
                                ?> 
                          </td>
                          <td ></td>
                          <td >.........................</td>
                         
                          </tr>
                       </table><!--end of tab 4 -->
                       
                       <table width="80%" border="0" align="center" style="margin-top:30px; border-collapse:collapse"><!--tab 5 -->
                          <tr style="text-align:center">
                              <td>
                                Thank You For Your Co-operation.
                              </td>
                          </tr>
                          <tr style="text-align:center">
                              <td style="font-size:9px">
                                Software powered by Astral Business Solutions.
                              </td>
                          </tr>
                        </table>
                        
                        <?php
							echo"<p class='break'></p>";
							}
							
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
