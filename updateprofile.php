<?php
session_start();
include './php/connection.php';

$sql = "SELECT phno FROM `user_tbl` WHERE emailid = '$_SESSION[email]'";
$result = mysqli_query($conn, $sql);

$query = "SELECT * FROM user_tbl";
$result1 = mysqli_query($conn, $query);

$phno = mysqli_fetch_assoc($result);
$pcount = mysqli_num_rows($result1);

$err = $err1 = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phno']);

    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        $err = "Only letter and space allowed!";
    } else {
        if (!preg_match("/^[0-9]{10}+$/", $phone)) {
            $err1 = "Phone number must be 10 digits!";
        } else {

            $update = "UPDATE `user_tbl` SET uname='$username',phno='$phone' WHERE emailid = '$_SESSION[email]'";
            $run = mysqli_query($conn, $update);

            if ($run) {
?>
                <script>
                    alert(`Details updated!`);
                    location.replace('main.php');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert(`Failed to update!`);
                    location.replace('updateprofile.php');
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
    <title>Update profile</title>
    <link rel="stylesheet" href="./css/lode1.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
    <style>
        body {
            background-color: #1A1A1A;
        }

        .heading h2 {
            font-weight: 800;
            font-size: 34px;
            padding-bottom: 25px;
            color: white;
        }

        label {
            font-size: 19px;
            color: white;
        }

        input:not(.in-btn) {
            outline: none;
            font-size: 15px;
            border: 1.5px solid #c0c0c1;
            padding: 6px;
            border-radius: 6px;
            width: 24vw;
            margin: 12px;
            background-color: #ededed;
        }

        .btn input {
            padding: 6px 15px;
            margin-top: 8px;
            font-size: 14px;
            border: 1px solid black;
            border-radius: 6px;
            background-color: #404040;
            cursor: pointer;
            color: white;
            transition: background-color 0.4s;

        }

        .btn input:hover {
            color: black;
            background-color: white;
        }

        .main-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 84vh;
        }
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


    <!--==================================Formpart================================-->
    <div class="main-box">
        <div class="heading">
            <h2>Update your details</h2>
        </div>
        <div class="form">
            <form action="updateprofile.php" method="post">
                <table>
                    <tr>
                <div class="textbox">
                    <td>
                        <label for="name">Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name" value="<?php echo $_SESSION['uname']; ?>" required><?php echo $err; ?>
                    </td>
                </div>
                    </tr>
                    <tr>
                <div class="textbox">
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" disabled>
                    </td>
                </div>
                    </tr>
                    <tr>
                <div clas="textbox">
                    <td>
                        <label for="phno">Phone no.</label>
                    </td>
                    <td>
                        <input type="text" name="phno" id="phno" value="<?php echo $phno['phno']; ?>" required><?php echo $err1; ?>
                    </td>
                </div>
                    </tr>
            </table>
                <div class="btn">
                    <input type="submit" name="submit" class="in-btn" value="Update">
                </div>
            </form>
        </div>
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
</body>
<script src="./js/gsap.min.js"></script>
<!--linked the gsap javascript file-->
<script src="./js/ScrollTrigger.min.js"></script>
<!--linked the scrollTrigger javascript file-->
<script src="js/home_nav.js"></script>

</html>