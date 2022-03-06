<?php

include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $select = "SELECT * FROM `user_tbl` where emailid='$_POST[email]';";

    $result = $conn->query($select);
    $data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1 and password_verify($_POST['passwd'],$data['passwd']))
    {
        echo "
            <script>
                alert(`Login Successful!! Welcome $data[uname]`);
                location.replace('home.php');
            </script>";
    } else {
        echo "
            <script>
                alert(`Invalid Credentials, $conn->error`);
            </script>";
    }
}
