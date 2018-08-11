<?php
include("../systemfiles/connection.php");
session_start();
error_reporting(0);
$feedescription=$_POST['feedescription'];
$feeamount=$_POST['feeamount'];
$feeduration=$_POST['feeduration'];

$query=mysqli_query($con,"insert into fees (feedescription,feeamount,feeduration) values('$feedescription','$feeamount','$feeduration')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have added a new fee.</div>";
header("Location: fees.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Fee has not been added.</div>";
header("Location: fees.php");
}
?>

