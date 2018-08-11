<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();


if($_FILES['file']['name']==""){
	$code=$_POST['schoolcode'];
	
	$query=mysqli_query($con,"select * from school where schoolcode='$code'");

	$row=mysqli_fetch_array($query);
	
	$logo=$row['logo'];
	
	$target=$logo;
}
else
{

	$info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$newname=$_POST['schoolcode'].".".$ext;
	$target='passports/'.$newname;
	$result=move_uploaded_file($_FILES['file']['tmp_name'],$target);
}

$query=mysqli_query($con,"update school set schoolname='$_POST[schoolname]',address='$_POST[address]',location='$_POST[location]',logo='$target' where schoolcode='$_POST[schoolcode]'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have updated School setup.</div>";
header("Location: schoolsetupconfig.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> School setup has not been updated.</div>";
header("Location: schoolsetupconfig.php");
}
?>

