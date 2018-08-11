<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();


$query=mysqli_query($con,"update staff set lastname='$_POST[lastname]',firstname='$_POST[firstname]',contact='$_POST[contact]',system='$_POST[system]',username='$_POST[username]',password='$_POST[password]' where staffid='$_POST[staffid]'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have update a staff record.</div>";
header("Location: staffs.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Staff record has not been updated.</div>";
header("Location: staffs.php");
}
?>

