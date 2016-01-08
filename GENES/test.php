<?php 
session_start();
$seubid=session_id();

$currentWord=$_POST["currentWord"];
$click=$_POST["response"];
$currentWord=serialize($currentWord);

$server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));

$resp=$_POST["responsetime"];
$sql = "insert INTO dbo.game1 values(CURRENT_TIMESTAMP,'$seubid','$currentWord','$click')";
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