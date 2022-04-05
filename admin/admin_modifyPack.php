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
    <link rel="stylesheet" href="./css/admin_addUser.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Update Package</title>
</head>
<body>
    <?php include_once "admin_nav.php";
    ?>
</body>
<?php
                $packageFetch = "SELECT * FROM `pckg_tbl`";

                $result = mysqli_query($conn, $packageFetch);
                $count = mysqli_num_rows($result);

?>
<div class="form-container1">

        <h1>Modify user</h1>

        <div>
            <table class='styled-table'>
                <thead>
                    <tr>
                        <th>UserID</th>
                        <th>Name</th>
                        <th>EmailID</th>
                        <th>Phone no.</th>
                        <th>A/c type</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    if ($result->num_rows > 0) {

                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                            <tr class='active-row'>
                                <td><?php echo $data['uid']; ?> </td>
                                <td><?php echo $data['uname']; ?> </td>
                                <td><?php echo $data['emailid']; ?> </td>
                                <td><?php echo $data['phno']; ?> </td>
                                <td><?php echo $data['acc_typ']; ?> </td>
                                <td><a href="deletedata.php?id=<?php echo $data['uid']; ?>"><input type="submit" value="Delete" name="delete" onclick='return deletedata()'></a>
                                    <a href="updatedata.php?id=<?php echo $data['uid']; ?>&name=<?php echo $data['uname']; ?>&email=<?php echo $data['emailid']; ?>&phno=<?php echo $data['phno']; ?>&acct=<?php echo $data['acc_typ']; ?>">
                                        <input type="submit" value="Update" name="update" onclick='return upadatedata()'></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo "No data found";
                        ?>
                        <script>
                            alert(`No Data!`);
                        </script>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</html>