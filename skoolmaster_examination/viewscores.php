<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];
$staffid=$_SESSION['staffid'];

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

    <title> View Score | SkoolMaster</title>

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
	  "columnDefs": [ {  } ]
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
					<h3 class="page-header"><i class="fa fa-eye"></i> View Scores</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
						<li><i class="fa fa-eye"></i>View Scores</li>						  	
					</ol>
				</div>
			</div>
            
            
              <!-- page start-->
                <div class="row">
                    <div class="col-md-12">
                    	
                         <div class="panel">
                            <section class="panel-heading">
                               View Scores
                            </section>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                
                                                 <form class="form-inline" action="" method="post">
                                                 	<div class="form-group">
                                                    	<input type="text" class="form-control input-sm" placeholder="Academic Year" name="academicyear">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                    	<select class="form-control input-sm" id="term" name="term"  required >
                                              
                                                                <option value="">Term </option>
                                                                <?php
                                                                $sql=mysqli_query($con,"select distinct term from exams");
                                                                while($term=mysqli_fetch_array($sql)){
                                                                ?>
                                                                <option value="<?php echo $term['term'] ?>"><?php echo $term['term'] ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                                
                                                          </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <select class="form-control input-sm" id="class" name="class"  required >
                                                        
                                                                <option value="">Class </option>
                                                                <?php
                                                                $sql=mysqli_query($con,"select distinct class from subjectassign where staffid='$staffid'");
																while($class=mysqli_fetch_array($sql)){
																?>
																<option value="<?php echo $class['class'] ?>"><?php echo $class['class'] ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                                
                                                          </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                    	<select class="form-control input-sm" id="subject" name="subject"  required >
                                              
                                                            <option value="">Subject</option>
                                                            
                                                            <?php
                                                            $category=mysqli_query($con,"select category from subjectassign where staffid='$staffid'");
                                                            $cat=mysqli_fetch_array($category);
                                                            $catvalue=$cat['category'];
                                                            if($catvalue=="JHS"){
                                                            $sql=mysqli_query($con,"select distinct subject from subjectassign where staffid='$staffid'");
                                                            while($subject=mysqli_fetch_array($sql)){
                                                            ?>
                                                            <option value="<?php echo $subject['subject'] ?>"><?php echo $subject['subject'] ?></option>
                                                            <?php 
                                                            }
                                                            
                                                            }
                                                            else
                                                            {
                                                            $sql=mysqli_query($con,"select distinct subjecttitle from subjects where level='$catvalue'");
                                                            while($subject=mysqli_fetch_array($sql)){
                                                            ?>
                                                            
                                                            <option value="<?php echo $subject['subjecttitle'] ?>"><?php echo $subject['subjecttitle'] ?></option>	
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                      
                                                      </select>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                                                  </form>
                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">
                                    	<?php 
										echo $_SESSION['result'];
										unset ($_SESSION['result']);
										 ?>
                                        
                                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Student Number</th>
                                                <th>Student Name</th>
                                                <th>Assessment Score</th>
                                                <th>Exams Score</th>
                                              </tr>
                                            </thead>
                                            
                                            
                 <?php
				
				
                if(isset($_POST['search']))
				{
					$academicyear=$_POST['academicyear'];
					$term=$_POST['term'];
					$class=$_POST['class'];
					$subject=$_POST['subject'];
					
					 $id=0;
					$getidquery=mysqli_query($con,"select distinct studentid from exams where academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject'");
					
					if(mysqli_num_rows($getidquery)<1){
	
							$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
							
							}
							
				while($foundid=mysqli_fetch_array($getidquery)){
							$id++;
							$studentid[$id]=$foundid['studentid'];
					
			
				?>
                                            
                                            
                                            
                                            <tbody>
                                              <tr>
                                                <td>
													<?php 
													
														echo $studentid[$id];
												
												 	?> 
                                                 </td>
                                                 <td>
												 	<?php 
													
													$getname=mysqli_query($con,"select surname,studentname from register where studentid='$studentid[$id]'");
													$name=mysqli_fetch_array($getname);
													$firstname_value=$name['surname'];
													$lastname_value=$name['studentname'];  
													echo $firstname_value. " ". $lastname_value;
													
													?> 
                                                  </td>
                                                 <td>
												 	<?php
													
													$getass=mysqli_query($con,"select score from assessment where academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject' and studentid='$studentid[$id]'");
													$ass=mysqli_fetch_array($getass);
													$assscore_value=$ass['score'];
													echo $assscore_value;
													 
													?>
                                                 </td>
                                                 <td>
													 <?php 
													 
													 $getexams=mysqli_query($con,"select score from exams where academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject' and studentid='$studentid[$id]'");
													$exams=mysqli_fetch_array($getexams);
													$examsscore_value=$exams['score'];
													echo $examsscore_value;
													 
													 
                                                     ?> 
                                                  </td>
                                                
                                              </tr>                              
				  <?php 
                  } 
				}
                  ?>
                                            </tbody>
                                          </table>
                 	
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
    


  </body>
</html>
