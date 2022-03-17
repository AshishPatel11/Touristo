<?php

include "../php/connection.php";

// error variable declaration for printing error
$unameerr = $emailerr = $contacterr = $passworderr = $addresserr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Assigning values to the variables
    $uid = rand(100000, 1000000);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Password hashing
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // Email fetching
    $emailquery = "SELECT * FROM admin_tbl WHERE emailid='$email'";
    $eresult = mysqli_query($conn, $emailquery);
    $ecount = mysqli_num_rows($eresult);

    // Phone no fetching
    $contactquery = "SELECT * FROM admin_tbl WHERE phno='$contact'";
    $cresult = mysqli_query($conn, $contactquery);
    $ccount = mysqli_num_rows($cresult);

    // Main Validation
    if (!preg_match("/^[a-zA-Z ]*$/", $uname)) {
        $unameerr = "Only letter and space allowed!";
    } else {
        if ($ecount > 0) {
            $emailerr = "Email already exist!";
        } else {
            if (!preg_match("/^[0-9]{10}+$/", $contact)) {
                $contacterr = "Phone number must be 10 digits!";
            } else {
                if ($ccount > 0) {
                    $contacterr = "Number already exist!";
                } else {
                    if ($password !== $cpassword) {
                        $passworderr = "Password are not matching";
                    } else {

                        $insert = "INSERT INTO admin_tbl(`uid`, `uname`, `emailid`, `phno`, `passwd`, `adrs`) VALUES ('$uid','$uname','$email','$contact','$hash','$address')";

                        $result = mysqli_query($conn, $insert);

                        if($result){
                            ?>
                                <script>
                                    alert(`User added!`);
                                </script>
                            <?php
                        }
                        else{
                            echo 
                                "<script>
                                    alert(`User adding Failed $conn->error`);
                                </script>";
                        }
                    }
                }
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
                <label for="uname">Name</label>
                <input type="text" id="uname" name="uname" required>
                <?php echo "$unameerr"; ?>
            </div>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <?php echo "$emailerr"; ?>
            </div>
            <div class="input-box">
                <label for="contact">Phone no.</label>
                <input type="text" id="contact" name="contact" required>
                <?php echo "$contacterr"; ?>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-box">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" required>
                <?php echo "$passworderr"; ?>
            </div>
            <div class="input-area">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="6" required></textarea>
                <?php echo "$addresserr"; ?>
            </div>
            <div class="input-btn">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>