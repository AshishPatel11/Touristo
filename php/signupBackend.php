<?php
include 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
        echo "Invalid Name";
    }
    else{
        if(!preg_match("/^[0-9]{10}+$/",$_POST['contact'])){
            $nameerr = "Invalid Phone Number";
        }
        else{
            if($_POST['passwd'] != $_POST['cpasswd']){
                echo "Passwords are not Same";
            }
            else{

                $uid = rand(100000,1000000);
                $insert = "INSERT INTO `user_tbl`(uid, uname, emailid, phno,passwd) VALUES ('$uid','$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[passwd]')";

                $result = mysqli_query($conn,$insert);

                if($result){
                    echo 
                    "<script>
                        alert(`Account Created! Your UserId is : $uid`);
                        location.replace('login.php');
                    </script>";
                }
                else{
                    echo 
                    "<script>
                        alert(`Account Creation Failed $conn->error`);
                        location.replce('signup.php');
                    </script>";
                }
            }
        }
    }
}

?>