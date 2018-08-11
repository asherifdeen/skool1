<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

$academicyear=$_POST['academicyear'];
$term=$_POST['term'];
$class=$_POST['class'];

function addOrdinalNumberSuffixSubpos($numb){
	if(!in_array(($numb % 100),array(11,12,13))){
	switch($numb % 10){
	case 1: return $numb.'st';
	case 2: return $numb.'nd';
	case 3: return $numb.'rd';
	}
	}
	return $numb.'th';
	}


function addOrdinalNumberSuffixClasspos($num){
	if(!in_array(($num % 100),array(11,12,13))){
	switch($num % 10){
	case 1: return $num.'st';
	case 2: return $num.'nd';
	case 3: return $num.'rd';
	}
	}
	return $num.'th';
	}


//clear general score table to processed with analysis
mysqli_query($con,"delete from generalscore");
//clearing ends here


//clear subjectposition table to processed with analysis
mysqli_query($con,"delete from subjectposition");
//clearing ends here

//clear classaverage table to processed with analysis
mysqli_query($con,"delete from classaverage");
//clearing ends here

//clear classposition table to processed with analysis
mysqli_query($con,"delete from classposition");
//clearing ends here


//student score transfers code start....... 
//
//

$c=0;
$getexams=mysqli_query($con,"select * from exams where class='$class' and term='$term' and academicyear='$academicyear' order by studentid ASC");

if(mysqli_num_rows($getexams)<1){
	
$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> No matching records found.</div>";
header("Location: termlyaveragereportenquery.php");	

}

while($exams=mysqli_fetch_array($getexams)){
	$c++;
	$getstudentid[$c]=$exams['studentid'];
	$getclass[$c]=$exams['class'];
	$getterm[$c]=$exams['term'];
	$getacademicyear[$c]=$exams['academicyear'];
	$getsubject[$c]=$exams['subject'];
	$getcategory[$c]=$exams['category'];
	$getscore[$c]=$exams['score'];

	
$getass=mysqli_query($con,"select score from assessment where studentid='$getstudentid[$c]' and class='$getclass[$c]' and term='$getterm[$c]' and academicyear='$getacademicyear[$c]' and subject='$getsubject[$c]' and category='$getcategory[$c]'");

$score=mysqli_fetch_array($getass);
$assscore=0.4 * $score['score'];
$examsscore=0.6 * $getscore[$c];

$totalscore=$assscore + $examsscore;

$sqlgeneralscore=mysqli_query($con,"insert into generalscore values('$getstudentid[$c]','$getclass[$c]','$getterm[$c]','$getacademicyear[$c]','$getsubject[$c]','$getcategory[$c]','$totalscore')");
}

//
//
//
//student score transfers code end here.



//student subject position code start....... 
//
//

$getsubject=mysqli_query($con,"select DISTINCT subject from generalscore where class='$class' and term='$term' and academicyear='$academicyear'");

$r=0;

while($rw=mysqli_fetch_array($getsubject)){
	
	$r++;
	$subject[$r]=$rw['subject'];
	
	
	$getscore=mysqli_query($con,"select studentid,subject,totalscore from generalscore where subject='$subject[$r]' order by totalscore DESC");
	$count=mysqli_query($con,"select * from generalscore where subject='$subject[$r]'");
	$numb=mysqli_num_rows($count);
	
	
	

	$sub=0;
	while($details=mysqli_fetch_array($getscore))
	{
	$sub++;
	$posstudentid[$sub]=$details['studentid'];
	$possubject[$sub]=$details['subject'];
	$postotalscore[$sub]=$details['totalscore'];
	$posposition[$sub]=addOrdinalNumberSuffixSubpos($sub);
	
	mysqli_query($con,"insert into subjectposition values('$posstudentid[$sub]','$possubject[$sub]','$posposition[$sub]')");
	
	
	}
	
	
	
}

//
//
//
//student subject position code end here.




//student average score transfer code start....
//
//
$getstudent=mysqli_query($con,"select DISTINCT studentid from generalscore where class='$class' and term='$term' and academicyear='$academicyear'");

$z=0;
while($classrow=mysqli_fetch_array($getstudent)){
	
	$z++;
	$student[$z]=$classrow['studentid'];
	
	
	$getscore=mysqli_query($con,"select sum(totalscore) as score from generalscore where studentid='$student[$z]'");
	
	$countrecords=mysqli_query($con,"select * from generalscore where studentid='$student[$z]'");
	
	$numb=mysqli_num_rows($countrecords);
	
	$sub=0;
	while($details=mysqli_fetch_array($getscore))
	{
		$sub++;
		$genscorestudentid[$sub]=$student[$z];//$details['studentid'];
		$genscore[$sub]=$details['score'];
		$avgscore[$sub]=($genscore[$sub]/$numb);
		
		mysqli_query($con,"insert into classaverage values('$genscorestudentid[$sub]','$avgscore[$sub]')");
	}
}

//
//
//
//student average score transfers code end here.



//student class position code start....
//
//

$getstudentavg=mysqli_query($con,"select studentid,averagescore from classaverage order by averagescore DESC");

$stav=0;

while($stavrow=mysqli_fetch_array($getstudentavg)){
	
	$stav++;
	$studentid[$stav]=$stavrow['studentid'];
	$averagescore[$stav]=$stavrow['averagescore'];
	$posaverage[$stav]=addOrdinalNumberSuffixClasspos($stav);
	
	if($posaverage[$stav]!=$posaverag[$stav-1]){
		
	}
	else
	{ 	
	$posaverage[$stav]=$posaverage[$stav-1];
	}
	
	mysqli_query($con,"insert into classposition values('$studentid[$stav]','$posaverage[$stav]')");
	}
	

//
//
//
//student class position code end here.
?>