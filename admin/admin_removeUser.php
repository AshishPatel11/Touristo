<?php

include '../php/connection.php';
$searcherr = "";
$userdetails = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['search'])) {
        $searcherr = "Enter UserID";
    } else {
        $search = "SELECT * FROM user_tbl WHERE uid='$_POST[search]'";
        $result = mysqli_query($conn, $search);
        $data = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0) {
            $userdetails =
                "<table class='styled-table'>
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
                            <td>$data[uid]<td>
                            <td>$data[uname]<td>
                            <td>$data[emailid]<td>
                            <td>$data[phno]<td>
                            <td>$data[acc_typ]<td>
                        </tr>
                    </tbody>
                </table>";
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
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">

    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Remove User</title>
    
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
    <?php include_once "admin_nav.php";
    ?>
    <div class="container">
        <center>
            <h1>Remove user</h1>
            <form action="admin_removeUser.php" method="post">
                <label for="uid">Enter UserID </label>
                <input type="text" name="search" id=""><?php echo $searcherr; ?><br><br>
                <input type="submit" value="Search">
            </form>
        </center>
        <?php echo $userdetails; ?>
    </div>

</body>

</html>