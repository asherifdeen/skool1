<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];




echo '<header class="panel-heading">';
echo  "List Of Students";
echo '</header>';
echo '<table class="table">';
echo            	'<thead>';
echo                	'<tr>';
echo                    	'<th># Check </th>';
echo                        '<th>Student ID</th>';
echo                        '<th>Student Name</th>';
echo						'<th>Class</th>';
echo                	'</tr>';
echo                '</thead>';

$q = strval($_GET['q']);

$query=mysqli_query($con,"select studentid,surname,studentname,class from register where class='$q' ORDER BY studentid ASC");

if (mysqli_num_rows($query)<1)
	{
	
	
	}
$i=0;
while($row=mysqli_fetch_array($query)){

		$studentid=$row['studentid'];
		$student=$row['surname']." ".$row['studentname'];
		$classs=$row['class'];
           
echo	'<tbody>'; 
echo     	'<tr>';
echo       		"<td><input name='check[]' type='checkbox' id='check' value='$studentid'></td>";
echo       		"<td>{$row['studentid']} <input type='hidden' name='studentid[$studentid]' value='$studentid'> </td>";
echo 			"<td>{$row['surname']} {$row['studentname']} <input type='hidden' name='studentname' value='$student'/></td>";
echo			"<td>{$row['class']} <input type='hidden' name='class' value='$class'></td>";
echo        '</tr>'; 
             
   
++$i;
}

echo	'</tbody>';
echo 	'</table>';


?>