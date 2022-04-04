<?php

session_start();
include '../php/connection.php';
include 'admin_nav.php';

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
    <link rel="stylesheet" href="../css/lode1.css">
    <title>Manage Enquiries</title>
    <link rel="stylesheet" href="./css/manage_enquiries.css">
    <link rel="stylesheet" href="./css/admin_nav.css">
</head>

<body onload="myFunction()">
    <div class="spinner" id="loader1">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <div class="form-container4">

        <h2>Manage Enquiries</h2>

        <div>
            <table class='styled-table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>EmailID</th>
                        <th>Message</th>
                        <th>Replay</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php

                    $search = "SELECT * FROM `contactus` WHERE reply = ''";
                    $result = mysqli_query($conn, $search);

                    if ($result->num_rows > 0) {

                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                            <tr class='active-row'>
                                <td><?php echo $data['user']; ?> </td>
                                <td><?php echo $data['email']; ?> </td>
                                <td><?php echo $data['message']; ?> </td>
                                <td><?php echo $data['reply']; ?> </td>
                                <td><a href="reply.php"><input type="submit" value="Reply" name="reply"></a></td>
                            </tr>
                        <?php
                        $_SESSION['inqSrno'] = $data['srno'];
                        $_SESSION['inqUsername'] = $data['user'];
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
</body>
<script>
    var preloader = document.getElementById('loader1');

    function myFunction() {
        preloader.style.display = 'none';
    }
</script>

</html>