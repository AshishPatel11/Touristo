<?php
session_start();
include '../php/connection.php';

$srno = $_GET['srno'];

$update = " UPDATE book_tbl SET status = 'cancelled' WHERE srno = '$srno' ";
$run = mysqli_query($conn, $update);

if ($run) {
?>
    <script>
        alert(`Booking cancelled!`);
        location.replace('manage_book.php');
    </script>
<?php
} else {
?>
    <script>
        alert(`Something went wrong try later!`);
        location.replace('manage_book.php');
    </script>
<?php
}

?>