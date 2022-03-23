<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Update User</title>
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
            <h1>Update User</h1>
            <br>

            <table>
                <thead>
                    <tr>
                        <th>UserID</th>
                        <th>Name</th>
                        <th>EmailID</th>
                        <th>Phone no.</th>
                        <th>A/c type</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include '../php/connection.php';

                    $search = "SELECT * FROM `user_tbl`";
                    $result = mysqli_query($conn, $search);

                    if ($result->num_rows > 0) {

                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                            <tr class='active-row'>
                                <td><?php echo $data['uid']; ?> </td>
                                <td><?php echo $data['uname']; ?> </td>
                                <td><?php echo $data['emailid']; ?> </td>
                                <td><?php echo $data['phno']; ?> </td>
                                <td><?php echo $data['acc_typ']; ?> </td>
                                <td><a href="updatedata.php?id=<?php echo $data['uid']; ?>&name=<?php echo $data['uname']; ?>&email=<?php echo $data['emailid']; ?>&phno=<?php echo $data['phno'];?>&acct=<?php echo $data['acc_typ']; ?>">
                                <input type="submit" value="Update" name="update" onclick='return upadatedata()'></a></td>
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
        </center>
    </div>
    <script>
        function updatedata() {
            return confirm(`Are you sure you want to update this data?`);
        }
    </script>
</body>

</html>