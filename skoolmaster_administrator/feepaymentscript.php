<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


//set the random id length 
$random_id_length = 4; 

//generate a random id encrypt it and store it in $rnd_id 
$rnd_id =(uniqid(rand(),1)); 

//to remove any slashes that might have come 
$rnd_id = strip_tags(stripslashes($rnd_id)); 

//Removing any . or / and reversing the string 
$rnd_id = str_replace(".","",$rnd_id); 
$rnd_id = strrev(str_replace("/","",$rnd_id)); 

//finally I take the first 10 characters from the $rnd_id 
$rnd_id = substr($rnd_id,0,$random_id_length); 

$year=date("Y");
$month=date("m");

//echo "Random Id:00$year$rnd_id" ;
//echo "<br>";




$studentid=$_POST['studentid'];
$class=$_POST['class'];
$term=$_POST['term'];
$amount=$_POST['amount'];
$paymentdate=date("m/d/Y");
$recieptnumber="$year$month$rnd_id";


$chkdebt=mysqli_query($con,"select debt from studentaccount where studentid='$studentid'");

$debt=mysqli_fetch_array($chkdebt);
 
 // First of all check to see if student exist
if (!$debt){
	
	// If student does not exit run the java code below
	
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Please this particular student has no bills. </div>";

header("Location: feepayment.php");
}
elseif($debt['debt']<0)
{

$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Please this particular student has no bills. </div>";

header("Location: feepayment.php");	
	
}
elseif($amount>$debt['debt'])
{
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Please payment amount can not exceed debt amount. </div>";

header("Location: feepayment.php");		
	
	
}

// If student exist continue 

else{

	$checkdebt=$debt['debt'];
	if($amount < $checkdebt)
	{
		$paymenttype="Part Payment";
	}
	else
	{
		$paymenttype="Full Payment";		
	}
	
$debtamount=$debt['debt'];

$balance=$debtamount-$amount;



$query=mysqli_query($con,"insert into payment values ('$studentid','$recieptnumber','$class','$term','$paymenttype','$amount','$paymentdate','$balance')");


if($query)
{
	$_SESSION['paystudentid']=$studentid;
	$_SESSION['payrecieptnumber']=$recieptnumber;
	$_SESSION['paypaymentamount']=$amount;
	$_SESSION['paypaymenttype']=$paymenttype;
	$_SESSION['payclass']=$_POST['class'];
	$_SESSION['payterm']=$_POST['term'];
	
	mysqli_query($con,"update studentaccount set debt='$balance' where studentid='$studentid'");

	header("Location: feepaymentreciept.php");
	
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Payment has not been made. Try again. </div>";

header("Location: feepayment.php");
}
}
?>