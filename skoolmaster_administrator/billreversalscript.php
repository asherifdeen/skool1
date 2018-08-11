<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


if(isset($_POST['reverse'])) {


if (!empty($_POST['check'])){

//$i = 0;
//$size = count($_POST['check']);
foreach($_POST['check'] as $selected){


	$billid=$selected;



	$checkstudent=mysqli_query($con,"select * from bills where billid='$billid'");
	$row=mysqli_fetch_array($checkstudent);
	$studentid=$row['studentid'];
	$feeamount=$row['feeamount'];


	$checkdebt=mysqli_query($con,"select debt from studentaccount where studentid='$studentid'");

	$debt=mysqli_fetch_array($checkdebt);
	
	$debtamount=$debt['debt'];
	
	$balance=$debtamount - $feeamount;
	
	$updatebalance=mysqli_query($con,"update studentaccount set debt='$balance' where studentid='$studentid'");
		


	$delete=mysqli_query($con,"delete from bills where billid='$billid'");

if($delete){
	
	
	
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> The selected student bills has been reversed.</div>";
header("Location: billreversal.php");	

		}

		else
		{
		$_SESSION['result']="<div class='alert alert-danger'><Strong>Sorry!</strong> No student was selected. Ensure at least one student is selected.</div>";
		header("Location: billreversal.php");	
		}
		echo $studentid .":". $balance;
}

}
}
?>