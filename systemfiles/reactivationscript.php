<?php
include("connection.php");
include("endsession.php");
session_start();
$staffnname=$_SESSION['staffname'];



$_SESSION['result']="<div class='alert alert-danger prompt'><strong>Sorry!</strong> Invalid activation code provided.</div>";
header("Location: reactivation.php");	
