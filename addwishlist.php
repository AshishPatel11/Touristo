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