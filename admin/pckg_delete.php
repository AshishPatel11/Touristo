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
$pckg_name = $_GET['pkname'];
if (isset($_POST['delete'])) {
    $deletepackqry = "DELETE FROM `pckg_tbl` WHERE `pckg_id` = '$pckg_id'";
    $deletepackresult = mysqli_query($conn, $deletepackqry);
    if ($deletepackresult) {
        unlink("../packages/$pckg_name.php");
        unlink("../packages/images/$pckg_name" . "_thumb.jpg");
        unlink("../packages/images/$pckg_name" . "_banner.jpg");
        unlink("../packages/images/$pckg_name" . "_place1.jpg");
        unlink("../packages/images/$pckg_name" . "_place2.jpg");

        $imgAddr = "./images/" . $pckg_name . "_place3" . ".jpg";
        $imgExist = file_exists("$imgAddr");
        if ($imgExist === true) {
            unlink("../packages/images/$pckg_name" . "_place3.jpg");
        }

        $imgAddr = "./images/" . $pckg_name . "_place4" . ".jpg";
        $imgExist = file_exists("$imgAddr");
        if ($imgExist === true) {
            unlink("../packages/images/$pckg_name" . "_place4.jpg");
        }

        $imgAddr = "./images/" . $pckg_name . "_place5" . ".jpg";
        $imgExist = file_exists("$imgAddr");
        if ($imgExist === true) {
            unlink("../packages/images/$pckg_name" . "_place5.jpg");
        }

        $imgAddr = "./images/" . $pckg_name . "_place6" . ".jpg";
        $imgExist = file_exists("$imgAddr");
        if ($imgExist === true) {
            unlink("../packages/images/$pckg_name" . "_place6.jpg");
        }

?>
        <script>
            alert(`Package Deleted Successfully!`);
            location.replace(`admin_modifyPack.php`);
        </script>
    <?php

    } else {
    ?>
        <script>
            alert(`Error deleting package!`);
            location.replace(`admin_modifyPack.php`);
        </script>
<?php
    }
}
?>