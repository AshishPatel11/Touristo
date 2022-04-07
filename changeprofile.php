<?php
session_start();
if (isset($_POST['submit'])) {
    $file = $_FILES['profile'];

    $fileName = $_FILES['profile']['name'];
    $fileTmpname = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileErr = $_FILES['profile']['error'];
    $filetype = $_FILES['profile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActExt, $allowed)) {
        if ($fileErr === 0) {
            $fileNameNew = $_SESSION['uid'] . ".jpg";

            $fileDestination = 'profiles/' . $fileNameNew;
            move_uploaded_file($fileTmpname, $fileDestination);
            header("Location: main.php?profileImageChanged");
        } else {
            echo "error uploading image";
        }
    } else {
        echo "extension not matched";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image</title>
    <link rel="stylesheet" href="./css/lode1.css">
    <title>Touristo - <?php if (isset($_SESSION['uname'])) {
                            echo $_SESSION['uname'];
                        } ?></title>
    <link rel="stylesheet" href="./css/home_nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
    <style>
        input::file-selector-button {
            background-color: #0095ff;
            border: 1px solid transparent;
            border-radius: 3px;
            box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.15385;
            margin: 0;
            outline: none;
            padding: 8px .8em;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            white-space: nowrap;
        }

        input::file-selector-button:hover,
        input::file-selector-button:focus {
            background-color: #07c;
        }

        input::file-selector-button:focus {
            box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
        }

        input::file-selector-button:active {
            background-color: #0064bd;
            box-shadow: none;
        }

        body {
            background-image: url("./css/images/bg_rsp.jpg");
            background-repeat: no-repeat;
            width: 100vw;
            height: 100vh;
            background-size: cover;
        }

        input[type=submit]:hover {
            background-color: #21242a;
            border-radius: 4px;
            color: white;
        }

        .button1 [type=submit] {
            width: 100%;
            background-color: #2f333d;
            color: white;
            padding: 14px 20px;
            font-size: 15px;
            margin: 8px 0px 20px 0px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        * {
            font-family: poppins, sans-serif;
        }

        .textbox input {
            width: 100%;
            font-size: 15px;
            padding: 5px 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container {
            position: absolute;
            display: flex;
            width: 40vw;
            height: 50vh;
            align-items: center;
            margin-top: 7%;
            margin-left: 29%;
            margin-right: 30%;
            justify-content: center;
            flex-direction: column;
            border-radius: 10px;
            background-color: white;
            padding: 20px 40px;
        }

        /* ==============================================================================
                                  Responsive burgermenu
============================================================================== */

        @media screen and (max-width: 900px) {
            .container {
                position: absolute;
                width: 60vw;
                margin: 5% 20%;
            }
        }

        @media screen and (max-width: 730px) {
            .container {
                position: absolute;
                width: 60vw;
                margin: 10% 20%;
            }

            .container h2 {
                font-size: 20px;
            }

            .container label {
                font-size: 15px;
            }

            .button1 input[type=submit] {
                font-size: 0.8rem;
            }
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
    <div class="container">
        <div class="heading">

            <h2>Choose Profile</h2>
        </div>
        <div class="form">
            <form action="changeprofile.php" method="POST" enctype="multipart/form-data">
                <div class="textbox">
                    <input type="file" class="button-7" name="profile">
                </div>
                <div class="button1">
                    <button type="submit" name="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
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
</body>

</html>