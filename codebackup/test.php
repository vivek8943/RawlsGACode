
<?php
$host ="bamsql2"; 
$servername = "bamsql2.ba.ttu.edu";
$username ="Genes";
$password ="Genes12";
$database ="Genes";

mssql_connect($host, $username, $password);
mssql_select_db($database);
$query ="SELECT * FROM info";
?>