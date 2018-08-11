<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$schoolcode=$_POST['schoolcode'];
$schoolname=$_POST['schoolname'];
$address=$_POST['address'];
$location=$_POST['location'];

$info=pathinfo($_FILES['file']['name']);
$ext=$info['extension'];
$newname=$schoolcode.".".$ext;
$target='passports/'.$newname;
$result=move_uploaded_file($_FILES['file']['tmp_name'],$target);


mysqli_query($con,"delete from school");
$query=mysqli_query($con,"insert into school values ('$schoolcode','$schoolname','$address','$location','$target')");


if($query)
{
header("Location: termandclasssetup.php");	
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured school could not setup.</div>";
header("Location: schoolsetup.php");	
}
?>