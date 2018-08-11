<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$academicyear=$_SESSION['assessment_academicyear'];
$term=$_SESSION['assessment_term'];
$class=$_SESSION['assessment_class'];
$category=$_SESSION['assessment_category'];
$subject=$_SESSION['assessment_subject'];
$studentid=$_POST['studentid'];
$assessmentscore=$_POST['assessmentscore'];

$checkregister=mysqli_query($con,"select * from register where studentid='$studentid' and class='$class'");

if(mysqli_num_rows($checkregister)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Incorrect Student ID or Student does not exist in selected Class.</div>";
header("Location: assessmentscorecontinue.php");	

}
else
{
$query=mysqli_query($con,"insert into assessment values('$studentid','$class','$term','$academicyear','$subject','$category','$assessmentscore')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Student assessment score recorded.</div>";
header("Location: assessmentscorecontinue.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured or Duplicated assessment records.</div>";
header("Location: assessmentscorecontinue.php");
}
}
?>

