<?php
session_start();
include "php/connection.php";

if(isset($_POST['search'])){
    $searchqry = "SELECT * FROM `pckg_tbl` WHERE tags REGEXP '$_POST[searchbar]';";
    $result = mysqli_query($conn, $select);

    $count = mysqli_num_rows($result);
}
?>