<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$termcheck=$_POST['term'];
$academicyearcheck=$_POST['academicyear'];

if(isset($_POST['transfer'])) {

$chkacademicdetail=mysqli_query($con,"select * from bills where term='$termcheck' and academicyear='$academicyearcheck'");
if(mysqli_num_rows($chkacademicdetail)>0) 
{
	
 $_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Arrears can not be transfered to a perious academic year and term.</div>";

header("Location: transferarrears.php");
}
else
{

if (!empty($_POST['check'])){


foreach($_POST['check'] as $selected){


$feeid="Nil";
$feedescription="Arrears";

$amountleft=0;
$term=$_POST['term'];
$academicyear=$_POST['academicyear'];
$arrearsamount=($_POST['debtamount'][$selected]);
$studentid=($_POST['studentid'][$selected]);
$studentname=($_POST['studentname'][$selected]);


$query=mysqli_query($con,"insert into bills (studentid,studentname,academicyear,term,feedescription,feeamount) values ('$studentid','$studentname','$academicyear','$term','$feedescription','$arrearsamount')");

mysqli_query($con,"update studentaccount set debt='$amountleft' where studentid='$studentid'");

$chkdebt=mysqli_query($con,"select debt from studentaccount where studentid='$studentid'");

$debt=mysqli_fetch_array($chkdebt);

$debtamount=$debt['debt'];

$balance=$debtamount+$arrearsamount;
//++$i;
mysqli_query($con,"update studentaccount set debt='$balance' where studentid='$studentid'");
}
if ($query)
{
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> The selected student arrears has been transfered.</div>";
header("Location: transferarrears.php");	

}
else
{
	
 $_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Unable to process this data system error.</div>";

header("Location: transferarrears.php");

}
}
}
}
?>