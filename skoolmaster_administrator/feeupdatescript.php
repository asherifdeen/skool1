<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$query=mysqli_query($con,"update fees set feedescription='$_POST[feedescription]',feeduration='$_POST[feeduration]',feeamount='$_POST[feeamount]' where feeid='$_POST[feeid]'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have update a fee record.</div>";
header("Location: fees.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Fee record has not been updated.</div>";
header("Location: fees.php");
}
?>

