<?php
include '../php/connection.php';

$id = $_REQUEST['id'];
$delete = "DELETE FROM user_tbl WHERE uid = $id";
$query = mysqli_query($conn, $delete);

if ($query) {
?>
    <script>
        alert(`Record Deleted!`);
        location.replace("admin_removeUser.php");
    </script>
<?php
} else {
?>
    <script>
        alert(`Not Deleted!`);
    </script>
<?php
}


?>