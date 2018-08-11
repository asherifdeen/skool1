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

    <title>Daily Payment Report | SkoolMaster</title>

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
					<h3 class="page-header"><i class="icon_documents_alt"></i> Daily Payment Report</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_documents_alt"></i>Daily Payment Report</li>						  	
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
                            <td align="center" style="font-family:Tahoma; font-size:18px; text-align:center; font-weight:bold;color:#000;">DAILY PAYMENT REPORT AS AT <?php echo $_SESSION['paymentdate'] ?> </td>
                          </tr>
                          
                        </table>
                        <hr style=" background-color:#000; height:2px;" width="60%" align="center"/>
                        
                        
                        <?php

							$paymentdate=$_SESSION['paymentdate'];
							
							$query=mysqli_query($con,"SELECT * from payment where paymentdate='$paymentdate'");
							
							$sum_query=mysqli_query($con,"select sum(feeamount) as total from payment where paymentdate='$paymentdate'");
							
							$sum=mysqli_fetch_array($sum_query);
							$totalvalue=$sum['total'];
							
							if(mysqli_num_rows($query)<1)
							{
								$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> There is no matching records.</div>";
								header("Location: paymentreportenquery.php");
						
							}
							
						?>
							
                            <table width="40%" class="table table-striped table-bordered" cellspacing="0" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">S/N</th>
                                        <th style="text-align:center">Admission No.</th>
                                        <th style="text-align:center">Student Name</th>
                                        <th style="text-align:center">Amount</th>
                                    </tr>
                                </thead>
                               
                                <tbody>	
                                <?php
									$sn=0;
									while($row=mysqli_fetch_array($query)){
										$sn++;
										$studentid=$row['studentid'];
										$studentname=$row['studentname'];
										$amount=$row['feemount'];
								
								?>		
                        			<tr>
                                        <td><?php echo $sn;?></td>
                                        <td><?php echo $row['studentid'];?></td>
                                        <td>
											<?php 
											$getstudent=mysqli_query($con,"select * from register where studentid='$studentid'");
											$student=mysqli_fetch_array($getstudent);
											
											echo $student['surname']." ".$student['studentname'];
											
											?>
                                        
                                        </td>
                                        <td><?php echo $row['feeamount'];?></td>
                        
                        			</tr>
                                    
                        		<?php
									}
									?>
                                    <tr>
                                    	<td colspan="3" align="center">Total</td>
        								<td><?php echo "GHC".' '. number_format($totalvalue,2);?></td>
                                    </tr>
                        	</tbody>
                            
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
