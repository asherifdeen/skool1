<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];

if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into assessment (`studentid`,`class`, `term`,`academicyear`, `subject`,`category`,`score`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query($con,$sql );
				if(! $result )
				{
				
				$_SESSION['result']="<div class='alert alert-danger'><strong>Sorry!</strong> Invalid File: Please Upload CSV/Excel File.</div>";
				header("Location: classupload.php");
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         
	          $_SESSION['result']="<div class='alert alert-success'><strong>Sucessful!</strong> CSV File has been successfully Imported.</div>";
			header("Location: classupload.php");
			 

			 //close of connection
			mysql_close($conn); 
				
		 	
			
		 }
	}	 
?>		 