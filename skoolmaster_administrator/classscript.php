<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$classname=$_POST['classname'];

$query=mysqli_query($con,"insert into classes(classname) values('$classname')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have registered  a new class.</div>";
header("Location: classes.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Class has not been registered.</div>";
header("Location: classes.php");
}
?>

