<?php
    session_start();
    if(isset($_POST['submit'])){
        $file = $_FILES['profile'];

        $fileName = $_FILES['profile']['name'];
        $fileTmpname = $_FILES['profile']['tmp_name'];
        $fileSize = $_FILES['profile']['size'];
        $fileErr = $_FILES['profile']['error'];
        $filetype = $_FILES['profile']['type'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActExt, $allowed)){
            if($fileErr === 0){
                $fileNameNew = $_SESSION['uid'] . ".jpg";

                $fileDestination = 'profiles/'.$fileNameNew;
                move_uploaded_file($fileTmpname, $fileDestination);
                header("Location: main.php?profileImageChanged");
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image</title>
</head>
<body>
    <form action="changeprofile.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="profile">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>