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
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }



        $packname = $_POST['name'];
        $crtfile = fopen("packages/$packname.php", "w");
        $content="<!DOCTYPE html>
                    <html lang=en>
                    <head>
                        <meta charset=UTF-8>
                        <meta http-equiv=X-UA-Compatible content=IE=edge>
                        <meta name=viewport content=width=device-width, initial-scale=1.0>
                        <title>ashish</title>
                    </head>
                    <body>
        
                <?php
                    session_start();
                    if (isset(\$_SESSION['uname'])) {
                        \$profileAddress = '../profiles/'. \$_SESSION['uid'] . \".\" . \"jpg\";
                        \$fileExist = file_exists(\"\$profileAddress\");
                        if(\$fileExist === true){
                            echo \"<img src=\$profileAddress class=profile>\";
                        }else{
                            echo \"<img src=../css/images/profile.png class=profile>\";
                        }
                    }
                    else{
                        echo \"<img src=../css/images/profile.png class=profile>\";
                    }
                ?>
                </body>
                </html>
                ";
                    fwrite($crtfile, $content);
                    fclose($crtfile);
                    header("Location: main.php?profileImageChanged");
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image</title>
    <style>
    input::file-selector-button{
        background-color: #0095ff;
        border: 1px solid transparent;
        border-radius: 3px;
        box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans", sans-serif;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.15385;
        margin: 0;
        outline: none;
        padding: 8px .8em;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        white-space: nowrap;
    }

    input::file-selector-button:hover,
    input::file-selector-button:focus {
        background-color: #07c;
    }

    input::file-selector-button:focus {
        box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
    }

    input::file-selector-button:active {
        background-color: #0064bd;
        box-shadow: none;
    }
    </style>
</head>

<body>
    <form action="sample.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name">
        <input type="file" class="button-7" name="profile">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>

</html>