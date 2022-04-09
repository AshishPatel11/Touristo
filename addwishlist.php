<?php
session_start();
include "php/connection.php";


if(!isset($_SESSION['uname'])){
?>
    <script>
        alert(`Login to book your pack!`);
        location.replace('login.php');
    </script>
<?php }

if(isset($_POST['addwish'])){
    $wishquery = "INSERT INTO `wishlist_tbl`(`pckg_id`, `uid`) VALUES ('$_SESSION[pcsrno]','$_SESSION[uid]')";
    $run = mysqli_query($conn, $wishquery);
    if($run){
        ?>
            <script>
                alert(`Package Has Been Added to Your Wishlist!`);
                location.replace('wishlist.php');
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert(`Something went wrong try again later!`);
            </script>
        <?php
    }
}
?>


<?php
if(isset($_POST['removewish'])){
    $rmvwish = "DELETE FROM `wishlist_tbl` WHERE `pckg_id` = '$_SESSION[pcsrno]' AND `uid` = '$_SESSION[uid]'";
    $rmvwishrun = mysqli_query($conn, $rmvwish);
    if($rmvwishrun){
        ?>
            <script>
                alert(`Package Has Been Removed From Your Wishlist!`);
                location.replace('main.php');
            </script>
        <?php
    }
}
?>