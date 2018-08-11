<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$class=$_POST['class'];

$query=mysqli_query($con,"insert into classes (classname) values ('$class')");


if($query)
{
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Class was added successfully.</div>";
header("Location: classsetup.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured class could not added.</div>";
header("Location: classsetup.php");
}
?>