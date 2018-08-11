<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style type="text/css">
body,td,th { background-color:#000;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: 12px;
	color:#0F6;
}

a {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>

</head>
<body>
<div id="container">

<center> 
 
 
<div style="display: none;">
<?php


// new data
//$file=$_FILES['image']['tmp_name'];
	//$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	//$image_name= addslashes($_FILES['image']['name']);
	//$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		//move_uploaded_file($_FILES["image"]["tmp_name"],"" . $_FILES["image"]["name"]);

$filename='backup.sql';

$mysqli_host = 'localhost';
$mysqli_username = 'root';
$mysqli_password = '';
$mysqli_database = 'schoolmaster_db';// change the database student to your own databnase name

// Connect to MySQL server
$con=mysqli_connect($mysqli_host, $mysqli_username, $mysqli_password) or die('Error connecting to MySQL server: ' . mysqli_error($con));
// Select database
mysqli_select_db($con,$mysqli_database) or die('Error selecting MySQL database: ' . mysqli_error($con));
mysqli_query($con,"SET NAMES 'utf8'");
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($con,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($con) . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
?>
</div>
<div style="text-align: center; margin-top: 50px; background:#000;"><br /><br />
 Data Restored Successfully<br>
 <br /><br />
 </div>
 
 </center>
</div>
</body>
</html>