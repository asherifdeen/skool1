<?php
session_start();
if(trim($_SESSION['username']=='') || (trim($_SESSION['password']) == '')) {
header("location:../index.php");
}
?>