<?php
error_reporting(0);

include '../php/connection.php';
include '../admin/admin_nav.php';

$unameerr = $emailerr = $contacterr = "";

$uid = $_GET['id'];
$uname = $_GET['name'];
$email = $_GET['email'];
$phno = $_GET['phno'];
$ac = $_GET['acct'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
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
            $update = "UPDATE user_tbl SET `uname`='$nname',`emailid`='$nemail',`phno`='$nphno',`acc_typ`='$nacctype' WHERE uid=$uid";

            $result = mysqli_query($conn, $update);

            if ($result) {
?>
                <script>
                    alert(`User data updated!`);
                </script>
<?php
            } else {
                echo
                "<script>
                        alert(`User updating Failed! $conn->error`);
                </script>";
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
    <link rel="stylesheet" href="./css/admin_home.css">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
</head>

<body>
    <div class="container">
        <form action="updatedata.php" method="post">
            <div class="heading">
                <h1>Update User</h1>
            </div>
            <br>
            <div class="input">
   
                <?php echo $uid; ?><br>
                <label for="uname">User name</label>
                <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" required>
                <?php echo "$unameerr"; ?>
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input required value="<?php echo $email; ?>" type="email" name="email" id="email">
                <?php echo "$emailerr"; ?>

            </div>
            <div class="input">
                <label for="phno">Phone no</label>
                <input type="text" required name="phno" id="phno" value="<?php echo $phno; ?>">
                <?php echo "$contacterr"; ?>

            </div>
            <div class="input">
                <label for="acc">Old A/c type : </label>
                <?php echo $ac; ?>
            </div>
            <div class="input">
                <label for="acctype"> New A/c type</label>

                <select name="acctype" id="acctype" id="" required>
                    <option disabled selected>--Select A/C type--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="guide">Guide</option>
                    <option value="hotel">Hotel</option>
                </select>
            </div>
            <center>
                <br>
                <div class="submit">
                    <input type="submit" value="Update" name="update">
                </div>
            </center>

        </form>
    </div>
</body>

</html>