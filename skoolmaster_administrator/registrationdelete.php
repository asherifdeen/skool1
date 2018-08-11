<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$code=$_GET['studentid'];
$query=mysqli_query($con,"delete from register where studentid='$code'");

if ($query){
	
$querypassport=mysqli_query($con,"select * from register where studentid='$code'");
$rowpassport=mysqli_fetch_array($querypassport);
$passport=$rowpassport['passport'];
unlink($passport);

$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have deleted a student from the system.</div>";
header("Location: students.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> You were not able to delete student from the system.</div>";
header("Location: students.php");
}
?>