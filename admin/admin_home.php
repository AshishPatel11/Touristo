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



// User count for admin home
$user = "SELECT * FROM user_tbl WHERE acc_typ = 'admin' OR acc_typ = 'guide' OR acc_typ = 'hotel'";
$userResult = mysqli_query($conn, $user);
$userCount = mysqli_num_rows($userResult);

// Package count for admin home
$package = "SELECT * FROM pckg_tbl";
$packageResult = mysqli_query($conn, $package);
$packageCount = mysqli_num_rows($packageResult);

// Booking count for admin home
$book = "SELECT * FROM book_tbl WHERE status = 'pending'";
$bookResult = mysqli_query($conn, $book);
$bookCount = mysqli_num_rows($bookResult);

// Enquiries count for admin home
$enquiry = "SELECT * FROM contactus WHERE reply = ''";
$enquiryResult = mysqli_query($conn, $enquiry);
$enquiryCount = mysqli_num_rows($enquiryResult);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_home.css">
    <link rel="stylesheet" href="./css/admin_nav.css">
</head>

<body>
    <?php

    include_once "admin_nav.php";

    ?>
    <section class="home">
        <div class="card-container">
            <div class="card">
                <a href="admin_modifyUser.php"><i class="material-icons">account_circle
                    </i></a>
                <h2><?php echo $userCount; ?></h2>
                <a href="admin_modifyUser.php">
                    <p>Users</p>
                </a>
            </div>
            <div class="card">
                <a href="admin_modifyPack.php"><i class="material-icons">perm_media</i></a>
                <h2><?php echo $packageCount; ?></h2>
                <a href="admin_modifyPack.php">
                    <p>Packages</p>
                </a>
            </div>
            <div class="card">
                <a href="">

                    <i class="material-icons">
                        list_alt
                    </i>
                </a>
                <h2><?php echo $bookCount; ?></h2>
                <a href="manage_book.php">
                    <p>Bookings</p>
                </a>
            </div>
            <div class="card">
                <a href="manage_enquiries.php"><i class="material-icons">contact_support</i></a>
                <h2><?php echo $enquiryCount; ?></h2>
                <a href="manage_enquiries.php">
                    <p>Enquiries</p>
                </a>
            </div>
        </div>
    </section>
</body>

</html>