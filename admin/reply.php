<?php
session_start();
include '../php/connection.php';



if (isset($_GET['sr'])) {
    $sr = $_GET['sr'];
}

if (!isset($_SESSION['uname']) && !isset($_SESSION['acctyp'])) {
?>
    <script>
        alert(`Not Allowed login first!`);
        location.replace('../login.php');
    </script>
    <?php
} else {
    if ($_SESSION['acctyp'] != 'admin') {
    ?>
        <script>
            alert(`Not Allowed login first!`);
            location.replace('../login.php');
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <link rel="stylesheet" href="./css/admin_addUser.css">
    <link rel="stylesheet" href="../css/lode1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply</title>
</head>
<?php

include '../admin/admin_nav.php';

if (isset($_POST['submit'])) {

    $reply = $_POST['reply'];
    $srnop = $_POST['srnop'];

    $into = "UPDATE `contactus` SET `reply`= '$reply' WHERE `srno` = '$srnop' ";
    $result = mysqli_query($conn, $into);

    if ($result) {
        echo
        "<script>
                alert(`Reply sent!`);
            </script>";
    } else {
?>
        <script>
            alert(`Failed!`);
        </script>
<?php
    }
}

?>


<body onload="myFunction()">
    <div class="spinner" id="loader1">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <div class="container">
        <div class="heading">
            <h2>Reply</h2>
        </div>
        <div class="form">
            <form action="reply.php" method="post">
                <div class="input-box" style="pointer-events: none; opacity: 0;">
                    <input type="text" name="srnop" value="<?php echo $sr; ?>" required>
                </div>
                <div class="input-box">
                    <label for="reply">Reply</label>
                    <textarea name="reply" id="reply" cols="30" rows="10" require></textarea>
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="submit">
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
</script>

</html>