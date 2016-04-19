<?php
/* Specify the server and connection string attributes. */
$serverName = "bamsql2";

/* Get UID and PWD from application-specific files.  */
$uid = genes;
$pwd = Genes12;
$connectionInfo = array( "UID"=>$uid,
                         "PWD"=>$pwd,
                         "Database"=>"genes");

/* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false )
{
     echo "Unable to connect.</br>";
     die( print_r( sqlsrv_errors(), true));
}

echo "connected";

?>