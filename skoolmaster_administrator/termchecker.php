<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];


$school=mysqli_query($con,"select * from school");

if (mysqli_num_rows($school)<1){

?>
<script>
	window.location="schoolsetup.php";
</script>
<?php

}
else
{
$query=mysqli_query($con,"select * from term");

$row=mysqli_fetch_array($query);

$academicyear=$row['academicyear'];
$termbegin=$row['begindate'];
$termend=$row['enddate'];


$checkclass=mysqli_query($con,"select * from classes");

if (mysqli_num_rows($checkclass)<1){
?>
<script>
	window.location="termandclasssetup.php";
</script>
<?php	
}
elseif($termend < date('m/d/yy')){
?>
<script>
	window.location="termonlysetup.php"
</script>
<?php
}
else{
?>
<script>
	window.location="dashboard.php"
</script>
<?php	
}	
}
?>