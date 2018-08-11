<?php
include("../systemfiles/connection.php");
include("../systemfiles/endsession.php");
error_reporting(0);
session_start();
$staffnname=$_SESSION['staffname'];



$q = strval($_GET['q']);

$query=mysqli_query($con,"select * from fees where feedescription='$q'");

$row=mysqli_fetch_array($query);

echo "<div class='col-lg-2'>";
echo "<input type='text' class='form-control input-sm' name='feeamount' id='feeamount' value='$row[feeamount]' readonly>";
echo "</div>";

echo "<div class='col-lg-2'>";
echo "<select class='form-control input-sm' name='term' id='term'>";
echo "<option value=''>Select Term</option>";
echo "<option value='First Term'>First Term</option>";
echo "<option value='Second Term'>Second Term</option>";
echo "<option value='Third Term'>Third Term</option>";
echo "</select>"; 
echo "</div>";

echo "<div class='col-lg-2'>";
echo "<input type='text' class='form-control input-sm' name='academicyear' id='academicyear' placeholder='Academic Year'>";
echo "</div>";
                                           
echo "<div class='col-lg-2'>";
echo "<select class='form-control input-sm' name='class' id='class' onChange='billclass(this.value)'>";
echo "<option value=''>Select Class</option>";
	$query=mysqli_query($con,"select DISTINCT classname from classes order by classid ASC");
        while ($class=mysqli_fetch_array($query)){
			?>
			<option value="<?php echo $class['classname'];?>"><?php echo $class['classname'];?></option>
            <?php
            }
echo "</select>";   
echo "</div>";
?>