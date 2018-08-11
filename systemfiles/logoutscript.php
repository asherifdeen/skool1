<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Logout</title>

</head>
<body>
<?php
include("systemfiles/systemfiles/connection.php");
session_start();
unset($_SESSION['staffname']);
unset($_SESSION['password']);
unset($_SESSION['username']);
unset($_SESSION['system']);




header("location:../index.php");
?>

</body>
</html>