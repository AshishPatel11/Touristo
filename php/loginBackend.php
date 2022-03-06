<?php

include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $select = "SELECT * FROM `user_tbl` where emailid='$_POST[email]';";

    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    
    if ($count == 1 and password_verify($_POST['passwd'],$data['passwd']))
    {
        session_start();
        $_SESSION['uname'] = $data['uname'];
        echo "
            <script>
                alert(`Login Successful!! Welcome $_SESSION[uname]`);
                location.replace('main.php');
            </script>";
    } else {
        echo "
            <script>
                alert(`Invalid Credentials`);
            </script>";
    }
}
