<?php

include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $select = "SELECT * FROM `user_tbl` where emailid='$_POST[email]' and passwd='$_POST[passwd]';";

    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($result);

    // $result = $conn->query($select);
    // $data = $result->fetch_assoc();

    if (mysqli_num_rows($result) > 0){
        echo "
            <script>
                alert(`Login Successful!! Welcome $data[uname]`);
                location.replace('home.php');
            </script>";
    } else {
        echo "
            <script>
                alert(`Invalid Credentials `);
            </script>";
    }
}
