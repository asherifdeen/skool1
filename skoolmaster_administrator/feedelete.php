<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$code=$_GET['feeid'];
$query=mysqli_query($con,"delete from fees where feeid='$code'");

if ($query){

$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have deleted a fee from the system.</div>";
header("Location: fees.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> You were not able to delete fee from the system.</div>";
header("Location: fees.php");
}
?>