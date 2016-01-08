<?php 
session_start(); 
$seubid=(string)session_id();
$server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));
echo "Successfully connected!";
$isbet=$_POST["isbet"];
$ascore=$_POST["bscore"];
$bscore=$_POST["ascore"];
$sql = "insert INTO dbo.game2 values('$isbet','$ascore','$bscore',CURRENT_TIMESTAMP,'$seubid')";
$query = sqlsrv_query($conn, $sql);
if ($query === false)
{  
	exit("<pre>".print_r(sqlsrv_errors(), true));
}
#while ($row = sqlsrv_fetch_array($query))
#	{  echo "<p>Hello, $row[ascore]!</p>";
#}
sqlsrv_free_stmt($query);

sqlsrv_close($conn);

?>