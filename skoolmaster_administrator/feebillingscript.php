<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


if(isset($_POST['send'])) {


if (!empty($_POST['check'])){

//$i = 0;
//$size = count($_POST['check']);
foreach($_POST['check'] as $selected){

//while ($i < $size) {

$feedescription=$_POST['feedescription'];
$feeamount=$_POST['feeamount'];
$term=$_POST['term'];
$academicyear=$_POST['academicyear'];
$studentid=($_POST['studentid'][$selected]);
$studentname=($_POST['studentname'][$selected]);


$checkdoubleentry=mysqli_query($con,"select * from bills where studentid='$studentid' and feedescription='$feedescription' and academicyear='$academicyear' and term='$term'");


if(mysqli_num_rows($checkdoubleentry)>0) 
{
	
 $_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Some students has been billed. Please you can't bill them again.</div>";

header("Location: feebilling.php");
}
else
{

$query=mysqli_query($con,"insert into bills (studentid,studentname,academicyear,term,feedescription,feeamount) values ('$studentid','$studentname','$academicyear','$term','$feedescription','$feeamount')");

$checkdebt=mysqli_query($con,"select debt from studentaccount where studentid='$studentid'");

$debt=mysqli_fetch_array($checkdebt);

$debtamount=$debt['debt'];

$balance=$debtamount + $feeamount;

$updatebalance=mysqli_query($con,"update studentaccount set debt='$balance' where studentid='$studentid'");
}
}

if ($query)
{
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> The selected student has been billed.</div>";
header("Location: feebilling.php");	

}
else
{
	
 $_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Unable to process this data system error.</div>";

header("Location: feebilling.php");
}
}
}
?>