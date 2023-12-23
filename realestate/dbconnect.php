<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realestate";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("Connection erros! " . $conn->connect_error);
	}
else{
     //echo "Connection successful";
}

?>