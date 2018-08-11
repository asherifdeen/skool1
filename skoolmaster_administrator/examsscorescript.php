<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$academicyear=$_SESSION['exams_academicyear'];
$term=$_SESSION['exams_term'];
$class=$_SESSION['exams_class'];
$category=$_SESSION['exams_category'];
$subject=$_SESSION['exams_subject'];
$studentid=$_POST['studentid'];
$examsscore=$_POST['examsscore'];

$checkregister=mysqli_query($con,"select * from register where studentid='$studentid' and class='$class'");

if(mysqli_num_rows($checkregister)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Incorrect Student ID or Student does not exist in selected class.</div>";
header("Location: examsscorecontinue.php");	

}
else
{
$query=mysqli_query($con,"insert into exams values('$studentid','$class','$term','$academicyear','$subject','$category','$examsscore')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Student exams score recorded.</div>";
header("Location: examsscorecontinue.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured or Duplicated exams records.</div>";
header("Location: examsscorecontinue.php");
}
}
?>

