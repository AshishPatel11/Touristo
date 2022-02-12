<?php
include 'connection.php';
$nameerr="";
$numerr="";
$passerr="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo
    "<style>
        .sec{
            display:none;
            pointer-events:none;
        }
        .nav-container{
            transform:translateY(-10px);
            background-color: #332f2f;
            color: rgb(255, 255, 255);
        }
        .nav-option a{
            color: rgb(255, 255, 255);
        }
        .burger div{
            background-color: rgb(255, 255, 255);
        }
    </style>";
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
        $nameerr= "<i class=material-icons>warning</i>Invalid Name!";
    }
    else{
        if(!preg_match("/^[0-9]{10}+$/",$_POST['contact'])){
            $numerr = "<i class=material-icons>warning</i>Phone Number Must Be 10 Digits!";
        }
        else{
            if($_POST['passwd'] != $_POST['cpasswd']){
                $passerr = "<i class=material-icons>warning</i>Passwords Did Not Matched!";
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
                        alert(`Account Creation Failed, Account already Exists`);
                        location.replce('signup.php');
                    </script>";
                }
            }
        }
    }
}
