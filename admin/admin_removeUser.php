<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
            <div>
                <table class='styled-table'>
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>Name</th>
                            <th>EmailID</th>
                            <th>Phone no.</th>
                            <th>A/c type</th>
                            <th>Delete</th>
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
                                    <td><a href="deletedata.php?id=<?php echo $data['uid']; ?>"><input type="submit" value="Delete" name="delete" onclick =  'return deletedata()'></a></td>
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
        </center>
        <br>

    </div>

    <script>
        function deletedata(){
            return confirm(`Are you sure you want to delete this data?`);
        }
    </script>
</body>

</html>