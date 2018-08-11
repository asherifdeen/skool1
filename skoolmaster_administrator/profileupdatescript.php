<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();


$query=mysqli_query($con,"update staff set contact='$_POST[contact]',username='$_POST[username]',password='$_POST[password]' where staffid='$_POST[staffid]'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have updated your profile.</div>";
header("Location: profileview.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Staff profile has not been updated.</div>";
header("Location: profileview.php");
}
?>

