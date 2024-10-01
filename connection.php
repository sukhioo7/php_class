<?php

$username = 'root';
$password = '';
$database_name = 'fit_bande';
$server = 'localhost';

$conn = new mysqli($server, $username, $password, $database_name);

if ($conn->connect_error){
    echo "Failed to connect : $conn->connect_error";
}

?>