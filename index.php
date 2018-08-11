<?php
include("systemfiles/dbase.php");
error_reporting(0);
session_start();
if(isset($_POST['login'])){
	
	$username=mysqli_real_escape_string($con,$_POST["username"]);
	$password=mysqli_real_escape_string($con,$_POST["password"]);
	
	if ($username=="" or $password=="" ){
	
		$msg="<div class='alert alert-danger'><strong>Sorry!</strong> Blank field(s) detected</div>";
	}
	
	$query=mysqli_query($con,"select * from staff where username='$username' and password='$password'");
	
	
	$row=mysqli_fetch_array($query);
	
	if (mysqli_num_rows($query)<1)
	{
	$msg="<div class='alert alert-danger'><strong>Sorry!</strong> You are not a valid user.</div>";
	}
	else
	{
			//session_register_session;
			$_SESSION['staffid']=$row['staffid'];
			$_SESSION['staffname']=$row['lastname'].' '.$row['firstname'];
			$_SESSION['username']=$_POST['username'];
			$_SESSION['password']=$_POST['password'];
			$_SESSION['system']=$row['system'];
			header("Location: systemfiles/check.php");
	}
}
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

    <title>Login | SkoolMaster</title>

    <!-- Bootstrap CSS -->    
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="resources/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="resources/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="resources/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/style-responsive.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="resources/jquery_ui/jquery-ui.theme.css">
	<link rel="stylesheet" href="resources/jquery_ui/jquery-ui.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="resources/js/html5shiv.js"></script>
    <script src="resources/js/respond.min.js"></script>
    <![endif]-->
    <script src="resources/jquery_ui/jquery-1.7.2.min.js"></script>
    <script src="resources/jquery_ui/jquery-ui.js"></script>
    
    <script>
	$(document).ready(function() {
        
    
		window.setTimeout(function(){
			$(".alert").fadeOut(3000).slideUp(500,
			function(){
				$(this).remove();
			});
		},3000);
	
	});
	</script>
    
    <style>
	.login-extra {
	display: block; 
	width: 340px; 
	margin: 1.5em auto;
	 
	text-align: center;
	line-height: 19px;
	
	 	
}
	</style>
</head>

  <body class="login-img3-body">

    <div class="container">
		
      <form class="login-form" action="" method="post">        
        <div class="login-wrap">
        
        		<?php
        			echo $msg;
        		?>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
         
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" autofocus name="username" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <label class="checkbox">
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
        </div>
      </form>
			
            <div class="login-extra">
				<a href="#">Developed by Astral Business Solutions &copy; 2017</a>
			</div> <!-- /login-extra -->
    </div>


  </body>
</html>
