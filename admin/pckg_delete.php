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

<?php
$pckg_id = $_GET['pkid'];
if(isset($_POST['delete'])){
    $deletepackqry = "DELETE FROM `pckg_tbl` WHERE `pckg_id` = '$pckg_id'";
}
?>