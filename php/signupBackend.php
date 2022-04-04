<?php

session_start();
include 'connection.php';
$nameerr = "";
$emailerr = "";
$numerr = "";
$numduperr = "";
$passerr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo
    "<style>
        .sec{
            display:none;
            pointer-events:none;
        }
        .nav-container{
            transform:translateY(-10px);
            background-color: #332f2f;
            color: rgb(255, 255, 255);
        }
        .nav-option a{
            color: rgb(255, 255, 255);
        }
        .burger div{
            background-color: rgb(255, 255, 255);
        }
    </style>";

    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $pass = mysqli_real_escape_string($conn, $_POST['passwd']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpasswd']);

    // Password hashing
    $phash = password_hash($pass, PASSWORD_BCRYPT);

    // Random token genrator
    $token = bin2hex(random_bytes(12));

    $emailquery = "SELECT * FROM user_tbl WHERE emailid = '$email'";
    $equery = mysqli_query($conn, $emailquery);
    $ecount = mysqli_num_rows($equery);

    $contactquery = "SELECT * FROM user_tbl WHERE phno = '$contact'";
    $cquery = mysqli_query($conn, $contactquery);
    $ccount = mysqli_num_rows($cquery);

    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        $nameerr = "<i class=material-icons>warning</i>Invalid Name!";
    } else {
        if ($ecount > 0) {
            $emailerr = "<i class=material-icons>warning</i>Email already Exist!";
        } else {
            if (!preg_match("/^[0-9]{10}+$/", $contact)) {
                $numerr = "<i class=material-icons>warning</i>Phone Number Must Be 10 Digits!";
            } else {
                if ($ccount > 0) {

                    $numduperr = "<i class=material-icons>warning</i>Number already Exist!";
                } else {

                    if (strlen($pass) < 8) {
                        $passerr = "<i class=material-icons>warning</i>Passwords should have at least 8 characters!";
                    } else {

                        if ($pass != $cpass) {
                            $passerr = "<i class=material-icons>warning</i>Passwords are not Matching!";
                        } else {

                            // Generates random user id
                            $uid = rand(100000, 1000000);

                            $insert = "INSERT INTO `user_tbl`(uid, uname, emailid, phno,passwd, token, statuss) VALUES ('$uid','$username','$email','$contact','$phash','$token','notverify')";

                            $result = mysqli_query($conn, $insert);

                            if ($result) {

                                $subject = "Email Verifivation - Touristo";
                                $body = "Hi, $username! Click this link to verify your account : http://localhost/Touristo/verify.php?token=$token";
                                $headers = "From: varadixit@gmail.com";

                                if (mail($email, $subject, $body, $headers)) {
                                    echo "
                                <script>
                                    alert(`Account created! Check your email to verify!`);
                                    location.replace('login.php');
                                </script>";
                                } else {

                                    echo "
                                <script>
                                    alert(`Oops!Email failed.`);
                                    location.replace('signup.php');
                                </script>";
                                }
                            } else {
                                echo
                                "<script>
                        alert(`Account Creation Failed, $conn->error`);
                        location.replce('signup.php');
                    </script>";
                            }
                        }
                    }
                }
            }
        }
    }
}
