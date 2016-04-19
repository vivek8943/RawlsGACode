<?php 
session_start();


$SubjectId=$_POST["SubjectId"];
$server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));
echo "Successfully connected!";
$isbet=$_POST["isbet"];
$ascore=$_POST["ascore"];
$bscore=$_POST["bscore"];
$tempa=$_POST["tempa"];
$tempb=$_POST["tempb"];
$amount=$_POST["amount"];
$whowon=$_POST["whowon"];
$_SESSION["isbet"]=$isbet;
$_SESSION["ascore"]=$ascore;
$_SESSION["bscore"]=$bscore;
$_SESSION["SubjectId"]=$SubjectId;


$sql = "insert INTO dbo.game2 values('$isbet','$ascore','$bscore',CURRENT_TIMESTAMP,'$SubjectId','$tempa','$tempb','$amount','$whowon')";
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