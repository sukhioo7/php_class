<?php

$username = 'root';
$password = '';
$database = 'hospital';
$server_name = 'localhost';

$response = mysqli_connect($server_name,$username,$password,$database);

if (!$response){
    echo 'Can not connect to database';
}

?>