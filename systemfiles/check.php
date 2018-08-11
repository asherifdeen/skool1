<?php
include("connection.php");
include("endsession.php");
session_start();
$staffnname=$_SESSION['staffname'];
$system=$_SESSION['system'];
	
	if($system=='administrator'){
			
			header("Location: ../skoolmaster_administrator/termchecker.php");
		}
		elseif($system=='staff')
		{
			header("Location: ../skoolmaster_examination/dashboard.php");
		}


?>