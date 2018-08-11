<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style type="text/css">
body,td,th { background-color:#000;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: 12px;
	color:#0F0;
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


<?php

backup_tables('localhost','root','','schoolmaster_db');// change the database student to your own databnase name


/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysqli_connect($host,$user,$pass);
	mysqli_select_db($link,$name);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($link,'SHOW TABLES');
		while($row = mysqli_fetch_row($result))
		{
			$tables[] = $row[0];
		}
		
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysqli_query($link,'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysqli_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	
	$handle = fopen('backup.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
	
}

?>

<div style="text-align: center; margin-top: 50px; background:#000;">
Database Backup successfully<br>
Backup File can be found in
<?php
  $dir = dirname(__FILE__);
  echo $dir;
?>\backup.sql<br>
<a href="backup.sql" target="_blank" style="color:#0CF;">Download Backup</a>

</div>

</center>
</div>
</body>
</html>