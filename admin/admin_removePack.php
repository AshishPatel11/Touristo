<?php
session_start();
include '../php/connection.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Remove Package</title>
</head>
<body>
    <?php include_once "admin_nav.php";
    ?>
</body>
</html>