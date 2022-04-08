<?php

session_start();
include './php/connection.php';

if (!isset($_SESSION['uname'])) {
?>
    <script>
        alert(`Please login first!`);
        location.replace('login.php');
    </script>
    <?php
}
$msgerr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = $_POST['message'];

    if (empty($msg)) {
        $msgerr = 'Please enter message or queries!';
    } else {

        $sql = "INSERT INTO `contactus`(`user`, `email`, `message`) VALUES ('$_SESSION[uname]','$_SESSION[email]','$_POST[message]')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
    ?>
            <script>
                alert(`Response sent!`);
                location.replace('main.php');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert(`Failed!`);
            </script>
<?php
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
    <title>Contact Us -<?php if (isset($_SESSION['uname'])) {
                            echo $_SESSION['uname'];
                        } ?></title>
    <link rel="stylesheet" href="./css/home_nav.css">
    <link rel="stylesheet" href="./css/lode1.css">
    <link rel="stylesheet" href="./css/contactus.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
    <style>
       
    </style>
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
        <div class="dots1">
        </div>
        <div class="dots2">
        </div>
        <div class="mainsection grid">
            <div class="firstcontainer">
                <h2>Contact Us</h2>
                <p>Need to get in touch with us?Fill out the form with your inquiry.Put your queries, inquiries or
                    suggestions in the message box.</p>
            </div>
            <div class="secondcontainer">
                <form action="contactus.php" method="post">

                    <div class="txtbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $_SESSION['uname']; ?>" disabled>
                    </div>
                    <div class="txtbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required value="<?php echo $_SESSION['email']; ?>" disabled>
                    </div>
                    <div class="txtbox">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="19" rows="4" required placeholder="Maximum 100 words only"></textarea>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
<script src="./js/gsap.min.js"></script>
<!--linked the gsap javascript file-->
<script src="./js/ScrollTrigger.min.js"></script>
<!--linked the scrollTrigger javascript file-->
<!-- <script src="js/home_nav.js"></script> -->
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

</html>