<?php
$username = 'root';
$password = '';
$database_name = 'hospital';
$server_name = 'localhost';

$connection = mysqli_connect($server_name,$username,$password,$database_name);

// print_r($response);
if (!$connection){
    echo "Can't Connect to Database";
}

?>