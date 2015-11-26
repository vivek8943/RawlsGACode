<?php $serverName = "bamsql2.ba.ttu.edu";
$username = "genes";
$password = "Genes12";
$database = "genes";
#DO NOT EDIT BELOW THIS LINE
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>