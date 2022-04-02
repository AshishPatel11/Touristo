<?php
session_start();
session_destroy();
echo "<script>  alert(`You have been logout successfully!`);
                location.replace(`login.php`); </script>";
?>