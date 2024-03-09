<?php

$host = "localhost";
$database = "php_hospital";
$username = 'root';
$password = '';

$response = mysqli_connect($host,$username,$password,$database);

if (!$response){
    echo "Not connected to database";
}
 
?>