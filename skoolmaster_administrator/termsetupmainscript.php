<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$academicyear=$_POST['academicyear'];
$term=$_POST['term'];
$begindate=$_POST['begindate'];
$enddate=$_POST['enddate'];
$nexttermbegin=$_POST['nexttermbegin'];

mysqli_query($con,"delete from term");
$query=mysqli_query($con,"insert into term values ('$academicyear','$term','$begindate','$enddate','$nexttermbegin')");


if($query)
{
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Term has been setup successfully.</div>";
header("Location: termsetup.php");		
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> An error occured term could not setup.</div>";
header("Location: termsetup.php");	
}
?>