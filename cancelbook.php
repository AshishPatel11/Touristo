<?php

session_start();
include_once './php/connection.php';

$srno = $_GET['srno'];

$update = "UPDATE book_tbl SET status = 'cancelled' WHERE srno = '$srno'";
$run = mysqli_query($conn, $update);

if($run){
    ?>
    <script>
        alert(`Your booking canceled!`);
        location.replace('mytrips.php');
    </script>
    <?php
}
else{
    ?>
    <script>
        alert(`Something went wrong try later!`);
    </script>
    <?php
}

?>