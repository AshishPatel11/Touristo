<?php

include 'connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $password = "";

    $select = "SELECT * FROM `user_tbl` where emailid='$_POST[email]' and passwd='$_POST[passwd]';";

    $result = $conn->query($select);
    $data = $result->fetch_assoc();

    if (mysqli_num_rows($result) > 0 and $data['emailid'] === $_POST['email'] && $data['passwd'] === $_POST['passwd']) {
        echo "
            <script>
                alert(`Login Successful!!Welcome $data[uname]`);
                location.replace('home.php');
            </script>";
    } else {
        echo "
            <script>
                alert(`Invalid Credentials`);
            </script>";
    }
}
