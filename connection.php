<?php

$username = 'root';
$password = '';
$database = 'hospital';
$server_name = 'localhost';

$response = mysqli_connect($server_name,$username,$password,$database);

print_r($response);

?>