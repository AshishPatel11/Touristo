<?php 

session_start();
include '../php/connection.php';

if (!isset($_SESSION['uname']) && !isset($_SESSION['acctyp'])) {
?>
    <script>
        alert(`Not Allowed login first!`);
        location.replace('../login.php');
    </script>
    <?php
} else {
    if ($_SESSION['acctyp'] != 'admin') {
    ?>
        <script>
            alert(`Not Allowed login first!`);
            location.replace('../login.php');
        </script>
<?php
    }
}
?>
<?php
if(isset($_POST['updateSubmit'])){
            
            $banner = $_FILES['bannerImg'];

            $bannerName = $_FILES['bannerImg']['name'];
            $bannerTmpname = $_FILES['bannerImg']['tmp_name'];
            $bannerSize = $_FILES['bannerImg']['size'];
            $bannerErr = $_FILES['bannerImg']['error'];
            $bannertype = $_FILES['bannerImg']['type'];

            $bannerExt = explode('.', $bannerName);
            $bannerActExt = strtolower(end($bannerExt));


            $thumb = $_FILES['thumbImg'];

            $thumbName = $_FILES['thumbImg']['name'];
            $thumbTmpname = $_FILES['thumbImg']['tmp_name'];
            $thumbSize = $_FILES['thumbImg']['size'];
            $thumbErr = $_FILES['thumbImg']['error'];
            $thumbtype = $_FILES['thumbImg']['type'];

            $thumbExt = explode('.', $thumbName);
            $thumbActExt = strtolower(end($thumbExt));

            $place1 = $_FILES['place1Img'];

            $place1Name = $_FILES['place1Img']['name'];
            $place1Tmpname = $_FILES['place1Img']['tmp_name'];
            $place1Size = $_FILES['place1Img']['size'];
            $place1Err = $_FILES['place1Img']['error'];
            $place1type = $_FILES['place1Img']['type'];

            $place1Ext = explode('.', $place1Name);
            $place1ActExt = strtolower(end($place1Ext));


            $place2 = $_FILES['place2Img'];

            $place2Name = $_FILES['place2Img']['name'];
            $place2Tmpname = $_FILES['place2Img']['tmp_name'];
            $place2Size = $_FILES['place2Img']['size'];
            $place2Err = $_FILES['place2Img']['error'];
            $place2type = $_FILES['place2Img']['type'];

            $place2Ext = explode('.', $place2Name);
            $place2ActExt = strtolower(end($place2Ext));


            $place3 = $_FILES['place3Img'];

            $place3Name = $_FILES['place3Img']['name'];
            $place3Tmpname = $_FILES['place3Img']['tmp_name'];
            $place3Size = $_FILES['place3Img']['size'];
            $place3Err = $_FILES['place3Img']['error'];
            $place3type = $_FILES['place3Img']['type'];

            $place3Ext = explode('.', $place3Name);
            $place3ActExt = strtolower(end($place3Ext));


            $place4 = $_FILES['place4Img'];

            $place4Name = $_FILES['place4Img']['name'];
            $place4Tmpname = $_FILES['place4Img']['tmp_name'];
            $place4Size = $_FILES['place4Img']['size'];
            $place4Err = $_FILES['place4Img']['error'];
            $place4type = $_FILES['place4Img']['type'];

            $place4Ext = explode('.', $place4Name);
            $place4ActExt = strtolower(end($place4Ext));


            $place5 = $_FILES['place5Img'];

            $place5Name = $_FILES['place5Img']['name'];
            $place5Tmpname = $_FILES['place5Img']['tmp_name'];
            $place5Size = $_FILES['place5Img']['size'];
            $place5Err = $_FILES['place5Img']['error'];
            $place5type = $_FILES['place5Img']['type'];

            $place5Ext = explode('.', $place5Name);
            $place5ActExt = strtolower(end($place5Ext));


            $place6 = $_FILES['place6Img'];
            $place6Name = $_FILES['place6Img']['name'];
            $place6Tmpname = $_FILES['place6Img']['tmp_name'];
            $place6Size = $_FILES['place6Img']['size'];
            $place6Err = $_FILES['place6Img']['error'];
            $place6type = $_FILES['place6Img']['type'];

            $place6Ext = explode('.', $place6Name);
            $place6ActExt = strtolower(end($place6Ext));

        $packname = $conn -> real_escape_string($_POST['name']);
        $price = $conn -> real_escape_string($_POST['price']);
        $state = $conn -> real_escape_string($_POST['state']);
        $mainpara = $conn -> real_escape_string($_POST['mainParagraph']);
        $p1desc = $conn -> real_escape_string($_POST['place1Desc']);
        $p2desc =$conn -> real_escape_string($_POST['place2Desc']);
        $p3desc = $conn -> real_escape_string($_POST['place3Desc']);
        $p4desc = $conn -> real_escape_string($_POST['place4Desc']);
        $p5desc = $conn -> real_escape_string($_POST['place5Desc']);
        $p6desc = $conn -> real_escape_string($_POST['place6Desc']);
        $gmap = $conn -> real_escape_string($_POST['Gmap']);
        $tagline = $conn -> real_escape_string($_POST['tagline']);
        $tags = $conn -> real_escape_string($_POST['tags']);

        //validation for place 3
        if(($place3Name != "" && $p3desc === "") || ($p3desc != "" 
        && $place3Name === "")){
            die("
                    <script>
                        alert(`Image or description for place 3 is not completed!`);
                        location.replace(`admin_addPack.php`);
                    </script>
            ");
        }

        //validation for place 4
        if(($place4Name != "" && $p4desc === "") || ($p4desc != "" 
        && $place4Name === "")){
            die("
                    <script>
                        alert(`Image or description for place 4 is not completed!`);
                        location.replace(`admin_addPack.php`);
                    </script>
            ");
        }
        if(($place5Name != "" && $p5desc === "") || ($p5desc != "" 
        && $place5Name === "")){
            die("
                    <script>
                        alert(`Image or description for place 5 is not completed!`);
                        location.replace(`admin_addPack.php`);
                    </script>
            ");
        }
        if(($place6Name != "" && $p6desc === "") || ($p6desc != "" 
        && $place6Name === "")){
            die("
                    <script>
                        alert(`Image or description for place 6 is not completed!`);
                        location.replace(`admin_addPack.php`);
                    </script>
            ");
        }



        $packageQuery = "UPDATE `pckg_tbl` SET `pckg_name`='$_POST[name]',`state`='$_POST[state]',`pckg_price`='$_POST[price]',`maplink`='$_POST[Gmap]',`tagline`='$_POST[tagline]',`pckg_para`='$_POST[mainParagraph]',`sub_para1`='$_POST[place1Desc]',`sub_para2`='$_POST[place2Desc]',`sub_para3`='$_POST[place3Desc]'',`sub_para4`='$_POST[place4Desc]',`sub_para5`='$_POST[place5Desc]',`sub_para6`='$_POST[place6Desc]',`tags`='$_POST[tags]' WHERE pckg_id = $_POST[pckgid]";

        $result = mysqli_query($conn, $packageQuery);
        if($result){
            ?>
            <script>
                alert( `package is updated successfully!`);
                loction.replace(`http://localhost/Touristo/packages/<?php echo $_POST[name] ?>.php`);
            </script>
            <?php
             // banner image file storing in the system through php
            

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

            // storing the thumbnail image to the system through php
            

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($thumbActExt, $allowed)){
                if($thumbErr === 0){
                    $thumbNameNew = $_POST['name'] ."_thumb". ".jpg";

                    $thumbDestination = '../packages/images/'.$thumbNameNew;
                    move_uploaded_file($thumbTmpname, $thumbDestination);
                }else
                {
                    echo "error uploading image";
                }
            }else{
                echo "extension not matched";
            }
            // Place 1 image file storing in the system through php
            

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

        }else{
            ?>
            <script>
                alert( `Error in Updating Package`);
            </script>
            <?php
        }

}

?>

<?php
                $pkid = $_GET['pkid'];
                $packageFetch = "SELECT * FROM `pckg_tbl` WHERE pckg_id = $pkid";
                $result = mysqli_query($conn, $packageFetch);
                $count = mysqli_num_rows($result);
                $data = mysqli_fetch_assoc($result);
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
    <style>
        .disable{
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php include_once "admin_nav.php";
    ?>
    <div class="admin-container">
        <div class="form-container3">
            <form action="admin_addPack.php" method="post" class="package-form" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="Pid">Package ID:</label>
                    <input type="text" name="pckg_id" value="<?php echo $data['pckg_id']; ?>" id="Pid" required disabled class="disable">
                </div>

                <div class="input-box">
                    <label for="Pname">Package Name:</label>
                    <input type="text" name="name" value="<?php echo $data['pckg_name']; ?>" id="Pname" required>
                </div>

                <div class="input-box">
                    <label for="pack-price">Package Price:</label>
                    <input type="text" name="price" value="<?php echo $data['pckg_price']; ?>" id="pack-price" required>
                </div>
                <div class="input-box">
                    <label for="state">State:</label>
                    <input type="text" name="state" value="<?php echo $data['state']; ?>" id="state" required>
                </div>
                <div class="input-box tooltip">
                    <label for="G-map">Google Map Link:</label>
                    <textarea name="Gmap" id="G-map" cols="30" rows="3" required><?php echo $data['maplink']; ?></textarea>
                    <span class="tooltiptext">Select Embed a map from share option in Google Maps and copy the link and
                        paste here</span>
                </div>


                <div class="input-box tooltip">
                    <label for="Tagline">Tagline: </label>
                    <textarea name="tagline" id="Tagline" cols="30" rows="3" required><?php echo $data['tagline']; ?></textarea>
                    <span class="tooltiptext">Tagline will be displayed on Thumbnail</span>
                </div>


                <div class="upload-img">
                    <label for="thumbnail-img">Thumbnail Image:</label>
                    <input type="file" name="thumbImg" id="thumbnail-img" >
                </div>


                <div class="upload-img">
                    <label for="banner-img">Banner Image:</label>
                    <input type="file" name="bannerImg" id="banner-img" >
                </div>

                <div class="input-box">
                    <label for="main-desc">Main Paragraph:</label>
                    <textarea name="mainParagraph" id="main-desc" cols="30" rows="5" required><?php echo $data['pckg_para']; ?></textarea>
                </div>

                <div class="upload-img">
                    <label for="place1-img">Place 1 Image:</label>
                    <input type="file" name="place1Img" id="place1-img" >
                </div>
                <div class="input-box">
                    <label for="place1-desc">Description for Place 1:</label>
                    <textarea name="place1Desc" id="place1-desc" cols="30" rows="5" required><?php echo $data['sub_para1']; ?></textarea>
                </div>
                <div class="upload-img">
                    <label for="place2-img">Place 2 Image:</label>
                    <input type="file" name="place2Img" id="place2-img" >
                </div>
                <div class="input-box">
                    <label for="place2-desc">Description for Place 2:</label>
                    <textarea name="place2Desc" id="place2-desc" cols="30" rows="5" required><?php echo $data['sub_para2']; ?></textarea>
                </div>
                <div class="upload-img">
                    <label for="place3-img">Place 3 Image:</label>
                    <input type="file" name="place3Img" id="place3-img">
                </div>
                <div class="input-box">
                    <label for="place3-desc">Description for Place 3:</label>
                    <textarea name="place3Desc" id="place3-desc" cols="30" rows="5"><?php echo $data['sub_para3']; ?></textarea>
                </div>

                <div class="upload-img">
                    <label for="place4-img">Place 4 Image:</label>
                    <input type="file" name="place4Img" id="place4-img">
                </div>

                <div class="input-box">
                    <label for="place4-desc">Description for Place 4:</label>
                    <textarea name="place4Desc" id="place4-desc" cols="30" rows="5"><?php echo $data['sub_para4']; ?></textarea>
                </div>
                <div class="upload-img">
                    <label for="place5-img">Place 5 Image:</label>
                    <input type="file" name="place5Img" id="place5-img">
                </div>

                <div class="input-box">
                    <label for="place5-desc">Description for Place 5:</label>
                    <textarea name="place5Desc" id="place5-desc" cols="30" rows="5"><?php echo $data['sub_para5']; ?></textarea>
                </div>
                <div class="upload-img">
                    <label for="place6-img">Place 6 Image:</label>
                    <input type="file" name="place6Img" id="place6-img">
                </div>
                <div class="input-box">
                    <label for="place6-desc">Description for Place 6:</label>
                    <textarea name="place6Desc" id="place6-desc" cols="30" rows="5"><?php echo $data['sub_para6']; ?></textarea>
                </div>
                <div class="input-box tooltip">
                    <label for="tags">Relative Tags:</label>
                    <textarea name="tags" id="tags" cols="30" rows="5" required><?php echo $data['tags']; ?></textarea>
                    <span class="tooltiptext">Add tags that are related with the packages for better searching
                        results.</span>
                </div>
                <div class="input-btn">
                    <button type="submit" name="updateSubmit">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>