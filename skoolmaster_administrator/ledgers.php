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
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Ledgers | SkoolMaster</title>

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
    <link rel="stylesheet" href="../resources/jquery_ui/jquery-ui.theme.css">
	<link rel="stylesheet" href="../resources/jquery_ui/jquery-ui.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
      <script src="../resources/js/respond.min.js"></script>
      <script src="../resources/js/lte-ie7.js"></script>
    <![endif]-->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/jquery_ui/jquery-ui.js"></script> 
    
<script>
$(document).ready(function(){
	
	window.setTimeout(function(){
			$(".alert").fadeOut(3000).slideUp(500,
			function(){
				$(this).remove();
			});
		},3000);
		
});		

function print_div(div){
	var restorepage = document.body.innerHTML;
	var printDiv = document.getElementById(div).innerHTML;
	
	document.body.innerHTML = printDiv;
	window.print();
	document.body.innerHTML = restorepage;
		}
</script>


<style type="text/css">

.itemsearch {
    width: 180px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
    border: 1px solid #eaeaea;
    box-shadow: none;
    background: url("../resources/img/search-icon.jpg") no-repeat 10px 8px;
    padding:0 5px 0 35px;
    color: #c8c8c8;
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
					<h3 class="page-header"><i class="icon_profile"></i> General Ledgers</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_profile"></i>General Ledgers</li>						  	
					</ol>
				</div>
			</div>
            
            
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               General Ledgers
                            </section>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button onClick="print_div('printable_area')" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Ledger</button>
                                                 <form class="form-inline pull-right" action="" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-sm itemsearch" placeholder="Search" name="searchtext">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                                                  </form>
                                    </div>
                                </div>
                                <p></p>
                                <div class="row" id="printable_area">
                                    <div class="col-md-12">
                                    	<?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                        
                                        
                                            
                                            
                 <?php
				
				
				
				
                if(isset($_POST['search']))
				{
					$searchq=$_POST['searchtext'];
					$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
					
					$querycheck=mysqli_query($con,"select distinct class,term from payment where studentid='$searchq'");
	
					$total=mysqli_num_rows($querycheck);
				
				if(mysqli_num_rows($querycheck)<1)
				{
					echo'<div class="alert alert-danger" style="margin-top:10px">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo 'No student found!</div>';
				}
				else
				{
					$queryinfo=mysqli_query($con,"select * from register where studentid='$searchq'");
					$rowinfo=mysqli_fetch_array($queryinfo);
					?>
                    
					<table style="margin-bottom:20px; margin-top:20px;">
                    	<tr>
                        	<td style="font-weight:bolder">Student No.:</td>
                            <td width="200"><?php echo $rowinfo['studentid'] ?></td>
                            <td style="font-weight:bolder">Student Name:</td>
                            <td><?php echo $rowinfo['surname']." ".$rowinfo['studentname'] ?></td>
                        </tr>
                    </table>
                    <?php
					for($i=0;$i<=$total;$i++){
					while($rowcheck=mysqli_fetch_array($querycheck))
					{
						$class=$rowcheck['class'];
						$term=$rowcheck['term'];
						
						?>
                        					<table>
                                                <tr>
                                                    <td style="font-weight:bolder">Class:</td>
                                                    <td width="200"><?php echo $class ?></td>
                                                    <td style="font-weight:bolder">Academic Term:</td>
                                                    <td><?php echo $term ?></td>
                                                </tr>
                    						</table>
                                            
											<table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th>Payment Date</th>
                                                <th>Receipt No.</th>
                                                <th>Payment Type</th>
                                                <th>Amout Paid</th>
                                                <th>Balance</th>
                                              </tr>
                                            </thead>
						<?php
                        
						$query=mysqli_query($con,"select * from payment where studentid='$searchq' and class='$class' and term='$term'");
						while($row=mysqli_fetch_array($query))
						{
					
						?>
                                            
                                            
                                            
                                            <tbody>
                                              <tr>
                                                 <td><?php echo $row['paymentdate'];?> </td>
                                                 <td><?php echo $row['recieptnumber']; ?></td>
                                                <td><?php echo $row['description']; ?> </td>
                                                <td><?php echo $row['feeamount']; ?> </td>
                                                <td><?php echo $row['balance'] ?> </td>                                              </tr>                              
				  <?php 
                  } 
                  ?>
                                            </tbody>
                                          </table>
                    
                   <?php 
					}
					}
                  } 
				}
                  ?>
                 
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


  </body>
</html>
