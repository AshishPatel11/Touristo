<?php
session_start();
include './php/connection.php';

$error = "";

if (isset($_POST['submit'])) {

    $_SESSION['email'] = $_POST['email'];

    $select = "SELECT * FROM user_tbl WHERE emailid = '$_SESSION[email]'";
    $query = mysqli_query($conn, $select);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        $_SESSION['otp'] = rand(100000, 999999);

        $subject = "OTP for reset password - Touristo";
        $body = "Hi,Here is your OTP for reset your password : $_SESSION[otp]";
        $headers = "From: varadixit@gmail.com";

        if (mail($_SESSION['email'], $subject, $body, $headers)) {
            echo "
            <script>
                alert(`OTP send! check your email!`);
                location.replace('otp.php');
            </script>";
        } else {

            echo "
            <script>
                alert(`Oops! OTP send failed.`);
                location.replace('forgetpassword.php');
            </script>";
        }
    } else {
        $error = 'No User found';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/otp.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home_nav.css">
    <link rel="stylesheet" href="./css/lode1.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
    <title>Forgot password?</title>
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
    <main>
        <div class='section1'>
            <form action="forgetpassword.php" method="post">
                <div class="heading">
                    <h2>Forgot password?</h2>
                    <p>Enter your email to reset your password.</p>
                </div>
                <div class="box">
                    <label for="emailbox">Email</label>
                    <input type="email" name="email" id="emailbox" required>
                    <span class="err"><?php echo $error; ?></span>
                </div>
                <div class="btn">
                    <input type="submit" value="Reset now" name="submit">
                </div>
            </form>
        </div>
    </main>
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