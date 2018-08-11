<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$academicyear=$_POST['academicyear'];
$term=$_POST['term'];
$class=$_POST['class'];
$subject=$_POST['subject'];
$studentid=$_POST['studentid'];
$assessmentscore=$_POST['score'];

$checkregister=mysqli_query($con,"select * from assessment where studentid='$studentid' and academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject'");

if(mysqli_num_rows($checkregister)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Incorrect assessment details or Student records does not exist.</div>";
header("Location: editclassscore.php");	

}
else
{
$query=mysqli_query($con,"update assessment set score='$assessmentscore' where studentid='$studentid' and academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Student assessment score updated.</div>";
header("Location: editclassscore.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured in updating record try again.</div>";
header("Location: editclassscore.php");
}
}
?>

