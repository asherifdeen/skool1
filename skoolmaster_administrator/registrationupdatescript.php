<?php
include("../systemfiles/connection.php");
error_reporting(0);
session_start();


if($_FILES['file']['name']==""){
	$code=$_POST['studentid'];
	
	$query=mysqli_query($con,"select * from register where studentid='$code'");

	$row=mysqli_fetch_array($query);
	
	$passport=$row['passport'];
	
	$target=$passport;
}
else
{

	$info=pathinfo($_FILES['file']['name']);
	$ext=$info['extension'];
	$newname=$_POST['studentid'].".".$ext;
	$target='passports/'.$newname;
	$result=move_uploaded_file($_FILES['file']['tmp_name'],$target);
}

$query=mysqli_query($con,"update register set surname='$_POST[lastname]',studentname='$_POST[firstname]',birthdate='$_POST[date]',gender='$_POST[gender]',birthplace='$_POST[birthplace]',religion='$_POST[religion]',languagespoken='$_POST[language]',admissiondate='$_POST[dor]',percularhabit='$_POST[percularhabit]',class='$_POST[class]',residentialaddress='$_POST[address]',previousschool='$_POST[previousschool]',reason='$_POST[reason]',guardianname='$_POST[guardianname]',guardiancontact='$_POST[guardiancontact]',guardianwork='$_POST[guardianwork]',guardianaddress='$_POST[guardianaddress]',scholarship='$_POST[scholarship]',batch='$_POST[batch]',passport='$target' where studentid='$_POST[studentid]'");

if($query){
	
$_SESSION['result']="<div class='alert alert-success'><strong>Successful!</strong> You have update a student record.</div>";
header("Location: students.php");	

}
else
{
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Student record has not been updated.</div>";
header("Location: students.php");
}
?>

