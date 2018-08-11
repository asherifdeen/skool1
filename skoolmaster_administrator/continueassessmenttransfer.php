<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$batch=$_POST['batch'];
$class=$_POST['class'];

//clear general score table to processed with analysis
mysqli_query($con,"delete from generalscore");
//clearing ends here

//clear classaverage table to processed with analysis
mysqli_query($con,"delete from assessmentaverage");
//clearing ends here




////student score transfers code start....... 
//
//

$s=0;
$getstudent=mysqli_query($con,"select studentid from register where batch='$batch' and class='$class' order by studentid ASC");



//$c=0;
//$getexams=mysqli_query($con,"select * from exams where class='$class' and term='$term' and academicyear='$academicyear' and //programme='$department' order by studentid ASC");

if(mysqli_num_rows($getstudent)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
header("Location: continueassessmentenquery.php");	

}

while($student=mysqli_fetch_array($getstudent)){
	$s++;
	$getstudentid[$s]=$student['studentid'];


$p=0;	
$getonestudent=mysqli_query($con,"select DISTINCT academicyear,term,subject from exams where studentid='$getstudentid[$s]'");	
	
while($studentacademicdetails=mysqli_fetch_array($getonestudent)){
	$p++;
	$academicvalue_academicyear[$p]=$studentacademicdetails['academicyear'];
	$academicvalue_term[$p]=$studentacademicdetails['term'];
	$academicvalue_subject[$p]=$studentacademicdetails['subject'];
	

//get exams score from dbase.

$getexams=mysqli_query($con,"select score from exams where studentid='$getstudentid[$s]' and term='$academicvalue_term[$p]' and academicyear='$academicvalue_academicyear[$p]' and subject='$academicvalue_subject[$p]'");

$examsscore=mysqli_fetch_array($getexams);
$convertexamsscore=0.6 * $examsscore['score'];

//get assessment score from dbase 

$getass=mysqli_query($con,"select score from assessment where studentid='$getstudentid[$s]' and term='$academicvalue_term[$p]' and academicyear='$academicvalue_academicyear[$p]' and subject='$academicvalue_subject[$p]'");

$assscore=mysqli_fetch_array($getass);
$convertassscore=0.4 * $assscore['score'];

//sum assessment score and exams score after converting them.

$totalscore=$convertassscore + $convertexamsscore;

//insert work out scores to general score table

$sqlgeneralscore=mysqli_query($con,"insert into generalscore(studentid,term,academicyear,subject,totalscore) values('$getstudentid[$s]','$academicvalue_term[$p]','$academicvalue_academicyear[$p]','$academicvalue_subject[$p]','$totalscore')");
	
}
	

}

//
//
//
//student score transfers code end here.



//student average score transfer code start....
//
//
$getstudents=mysqli_query($con,"select DISTINCT studentid,term,academicyear,subject from generalscore");

$z=0;
while($classrow=mysqli_fetch_array($getstudents)){
	
	$z++;
	$student[$z]=$classrow['studentid'];
	$subject[$z]=$classrow['subject'];
	
	
	$getscore=mysqli_query($con,"select sum(totalscore) as score from generalscore where studentid='$student[$z]'and subject='$subject[$z]'");
	
	$countrecords=mysqli_query($con,"select * from generalscore where studentid='$student[$z]' and subject='$subject[$z]'");
	
	$numb=mysqli_num_rows($countrecords);
	
	$sub=0;
	while($details=mysqli_fetch_array($getscore))
	{
		$sub++;
		$genscorestudentid[$sub]=$student[$z];//$details['studentid'];
		$genscore[$sub]=$details['score'];
		$avgscore[$sub]=($genscore[$sub]/$numb);
		
		mysqli_query($con,"insert into assessmentaverage values('$genscorestudentid[$sub]','$subject[$z]','$avgscore[$sub]')");
	}
}

//
//
//
//student average score transfers code end here.

?>