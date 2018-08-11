<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$code=$_GET['assignedid'];
$query=mysqli_query($con,"delete from subjectassign where assignedid='$code'");

if ($query){
	

$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have unassigned class to a staff.</div>";
header("Location: staffassigned.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> You were not able to unassign class to staff.</div>";
header("Location: staffassigned.php");
}
?>