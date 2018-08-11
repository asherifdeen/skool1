<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$staffid=$_POST['staffid'];
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$contact=$_POST['contact'];
$system=$_POST['system'];
$username=$_POST['username'];
$password=$_POST['password'];

$fullname=$lastname." ".$firstname;
$name=explode(" ","$fullname");
$acronyms="";
		
	foreach($name as $w){
		$acronyms.=strtoupper($w[0]);
	}
	
	

$query=mysqli_query($con,"insert into staff values('$staffid','$lastname','$firstname','$acronyms','$contact','$system','$username','$password')");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have added a new staff.</div>";
header("Location: staffs.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Staff has not been added.</div>";
header("Location: staffs.php");
}
?>

