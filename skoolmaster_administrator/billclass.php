<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];




echo '<table class="table table-hover">';
echo            	'<thead>';
echo                	'<tr>';
echo                    	'<th># </th>';
echo                        '<th>Student ID</th>';
echo                        '<th>Student Name</th>';
echo						'<th>Class</th>';
echo                	'</tr>';
echo                '</thead>';

$q = strval($_GET['q']);

$query=mysqli_query($con,"select studentid,surname,studentname,class from register where class='$q' and scholarship='No' ORDER BY studentid ASC");

if (mysqli_num_rows($query)<1)
{
	
echo "<div class='alert alert-danger'><strong>Sorry!</strong> There is no student for the selected class.</div>";

exit();
}
$i=0;
while($row=mysqli_fetch_array($query)){

		$studentid=$row['studentid'];
		$studentname=$row['surname']." ".$row['studentname'];
		$classs=$row['class'];
           
echo	'<tbody>'; 
echo     	'<tr>';
echo       		"<td><input name='check[]' type='checkbox' id='check' value='$studentid'></td>";
echo       		"<td>{$row['studentid']} <input type='hidden' name='studentid[$studentid]' value='$studentid'> </td>";
echo 			"<td>{$row['surname']} {$row['studentname']} <input type='hidden' name='studentname[$studentid]' value='$studentname'/></td>";
echo			"<td>{$row['class']} <input type='hidden' name='class' value='$class'></td>";
echo        '</tr>'; 
             
   
++$i;
}

echo	'</tbody>';
echo 	'</table>';

echo "<div class='col-lg-3'>";?>
	<input type="checkbox" name="all" id="all" onClick="return checkall('check[]');">  Check all
    <?php
echo "</div>";
?>