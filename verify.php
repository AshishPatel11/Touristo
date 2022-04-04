<?php
error_reporting(0);
include 'php/connection.php';

if (isset($_REQUEST['token'])) {

    $token = $_REQUEST['token'];

    $select = " SELECT * FROM user_tbl WHERE token = '$token' ";
    $tquery = mysqli_query($conn, $select);
    $fetch = mysqli_fetch_assoc($tquery);

    $update = " UPDATE user_tbl SET statuss='verify' WHERE token='$token'";
    $query = mysqli_query($conn, $update);

    if ($query && $fetch['token'] == $token) {
        echo "
        <script>
            alert(`Account verified succesfully!`);
            location.replace('login.php');
        </script>";
    } else {
        echo "
        <script>
            alert(`Account verification Failed! Try again!`);
            location.replace('signup.php');
        </script>";
    }
} else {
    echo "
        <script>
            alert(`Invalid User!`);
            location.replace('signup.php');
        </script>";
}
// dixit vara