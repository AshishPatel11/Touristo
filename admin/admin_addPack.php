<?php
    session_start();
    require_once "../php/connection.php";
    if(isset($_POST['submit'])){
        // banner image file storing in the system through php
        $banner = $_FILES['bannerImg'];

        $bannerName = $_FILES['bannerImg']['name'];
        $bannerTmpname = $_FILES['bannerImg']['tmp_name'];
        $bannerSize = $_FILES['bannerImg']['size'];
        $bannerErr = $_FILES['bannerImg']['error'];
        $bannertype = $_FILES['bannerImg']['type'];

        $bannerExt = explode('.', $bannerName);
        $bannerActExt = strtolower(end($bannerExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($bannerActExt, $allowed)){
            if($bannerErr === 0){
                $bannerNameNew = $_POST['name'] ."_banner". ".jpg";

                $bannerDestination = '../packages/images/'.$bannerNameNew;
                move_uploaded_file($bannerTmpname, $bannerDestination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
        // Place 1 image file storing in the system through php
        $place1 = $_FILES['place1Img'];

        $place1Name = $_FILES['place1Img']['name'];
        $place1Tmpname = $_FILES['place1Img']['tmp_name'];
        $place1Size = $_FILES['place1Img']['size'];
        $place1Err = $_FILES['place1Img']['error'];
        $place1type = $_FILES['place1Img']['type'];

        $place1Ext = explode('.', $place1Name);
        $place1ActExt = strtolower(end($place1Ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($place1ActExt, $allowed)){
            if($place1Err === 0){
                $place1NameNew = $_POST['name'] ."_place1". ".jpg";

                $place1Destination = '../packages/images/'.$place1NameNew;
                move_uploaded_file($place1Tmpname, $place1Destination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
        // Place 2 image file storing in the system through php
        $place2 = $_FILES['place2Img'];

        $place2Name = $_FILES['place2Img']['name'];
        $place2Tmpname = $_FILES['place2Img']['tmp_name'];
        $place2Size = $_FILES['place2Img']['size'];
        $place2Err = $_FILES['place2Img']['error'];
        $place2type = $_FILES['place2Img']['type'];

        $place2Ext = explode('.', $place2Name);
        $place2ActExt = strtolower(end($place2Ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($place2ActExt, $allowed)){
            if($place2Err === 0){
                $place2NameNew = $_POST['name'] ."_place2". ".jpg";

                $place2Destination = '../packages/images/'.$place2NameNew;
                move_uploaded_file($place2Tmpname, $place2Destination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
        // Place 3 image file storing in the system through php
        $place3 = $_FILES['place3Img'];

        $place3Name = $_FILES['place3Img']['name'];
        $place3Tmpname = $_FILES['place3Img']['tmp_name'];
        $place3Size = $_FILES['place3Img']['size'];
        $place3Err = $_FILES['place3Img']['error'];
        $place3type = $_FILES['place3Img']['type'];

        $place3Ext = explode('.', $place3Name);
        $place3ActExt = strtolower(end($place3Ext));

        $allowed = array('jpg', 'jpeg', 'png');
        if(!empty($place3Name)){
        if(in_array($place3ActExt, $allowed)){
            if($place3Err === 0){
                $place3NameNew = $_POST['name'] ."_place3". ".jpg";

                $place3Destination = '../packages/images/'.$place3NameNew;
                move_uploaded_file($place3Tmpname, $place3Destination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
    }
        // Place 4 image storing in the system through php
        $place4 = $_FILES['place4Img'];

        $place4Name = $_FILES['place4Img']['name'];
        $place4Tmpname = $_FILES['place4Img']['tmp_name'];
        $place4Size = $_FILES['place4Img']['size'];
        $place4Err = $_FILES['place4Img']['error'];
        $place4type = $_FILES['place4Img']['type'];

        $place4Ext = explode('.', $place4Name);
        $place4ActExt = strtolower(end($place4Ext));

        $allowed = array('jpg', 'jpeg', 'png');
        if(!empty($place4Name)){
        if(in_array($place4ActExt, $allowed)){
            if($place4Err === 0){
                $place4NameNew = $_POST['name'] ."_place4". ".jpg";

                $place4Destination = '../packages/images/'.$place4NameNew;
                move_uploaded_file($place4Tmpname, $place4Destination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
    }
        // Place 5 image file storing in the system through php
        $place5 = $_FILES['place5Img'];

        $place5Name = $_FILES['place5Img']['name'];
        $place5Tmpname = $_FILES['place5Img']['tmp_name'];
        $place5Size = $_FILES['place5Img']['size'];
        $place5Err = $_FILES['place5Img']['error'];
        $place5type = $_FILES['place5Img']['type'];

        $place5Ext = explode('.', $place5Name);
        $place5ActExt = strtolower(end($place5Ext));

        $allowed = array('jpg', 'jpeg', 'png');
        if(!empty($place5Name)){
        if(in_array($place5ActExt, $allowed)){
            if($place5Err === 0){
                $place5NameNew = $_POST['name'] ."_place5". ".jpg";

                $place5Destination = '../packages/images/'.$place5NameNew;
                move_uploaded_file($place5Tmpname, $place5Destination);
            }else
            {
                echo "error uploading image";
            }
        }else{
            echo "extension not matched";
        }
    }
        // Place 6 imgage file storef in the system through php
        $place6 = $_FILES['place6Img'];
            $place6Name = $_FILES['place6Img']['name'];
            $place6Tmpname = $_FILES['place6Img']['tmp_name'];
            $place6Size = $_FILES['place6Img']['size'];
            $place6Err = $_FILES['place6Img']['error'];
            $place6type = $_FILES['place6Img']['type'];

            $place6Ext = explode('.', $place6Name);
            $place6ActExt = strtolower(end($place6Ext));

            $allowed = array('jpg', 'jpeg', 'png');
            if(!empty($place6Name)){
            if(in_array($place6ActExt, $allowed)){
                if($place6Err === 0){
                    $place6NameNew = $_POST['name'] ."_place6". ".jpg";

                    $place6Destination = '../packages/images/'.$place6NameNew;
                    move_uploaded_file($place6Tmpname, $place6Destination);
                }else
                {
                    echo "error uploading image";
                }
            }else{
                echo "extension not matched";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../css/images/svg/title.svg">
    <link rel="stylesheet" href="./css/admin_nav.css">
    <link rel="stylesheet" href="./css/admin_addUser.css">
    <title>Add Package</title>
</head>

<body>
    <?php include_once "admin_nav.php";
    ?>
    <div class="admin-container">
        <div class="form-container3">
            <form action="admin_addPack.php" method="post" class="package-form" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="Pname">Package Name:</label>
                    <input type="text" name="name" id="Pname" required>
                </div>

                <div class="input-box">
                    <label for="pack-price">Package Price:</label>
                    <input type="text" name="price" id="pack-price" required>
                </div>
                <div class="input-box">
                    <label for="state">State:</label>
                    <input type="text" name="state" id="state" required>
                </div>

                <div class="upload-img">
                    <label for="banner-img">Banner Image:</label>
                    <input type="file" name="bannerImg" id="banner-img" required>
                </div>

                <div class="input-box">
                    <label for="main-desc">Main Paragraph:</label>
                    <textarea name="mainParagraph" id="main-desc" cols="30" rows="5" required></textarea>
                </div>

                <div class="upload-img">
                    <label for="place1-img">Place 1 Image:</label>
                    <input type="file" name="place1Img" id="place1-img" required>
                </div>
                <div class="input-box">
                    <label for="place1-desc">Description for Place 1:</label>
                    <textarea name="place1Desc" id="place1-desc" cols="30" rows="5" required></textarea>
                </div>
                <div class="upload-img">
                    <label for="place2-img">Place 2 Image:</label>
                    <input type="file" name="place2Img" id="place2-img" required>
                </div>
                <div class="input-box">
                    <label for="place2-desc">Description for Place 2:</label>
                    <textarea name="place2Desc" id="place2-desc" cols="30" rows="5" required></textarea>
                </div>
                <div class="upload-img">
                    <label for="place3-img">Place 3 Image:</label>
                    <input type="file" name="place3Img" id="place3-img">
                </div>
                <div class="input-box">
                    <label for="place3-desc">Description for Place 3:</label>
                    <textarea name="place3Desc" id="place3-desc" cols="30" rows="5"></textarea>
                </div>

                <div class="upload-img">
                    <label for="place4-img">Place 4 Image:</label>
                    <input type="file" name="place4Img" id="place4-img">
                </div>

                <div class="input-box">
                    <label for="place4-desc">Description for Place 4:</label>
                    <textarea name="place4Desc" id="place4-desc" cols="30" rows="5"></textarea>
                </div>
                <div class="upload-img">
                    <label for="place5-img">Place 5 Image:</label>
                    <input type="file" name="place5Img" id="place5-img">
                </div>

                <div class="input-box">
                    <label for="place5-desc">Description for Place 5:</label>
                    <textarea name="place5Desc" id="place5-desc" cols="30" rows="5"></textarea>
                </div>
                <div class="upload-img">
                    <label for="place6-img">Place 6 Image:</label>
                    <input type="file" name="place6Img" id="place6-img">
                </div>
                <div class="input-box">
                    <label for="place6-desc">Description for Place 6:</label>
                    <textarea name="place6Desc" id="place6-desc" cols="30" rows="5"></textarea>
                </div>
                <div class="input-box">
                    <label for="tags">Relative Tags:</label>
                    <textarea name="tags" id="tags" cols="30" rows="5"></textarea>
                </div>
                <div class="input-btn">
                    <button type="submit" name="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>