<?php
session_start();
include './php/connection.php';

$error1 = $error2 = $error3 = "";
if (isset($_POST['submit'])) {
    $otp = $_POST['otp'];
    $newpassword = $_POST['newpassword'];
    $conpassword = $_POST['conpassword'];

    // Password Hashing
    $hash = password_hash($newpassword, PASSWORD_BCRYPT);

    if ($_SESSION['otp'] != $otp) {
        $error1 = 'Invalid OTP!';
    } else {
        if (strlen($newpassword) < 8) {
            $error2 = 'Enter at least 8 characters!';
        } else {
            if ($newpassword !== $conpassword) {
                $error3 = "Passwords are not match";
            } else {

                $update = "UPDATE user_tbl SET `passwd`='$hash' WHERE emailid = '$_SESSION[email]'";

                $run = mysqli_query($conn, $update);

                if ($run) {
?>
                    <script>
                        alert(`Password reset successfully!`);
                        location.replace('login.php');
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert(`Failed to reset password!`);
                        location.replace('otp.php');
                    </script>
<?php
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/otp.css">
    <link rel="stylesheet" href="./css/home_nav.css">
    <link rel="stylesheet" href="./css/lode1.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body onload="myFunction()">
    <?php

    include_once 'main_nav.php';
    ?>
    <div class="spinner" id="loader1">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <div class="section1">
        <form action="otp.php" method="post">

            <div class="heading">
                <h2>Reset Password</h2>
            </div>
            <div class="box">
                <label for="otp">OTP</label>
                <input type="password" name="otp" id="otp" required>
                <span class="err"><?php echo $error1 ?></span>
            </div>
            <div class="box">
                <label for="newpass">New password</label>
                <input type="password" name="newpassword" id="newpass" required>
                <span class="err"><?php echo $error2 ?></span>
            </div>
            <div class="box">
                <label for="conpass">Confirm password</label>
                <input type="password" name="conpassword" id="conpass" required>
                <span class="err"><?php echo $error3 ?></span>
            </div>
            <div class="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>
<script>
    var preloader = document.getElementById('loader1');

    function myFunction() {
        preloader.style.display = 'none';
    }
    $(".profile").click(function() {
        $(".profile-container").fadeIn("slow").css("display", "flex");
        $(".close").click(function() {
            $(".profile-container").fadeOut("slow");
        });
    });
    $(".profile").click(function() {
        $(".profile-container").fadeIn("slow").css("display", "flex");
        $(".close").click(function() {
            $(".profile-container").fadeOut("slow");
        });
    });
</script>
<script src="./js/gsap.min.js"></script>
<!--linked the gsap javascript file-->
<script src="./js/ScrollTrigger.min.js"></script>
<!--linked the scrollTrigger javascript file-->
<script src="js/home_nav.js"></script>

</html>