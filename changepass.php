<?php
session_start();
include './php/connection.php';

if (isset($_SESSION['uid'])) {

    $uid = $_SESSION['uid'];
} else {
?>
    <script>
        alert(`Please login!`);
        location.replace('login.php');
    </script>
    <?php
}
$err = $oerr = "";

$passwordquery = " SELECT passwd FROM user_tbl WHERE uid = '$uid'";
$result = mysqli_query($conn, $passwordquery);
$pcount = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $oldpass = mysqli_real_escape_string($conn, $_POST['oldpass']);
    $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

    // New password hashing
    $hashnew = password_hash($newpass, PASSWORD_BCRYPT);

    if (!password_verify($oldpass, $data['passwd'])) {
        $oerr = 'Please enter correct password!';
    } else {
        if ($newpass !== $cpass) {
            $err = 'Password are not matching!';
        } else {
            $update = " UPDATE `user_tbl` SET `passwd`='$hashnew' WHERE uid = '$uid' ";
            $updateresult = mysqli_query($conn, $update);

            if ($updateresult) {
    ?>
                <script>
                    alert(`Password Changed!`);
                    location.replace('logout.php');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert(`Password Changing Failed!`);
                </script>
<?php
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/changepass.css">
    <link rel="stylesheet" href="./css/lode1.css">
    <title>Touristo - <?php if (isset($_SESSION['uname'])) {
                            echo $_SESSION['uname'];
                        } ?></title>
    <link rel="stylesheet" href="./css/home_nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
</head>

<body onload="myFunction()">
<?php include_once 'main_nav.php';?>
    <div class="spinner" id="loader1">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <div class="container">
        <form action="changepass.php" method="post">

            <div class="heading">
                <h2>Change Password</h2>
            </div>
            <div class="textbox">
                <label for="oldpass">Old Password</label>
                <input type="password" name="oldpass" id="oldpass" required>
                <p class='err'><?php echo $oerr; ?></p>
            </div>
            <div class="textbox">
                <label for="newpass">New Password</label>
                <input type="password" name="newpass" id="newpass" required>
            </div>
            <div class="textbox">
                <label for="cpass">Confirm Password</label>
                <input type="password" name="cpass" id="cpass" required>
                <p class='err'><?php echo $err; ?></p>
            </div>
            <div class="button1">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>

    <script>
        var preloader = document.getElementById('loader1');

        function myFunction() {
            preloader.style.display = 'none';
        }
    </script>
</body>
<script src="./js/home_nav.js"></script>

</html>