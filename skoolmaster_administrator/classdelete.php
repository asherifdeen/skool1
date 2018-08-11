<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$code=$_GET['classid'];
$query=mysqli_query($con,"delete from classes where classid='$code'");

if ($query){
	

$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have deleted a class.</div>";
header("Location: classes.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Class was not able to be delete.</div>";
header("Location: classes.php");
}
?>