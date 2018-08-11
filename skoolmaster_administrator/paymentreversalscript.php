<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$code=$_GET['recieptnumber'];

$getstudent=mysqli_query($con,"select * from payment where recieptnumber='$code'");
$studentdetails=mysqli_fetch_array($getstudent);
$studentid=$studentdetails['studentid'];
$feeamount=$studentdetails['feeamount'];

$query=mysqli_query($con,"delete from payment where recieptnumber='$code'");

if ($query){
	
$getdebt=mysqli_query($con,"select debt from studentaccount where studentid='$studentid'");
$debt=mysqli_fetch_array($getdebt);
$debtamount=$debt['debt'];

$balance=$debtamount + $feeamount;
	
mysqli_query($con,"update studentaccount set debt='$balance' where studentid='$studentid'");


$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have reversed a student payment.</div>";
header("Location: paymentreversal.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> You were not able to reverse the payment.</div>";
header("Location: paymentreversal.php");
}
?>