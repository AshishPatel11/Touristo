<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                <img class="user-img" src="../css/images/svg/user.svg" alt="">
                <img class="plus" src="../css/images/svg/plus.svg" alt="">
                <a href="admin_addUser.php" class="description">Add User</a>
            </div>
            <div class="card">
                <img class="user-img" src="../css/images/svg/user.svg" alt="">
                <img class="plus" src="../css/images/svg/minus.svg" alt="">
                <a href="admin_removeUser.php" class="description">Remove User</a>
            </div>
            <div class="card">
                <img class="user-img" src="../css/images/svg/user.svg" alt="">
                <img class="plus" src="../css/images/svg/edit.svg" alt="">
                <a href="admin_updateUser.php" class="description">Update User</a>
            </div>
            <div class="card">
                <img class="user-img" src="../css/images/svg/mountains.svg" alt="">
                <img class="plus" src="../css/images/svg/plus.svg" alt="">
                <a href="admin_addPack.php" class="description">Add Package</a>
            </div>
            <div class="card">
                <img class="user-img" src="../css/images/svg/mountains.svg" alt="">
                <img class="plus" src="../css/images/svg/minus.svg" alt="">
                <a href="admin_removePack.php" class="description">Remove Package</a>
            </div>
            <div class="card">
                <img class="user-img" src="../css/images/svg/mountains.svg" alt="">
                <img class="plus" src="../css/images/svg/edit.svg" alt="">
                <a href="admin_updatePack.php" class="description">Update Package</a>
            </div>
        </div>
    </section>
</body>

</html>