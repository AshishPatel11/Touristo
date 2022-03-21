<?php
// session_start();
include 'connection.php';
$loginerr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $select = "SELECT * FROM `user_tbl` WHERE emailid='$_POST[email]' AND statuss='verify'";

    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1 and password_verify($_POST['passwd'], $data['passwd'])) {
        if ($data['acc_typ'] == 'admin') {
            echo "
            <script>
                alert(`Login Successful!! Welcome $data[uname]`);
                location.replace('./admin/admin_home.php');
            </script>";
        } else {

            $_SESSION['uname'] = $data['uname'];
            $_SESSION['uid'] = $data['uid'];
            echo "
            <script>
            alert(`Login Successful!! Welcome $_SESSION[uname]`);
            location.replace('main.php');
            </script>";
        }
    } else {
        $loginerr = "<i class=material-icons>warning</i>Wrong Emailid or Password!";
    }
}
