<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();

$studentid=$_POST['studentid'];
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$gender=$_POST['gender'];
$birthdate=$_POST['date'];
$birthplace=$_POST['birthplace'];
$religion=$_POST['religion'];
$language=$_POST['language'];
$habit=$_POST['percularhabit'];
$class=$_POST['class'];
$previousschool=$_POST['previousschool'];
$reason=$_POST['reason'];
$address=$_POST['address'];
$dor=$_POST['dor'];
$guardianname=$_POST['guardianname'];
$guardiancontact=$_POST['guardiancontact'];
$guardianwork=$_POST['guardianwork'];
$guardianaddress=$_POST['guardianaddress'];
$scholarship=$_POST['scholarship'];
$batch=$_POST['batch'];

$info=pathinfo($_FILES['file']['name']);
$ext=$info['extension'];
$newname=$studentid.".".$ext;
$target='passports/'.$newname;
$result=move_uploaded_file($_FILES['file']['tmp_name'],$target);

$studentname=$lastname." ".$firstname;
$debt=0;

$query=mysqli_query($con,"insert into register values('$studentid','$lastname','$firstname','$birthdate','$gender','$birthplace','$religion','$language','$dor','$habit','$class','$address','$previousschool','$reason','$guardianname','$guardiancontact','$guardianwork','$guardianaddress','$scholarship','$batch','$target')");

if($query){
	
mysqli_query($con,"insert into studentaccount values ('$studentid','$studentname','$debt')");

include('smssenderregistration.php');
sendsms();
		
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have added a new student.</div>";
header("Location: students.php");

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Student has not been added.</div>";
header("Location: students.php");
}
?>

