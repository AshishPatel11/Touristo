<?php
session_start();
include_once './php/connection.php';

$sr = $_GET['serial'];
$set = "UPDATE contactus SET status = 'seen' WHERE srno = '$sr'";
$run = mysqli_query($conn, $set);
header('location:main.php');
?>