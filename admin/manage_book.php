<?php

include '../php/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Booking</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
        }

        table th {
            background-color: #2f333d;
            color: #fff;
            vertical-align: middle;
            padding-left: 10px;
            padding: 20px;
        }

        table * :not(input, a, form) {
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <?php
    include_once 'admin_nav.php';
    ?>

    <div class="form-container1">

        <h1>Pending Booking</h1>

        <div>
            <table class='styled-table'>
                <thead>
                    <tr>
                        <th>srno</th>
                        <th>Name</th>
                        <th>EmailID</th>
                        <th>Pack name</th>
                        <th>Pack price</th>
                        <th>Booking date</th>
                        <th>From </th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $search = "SELECT * FROM `book_tbl` WHERE status = 'pending'";
                    $result = mysqli_query($conn, $search);

                    if ($result->num_rows > 0) {

                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                            <tr class='active-row'>
                                <td><?php echo $data['srno']; ?> </td>
                                <td><?php echo $data['name']; ?> </td>
                                <td><?php echo $data['emailid']; ?> </td>
                                <td><?php echo $data['pckg_name']; ?> </td>
                                <td><?php echo $data['pckg_price']; ?> </td>
                                <td><?php echo $data['bookingdate']; ?> </td>
                                <td><?php echo $data['datefrom']; ?> </td>
                                <td><?php echo $data['dateto']; ?> </td>
                                <td><?php echo $data['status']; ?> </td>
                                <td><a href="confirm.php?srno=<?php echo $data['srno']; ?>"><input type="submit" value="Confirm" name="confirm"></a>
                                    <a href="cancel.php?srno=<?php echo $data['srno']; ?>"><input type="submit" value="Cancel" name="cancel"></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "No data found";
                    }
                    ?>
                </tbody>
            </table>

            <h1>Confirmed Booking</h1>

            <div>
                <table class='styled-table'>
                    <thead>
                        <tr>
                            <th>srno</th>
                            <th>Name</th>
                            <th>EmailID</th>
                            <th>Pack name</th>
                            <th>Pack price</th>
                            <th>Booking date</th>
                            <th>From </th>
                            <th>To</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $search = "SELECT * FROM `book_tbl` WHERE status = 'confirmed'";
                        $result = mysqli_query($conn, $search);

                        if ($result->num_rows > 0) {

                            while ($data = mysqli_fetch_array($result)) {
                        ?>
                                <tr class='active-row'>
                                    <td><?php echo $data['srno']; ?> </td>
                                    <td><?php echo $data['name']; ?> </td>
                                    <td><?php echo $data['emailid']; ?> </td>
                                    <td><?php echo $data['pckg_name']; ?> </td>
                                    <td><?php echo $data['pckg_price']; ?> </td>
                                    <td><?php echo $data['bookingdate']; ?> </td>
                                    <td><?php echo $data['datefrom']; ?> </td>
                                    <td><?php echo $data['dateto']; ?> </td>
                                    <td><?php echo $data['status']; ?> </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </tbody>
                </table>

                <h1>Canceled Booking</h1>

                <div>
                    <table class='styled-table'>
                        <thead>
                            <tr>
                                <th>srno</th>
                                <th>Name</th>
                                <th>EmailID</th>
                                <th>Pack name</th>
                                <th>Pack price</th>
                                <th>Booking date</th>
                                <th>From </th>
                                <th>To</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $search = "SELECT * FROM `book_tbl` WHERE status = 'canceled'";
                            $result = mysqli_query($conn, $search);

                            if ($result->num_rows > 0) {

                                while ($data = mysqli_fetch_array($result)) {
                            ?>
                                    <tr class='active-row'>
                                        <td><?php echo $data['srno']; ?> </td>
                                        <td><?php echo $data['name']; ?> </td>
                                        <td><?php echo $data['emailid']; ?> </td>
                                        <td><?php echo $data['pckg_name']; ?> </td>
                                        <td><?php echo $data['pckg_price']; ?> </td>
                                        <td><?php echo $data['bookingdate']; ?> </td>
                                        <td><?php echo $data['datefrom']; ?> </td>
                                        <td><?php echo $data['dateto']; ?> </td>
                                        <td><?php echo $data['status']; ?> </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No data found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


</body>

</html>