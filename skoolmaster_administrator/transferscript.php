<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$code=$_GET['studentid'];
$getquery=mysqli_query($con,"select * from register where studentid='$code'");
$row=mysqli_fetch_array($getquery);

				$studentid=$row['studentid'];
				$lastname=$row['surname'];
				$firstname=$row['studentname'];
				$gender=$row['gender'];
				$birthdate=$row['birthdate'];
				$birthplace=$row['birthplace'];
				$religion=$row['religion'];
				$language=$row['languagespoken'];
				$habit=$row['percularhabit'];
				$class=$row['class'];
				$previousschool=$row['previousschool'];
				$reason=$row['reason'];
				$address=$row['residentialaddress'];
				$dor=$row['admissiondate'];
				$guardianname=$row['guardianname'];
				$guardiancontact=$row['guardiancontact'];
				$guardianwork=$row['guardianwork'];
				$guardianaddress=$row['guardianaddress'];
				$scholarship=$row['scholarship'];
				$batch=$row['batch'];
				$passport=$row['passport'];
				
				
				$insert=mysqli_query($con,"insert into transfer values('$studentid','$lastname','$firstname','$birthdate','$gender','$birthplace','$religion','$language','$dor','$habit','$class','$address','$previousschool','$reason','$guardianname','$guardiancontact','$guardianwork','$guardianaddress','$scholarship','$batch','$passport')");
				
if ($insert){
	mysqli_query($con,"delete from register where studentid='$code'");

$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> Transfer has been made successful.</div>";
header("Location: students.php");
}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> You were not able to make the transfer </div>";
header("Location: students.php");
}
?>