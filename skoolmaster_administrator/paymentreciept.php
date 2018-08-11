<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
include("../systemfiles/convert.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];
$recieptnumber=$_POST['receiptnumber'];

$recieptquery=mysqli_query($con,"select * from payment where recieptnumber='$recieptnumber'");
$rowreciept=mysqli_fetch_array($recieptquery);


$studentid=$rowreciept['studentid'];
$paymentamount=$rowreciept['feeamount'];
$paymenttype=$rowreciept['description'];
$class=$rowreciept['class'];
$term=$rowreciept['term'];
$paymentdate=$rowreciept['payterm'];


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
    <link rel="shortcut icon" href="../resources/img/favicon.png">

    <title>Payment Reciept | SkoolMaster</title>

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
    
    
   
    
    <link href="../resources/datepicker/jquery-ui/jquery-ui.css" rel="stylesheet">
	

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
					<h3 class="page-header"><i class="icon_document_alt"></i> Payment Reciept</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Payment Reciept</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <section class="panel-heading">
                               Payment Reciept
                            </section>
                            <div class="panel-body">
                            
                            <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
 								<div class="form-group">
                                  <div class="col-lg-3">
                                      <button onClick="print_div('printable_area')" class="btn btn-primary btn-sm" type="submit"><span class="icon_folder"></span> Print Reciept</button>
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
                                      <a data-toggle="tab" href="#personal">Personal Information</a>
                                  </li>
                                  
                               
                              </ul>
                          </header>
                          <div class="panel-body" id="printable_area">
                              <div class="tab-content">
                              
                                  <div id="personal" class="tab-pane active">
                                      
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
                                            <td align="center" style="font-family:Tahoma; font-size:16px; text-align:center; font-weight:bold;color:#000;">FEE PAYMENT RECEIPT  </td>
                                          </tr>
                                          
                                        </table>
                                   
                                      <table width="500" height="150" border="0" align="center" style="margin-top:10px; border-collapse:collapse">					
                                      		<tr>
                                            	<td style="font-weight:bolder">Class:</td>
                                            	<td><?php echo $class;  ?></td>
                                                <td width="100" style="font-weight:bolder">Receipt No.</td>
                                                <td><?php echo $recieptnumber;?></td>
                                                
                                            </tr>
                                      		<tr>
                                            	<td style="font-weight:bolder">Term:</td>
                                            	<td><?php echo $term;  ?></td>
                                                <td style="font-weight:bolder">Issued Date:</td>
                                                <td><?php echo date('d-M-Y') ?></td>
                                                
                                            </tr>
                                            <tr>
                                            	<td width="60" style="font-weight:bolder">Student No:</td>
                                                <td  colspan="3" ><?php echo $studentid; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="143" style="font-weight:bolder">Received from:</td>
                                                <td width="167" colspan="3">
                                                    <?php
                                                    
													
                                                    $studentquery=mysqli_query($con,"SELECT surname,studentname from register where studentid='$studentid'");
                                                    $student=mysqli_fetch_array($studentquery);
                                                    $studentlastname=$student['surname'];
                                                    $studentfirstname=$student['studentname'];
                                                    echo $studentlastname .' ' .$studentfirstname;
                                                    
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">The Sum of:</td>
                                                <td colspan="3"><?php echo numtowords($paymentamount) //convert_number_to_words($paymentamount); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">Being Payment of:</td>
                                                <td colspan="3"><?php echo $paymenttype; ?> payment of school fees</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">Amount in Figures:</td>
                                                <td colspan="3"> Gh¢ <?php echo $paymentamount; ?></td>
                                            </tr>
                                        </table>
                                        
                                        <table width="488" border="0" align="center" style="margin-top:10px; border-collapse:collapse"><!--tab 5 -->
                                          <tr style="text-align:center">
                                          <td >Receipt Issued By</td>
                                          <td width="40%"></td>
                                          <td >Signature and Stamp</td>
                                          </tr>
                                          <tr style="text-align:center" height="40px">
                                          <td ><?php 	
                                                   
                                                    echo $staffnname;
                                                ?> 
                                          </td>
                                          <td ></td>
                                          <td >.........................</td>
                                         
                                          </tr>
                                        </table><!--end of tab 4 -->
                                                   
                                        <table width="80%" border="0" align="center" style="margin-top:5px; border-collapse:collapse"><!--tab 5 -->
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
                                        </table><!--end of tab 5 -->
                                        
                                        <p align="center">........................................................................................................................................................................................</p>
                                        
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
                                            <td align="center" style="font-family:Tahoma; font-size:16px; text-align:center; font-weight:bold;color:#000;">FEE PAYMENT RECEIPT  </td>
                                          </tr>
                                          
                                        </table>
                                       
                                   
                                      <table width="500" height="150" border="0" align="center" style="margin-top:10px; border-collapse:collapse">					
                                      		<tr>
                                            	<td style="font-weight:bolder">Class:</td>
                                            	<td><?php echo $class;  ?></td>
                                                <td width="100" style="font-weight:bolder">Receipt No.</td>
                                                <td><?php echo $recieptnumber;?></td>
                                                
                                            </tr>
                                      		<tr>
                                            	<td style="font-weight:bolder">Term:</td>
                                            	<td><?php echo $term;  ?></td>
                                                <td style="font-weight:bolder">Issued Date:</td>
                                                <td><?php echo date('d-M-Y') ?></td>
                                                
                                            </tr>
                                            <tr>
                                            	<td width="60" style="font-weight:bolder">Student No:</td>
                                                <td  colspan="3" ><?php echo $studentid; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="143" style="font-weight:bolder">Received from:</td>
                                                <td width="167" colspan="3">
                                                    <?php
                                                    
													
                                                    $studentquery=mysqli_query($con,"SELECT surname,studentname from register where studentid='$studentid'");
                                                    $student=mysqli_fetch_array($studentquery);
                                                    $studentlastname=$student['surname'];
                                                    $studentfirstname=$student['studentname'];
                                                    echo $studentlastname .' ' .$studentfirstname;
                                                    
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">The Sum of:</td>
                                                <td colspan="3"><?php echo numtowords($paymentamount) //convert_number_to_words($paymentamount); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">Being Payment of:</td>
                                                <td colspan="3"><?php echo $paymenttype; ?> payment of school fees</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bolder">Amount in Figures:</td>
                                                <td colspan="3"> Gh¢ <?php echo $paymentamount; ?></td>
                                            </tr>
                                        </table>
                                        
                                        <table width="488" border="0" align="center" style="margin-top:20px; border-collapse:collapse"><!--tab 5 -->
                                          <tr style="text-align:center">
                                          <td >Receipt Issued By</td>
                                          <td width="40%"></td>
                                          <td >Signature and Stamp</td>
                                          </tr>
                                          <tr style="text-align:center" height="40px">
                                          <td ><?php 	
                                                   
                                                    echo $staffnname;
                                                ?> 
                                          </td>
                                          <td ></td>
                                          <td >.........................</td>
                                         
                                          </tr>
                                        </table><!--end of tab 4 -->
                                                   
                                        <table width="80%" border="0" align="center" style="margin-top:5px; border-collapse:collapse"><!--tab 5 -->
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
                                        </table><!--end of tab 5 -->
                                        

                                  
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
    <!-- javascripts -->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../resources/js/jquery.scrollTo.min.js"></script>
    <script src="../resources/js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../resources/js/scripts.js"></script>
   
   <script type="text/javascript" src="../resources/datepicker/jquery-ui/jquery-ui.js"></script>
    
     <script>
      
		$(function(){
		var pickopts={
			changeMonth: true,
			changeYear: true,
			dateformat: "d/m/yy"
			};
			$('#date').datepicker(pickopts);
			
	});
	
	</script>

  </body>
</html>
