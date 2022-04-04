<?php
session_start();
if(isset($_SESSION['uname'])){
    session_destroy();
    echo "<script>  alert(`You have been logout!`);
                    location.replace(`login.php`); </script>";
}
else{
    echo "<script>  alert(`Login first!`);
    location.replace(`login.php`); </script>";
}
?>