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
error_reporting(0);

include '../php/connection.php';

$unameerr = $emailerr = $contacterr = $err = "";

$uid = $_GET['id'];
$uname = $_GET['name'];
$email = $_GET['email'];
$phno = $_GET['phno'];
$ac = $_GET['acct'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userid = $_POST['uid'];
    $nname = $_POST['uname'];
    $nemail = $_POST['email'];
    $nphno = $_POST['phno'];
    $nacctype = $_POST['acctype'];

    // Main Validation
    if (!preg_match("/^[a-zA-Z ]*$/", $nname)) {
        $unameerr = "Only letter and space allowed!";
    } else {
        if (!preg_match("/^[0-9]{10}+$/", $nphno)) {
            $contacterr = "Phone number must be 10 digits!";
        } else {
            if (isset($acctype) && $acctype == "none") {
                $err = "Please select A/c type!";
            } else {
                $update = "UPDATE `user_tbl` SET uname='$nname',emailid='$nemail',phno='$nphno',acc_typ='$nacctype' WHERE uid='$userid'";

                $result = mysqli_query($conn, $update);

                if ($result) {
?>
                    <script>
                        alert(`User data updated!`);
                        location.replace('admin_modifyUser.php');
                    </script>
<?php
                } else {
                    echo
                    "<script>
                        alert(`User updating Failed! $conn->error`);
                        location.replace('admin_updatedata.php')
                </script>";
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
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <link rel="stylesheet" href="./css/admin_nav.css">
    <link rel="stylesheet" href="./css/admin_addUser.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
</head>

<body>
    <?php
        include '../admin/admin_nav.php';
    ?>
    <div class="admin-container">

        <div class="form-container6">
            <form action="updatedata.php" method="post">
                <div class="heading">
                    <h1>Update User</h1>
                </div>
                <div class="input-box">
                    <label for="uid">UserID</label>
                    <input type="text" name="uid" id="uid" required value="<?php echo $uid; ?>" disabled>
                </div>
                <div class="input-box">
                    <label for="uname">Username</label>
                    <input type="text" name="uname" id="uname" required>
                    <span class="err"><?php echo "$unameerr"; ?></span>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input required type="email" name="email" id="email">
                    <span class="err"><?php echo "$emailerr"; ?></span>

                </div>
                <div class="input-box">
                    <label for="phno">Phone no</label>
                    <input type="text" required name="phno" id="phno">
                    <span class="err"><?php echo "$contacterr"; ?></span>
                </div>
                <div class="input-box">
                    <label for="acctype"> New A/c type</label>

                    <select name="acctype" id="acctype" id="" required>
                        <option selected value="none"> --Select A/C type-- </option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="guide">Guide</option>
                        <option value="hotel">Hotel</option>
                    </select>
                    <span class="err"><?php echo "$err"; ?></span>

                </div>
                <div class="input-btn">
                    <input type="submit" value="Update" name="update">
                </div>
                <div class="table">
                    <h1>Old data</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Name</th>
                                <th>EmailID</th>
                                <th>Phone no.</th>
                                <th>A/c type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='active-row'>
                                <td><?php echo $uid; ?> </td>
                                <td><?php echo $uname; ?> </td>
                                <td><?php echo $email; ?> </td>
                                <td><?php echo $phno; ?> </td>
                                <td><?php echo $ac; ?> </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </form>
        </div>
    </div>
</body>

</html>