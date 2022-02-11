<?php

include 'connection.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $email = $password= ""; 

    $select = "SELECT * FROM user_tbl WHERE emailid = $_POST[email] AND passwd = $_POST[passwd]";

    $result = mysqli_query($conn,$select);
    $data = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) === 1){
        if($data['emailid'] === $_POST['email'] && $data['passwd'] === $_POST['passwd']){
            echo "
            <script>
                alert(`Login Successful!!Welcome $data[uname]`);
                location.replace('home.php');
            </script>";
        }
        else{
            echo "
            <script>
                alert(`Invalid Credentials $conn->error`);
            </script>";
    }
    }
}
