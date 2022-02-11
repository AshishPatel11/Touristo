<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "touristo";

$conn = new mysqli($server,$user,$password,$database);

if($conn->connect_error)
{
    die("Failed $connect_error");
}

?>