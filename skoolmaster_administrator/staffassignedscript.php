<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$assignedid=$_POST['assignedid'];
$staffid=$_POST['staffid'];
$subject=$_POST['subject'];
$category=$_POST['category'];
$class=$_POST['class'];

$query=mysqli_query($con,"insert into subjectassign values('$assignedid','$staffid','$subject','$category','$class')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have assigned a subject to a staff.</div>";
header("Location: staffassigned.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Staff has not been assigned a subject.</div>";
header("Location: staffassigned.php");
}
?>

