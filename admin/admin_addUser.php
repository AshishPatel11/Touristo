<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_addUser.css">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Add User</title>
</head>

<body>
    <?php include_once "admin_nav.php";
    ?>

    <div class="admin-container">
        <form action="admin_addUser.php" method="post">
            <h1>Add User</h1>
            <div class="input-box">
                <label for="aname">Name</label>
                <input type="text" id="aname" name="aname" required>
            </div>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="contact">Phone no.</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-area">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="6"></textarea>
            </div>
            <div class="input-btn">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>