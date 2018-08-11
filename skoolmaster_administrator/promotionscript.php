<?php
include("../systemfiles/connection.php");
include("endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];



if(isset($_POST['promote'])) {

	if ($_POST['promoteto']=='Graduate'){
		
		
		foreach($_POST['check'] as $selected){
		
			$studentid=($_POST['studentid'][$selected]);
			
				$getquery=mysqli_query($con,"select * from register where studentid='$studentid'");
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
				
				
				$insert=mysqli_query($con,"insert into graduate values('$studentid','$lastname','$firstname','$birthdate','$gender','$birthplace','$religion','$language','$dor','$habit','$class','$address','$previousschool','$reason','$guardianname','$guardiancontact','$guardianwork','$guardianaddress','$scholarship','$batch','$passport')");
				
				if ($insert)
					{
					
					mysqli_query($con,"delete from register where studentid='$studentid'");
					
					$_SESSION['result']="<div class='alert alert-info'><strong>Successful!</strong>The selected student has been promoted.</div>";
					header("Location: promotionenquery.php");	
					
					}
				
				else
					{
					
					$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> The selected students not promoted.</div>";
					header("Location: promotionenquery.php");	
					
					}
				
				
		
		}
	}
	else
	{
			foreach($_POST['check'] as $selected){
		
		
		
			$promoteto=$_POST['promoteto'];
			$studentid=($_POST['studentid'][$selected]);
			
			
			$query=mysqli_query($con,"update register set class='$promoteto' where studentid='$studentid' ");
			
			}
			if ($query)
				{
				
				$_SESSION['result']="<div class='alert alert-info'><strong>Successful!</strong>The selected student has been promoted.</div>";
				header("Location: promotionenquery.php");	
				
				}
			
			else
				{
				
				$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> The selected student not promoted.</div>";
				header("Location: promotionquery.php");	
				
				}
			}
		
		

}
?>