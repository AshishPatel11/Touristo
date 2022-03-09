<?php

$subject = "Email Verifivation - Touristo";
$body = "Hi, $username! Click this link to verify your account : http://localhost/Touristo/verify.php?token=$token";
$headers = "From: varadixit@gmail.com";

if (mail($email, $subject, $body, $headers)) {
    $_SESSION['msgbox'] = "Check your email $email to verify your account!";
} else {
    echo "Mail failed";
}
