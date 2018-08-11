
<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
session_start();
$staffnname=$_SESSION['staffname'];
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Processor</title>
<!-- Bootstrap CSS -->    
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../resources/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../resources/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../resources/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../resources/css/style.css" rel="stylesheet">
    <link href="../resources/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
      <script src="../resources/js/respond.min.js"></script>
      <script src="../resources/js/lte-ie7.js"></script>
    <![endif]-->

<style>
#load{ margin-top:20%;
text-align:center;
display:none;
}
</style>

<script>
function data(){
$("#load").fadeIn();
var request;
if(window.XMLHttpRequest){
	request=new XMLHttpRequest();
}else{
request=ActiveXObject("Microsoft.XMLHTTP");	
}

request.open('GET','import.php',true);

request.onreadystatechange=function(){
	if(request.readyState===4 && request.status==200) {
$("#load").hide();
alert("Data Successfully Restored");
window.location="../schoolmaster_administrator/dashboard.php";
}
/*var doc=document.getElementById('here');
doc.innerHTML=request.responseText;*/
}
request.send();
}

</script>


</head>

<body onLoad="data()">
<div id="load">
Please Wait......<br/>
<img src="../resources/img/Loading.gif"><br/>
 System is Restoring Data
</div>

 <!-- javascripts -->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../resources/js/jquery.scrollTo.min.js"></script>
    <script src="../resources/js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../resources/js/scripts.js"></script>


</body>
</html>