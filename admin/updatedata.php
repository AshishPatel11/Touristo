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
            $update = "UPDATE `user_tbl` SET uname='$nname',emailid='$nemail',phno='$nphno',acc_typ='$nacctype' WHERE uid='$userid'";

            $result = mysqli_query($conn, $update);

            if ($result) {
?>
                <script>
                    alert(`User data updated!`);
                    location.replace('admin_updateUser.php');
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
    <style>
        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        table th {
            background-color: #272b33;
            color: #fff;
            vertical-align: middle;
            padding-left: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="updatedata.php" method="post">
            <div class="heading">
                <h1>Update User</h1>
            </div>
            <br>
            <div class="input">
                <label for="uid">UserID</label>
                <input type="text" name="uid" id="uid" required>
            </div>
            <div class="input">
                <label for="uname">User name</label>
                <input type="text" name="uname" id="uname" required>
                <?php echo "$unameerr"; ?>
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input required type="email" name="email" id="email">
                <?php echo "$emailerr"; ?>

            </div>
            <div class="input">
                <label for="phno">Phone no</label>
                <input type="text" required name="phno" id="phno">
                <?php echo "$contacterr"; ?>

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
                    <br>
                    <div class="submit">
                        <input type="submit" value="Update" name="update">
                    </div>
                <br>
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
</body>

</html>