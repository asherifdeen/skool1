<?php
$con=mysqli_connect("Localhost","root","") or die('Error connecting to server '. mysqli_error($con));

mysqli_select_db($con,"skool") or die ("Error communicating with Server. Please contact the system admin.");
?>