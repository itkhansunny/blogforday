<?php 
$server     = "localhost";
$username   = "root";
$password   = "";
$database   = "phpdblog";

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error){
    die("Unsuccessful connection". $conn->connect_error);
}