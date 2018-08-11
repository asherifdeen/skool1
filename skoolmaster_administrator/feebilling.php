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

    <title>Fee Billing | SkoolMaster</title>

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

$(document).ready(function(){
	
	window.setTimeout(function(){
			$(".alert").fadeOut(3000).slideUp(500,
			function(){
				$(this).remove();
			});
		},3000);
		
	});	

function feedetail(str) {
    if (str == "") {
        document.getElementById("feedetails").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("feedetails").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","feedetail.php?q="+str,true);
        xmlhttp.send();
    }
}

function billclass(str) {
    if (str == "") {
        document.getElementById("billclass").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("billclass").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","billclass.php?q="+str,true);
        xmlhttp.send();
    }
}



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
					<h3 class="page-header"><i class="icon_profile"></i> Fee Billing</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="icon_profile"></i>Fee Billing</li>						  	
					</ol>
				</div>
			</div>
              <!-- page start-->
              	<div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               Fee Billing
                            </section>
                            <div class="panel-body">
              					
                                <form class="form-horizontal" method="post" action="feebillingscript.php" enctype="multipart/form-data">
                                <div class="row" style="margin-bottom:15px; margin-left:10px;"> 
                                    <div class="form-group">
                                      <div class="col-lg-2">
                                          <button class="btn btn-primary btn-sm" name="send" type="submit"><span class="icon_folder"></span> Post Bill</button>
                                          <a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                                      </div>
                                  </div> 
                                </div>
                                
								
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
                                                        
                                                        <div class="col-lg-2">
                                                          <select class="form-control input-sm" id="feedescription" name="feedescription" onChange="feedetail(this.value)" >
                                                          
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
                                                        
                                                         <div id="feedetails" class="col-lg-10">
                                                            
                                                         </div>
                                                            
                                                        
                                                    </div><!-- form inline end-->
                                                    
                                        </div><!-- end row-->
                                        
                                        <div class="row" style="margin-top:20px;">
                                            <div class="container" id="billclass">
                                            	
                                                <?php 
                                                echo $_SESSION['result'];
                                                unset ($_SESSION['result']);
                                                 ?>
                                            
                                            </div>
                                            
                                        </div><!--end row-->
                                        
                                        
                                     </div>
                                    </div>
                                  </div>
                                  </section>
                                  
                                	</div>
                                </div>
                                
                                
                            	</form>
              				
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
