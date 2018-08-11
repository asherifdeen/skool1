<?php
include("../systemfiles/connection.php");
session_start();
error_reporting(0);
$academicyear=$_POST['academicyear'];
$term=$_POST['term'];
$class=$_POST['class'];
$subject=$_POST['subject'];
$studentid=$_POST['studentid'];
$examsscore=$_POST['score'];

$checkregister=mysqli_query($con,"select * from exams where studentid='$studentid' and academicyear='$academicyear' and  term='$term' and class='$class' and subject='$subject'");

if(mysqli_num_rows($checkregister)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Incorrect exams details or Student records does not exist.</div>";
header("Location: editexamsscore.php");	

}
else
{
$query=mysqli_query($con,"update exams set score='$examsscore' where studentid='$studentid' and academicyear='$academicyear' and term='$term' and class='$class' and subject='$subject'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Student exams score updated.</div>";
header("Location: editexamsscore.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured in updating record try again.</div>";
header("Location: editexamsscore.php");
}
}
?>

