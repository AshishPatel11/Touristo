<?php
    session_start();
    if(isset($_POST['submit'])){
        $creatpack = fopen("../packages/$_POST[name].php","w");
        $content = "<!DOCTYPE html>
        <html lang=en>
        <head>
            <meta charset=UTF-8>
            <meta http-equiv=X-UA-Compatible content=IE=edge>
            <meta name=viewport content=width=device-width, initial-scale=1.0>
            <title>fuck</title>
        </head>
        <body>
            
        </body>
        </html>";
            fwrite($creatpack, $content);
            fclose($creatpack);
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
    <!-- <link rel="stylesheet" href="./css/admin_home.css"> -->
    <title>Add Package</title>
    <style>
        form{
            display: inline-flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <?php include_once "admin_nav.php";
    ?>
    <form action="admin_addPack.php" method="post" class="package-form">
        <label for="Pname">Package Name:</label>
        <input type="text" name="name" id="Pname">

        <label for="pack-price">Package Price:</label>
        <input type="text" name="price" id="pack-price">

        <label for="state">State:</label>
        <input type="text" name="state" id="state">

        <label for="banner-img">Banner Image:</label>
        <input type="file" name="bannerImg" id="banner-img">

        <label for="main-desc">Main Paragraph:</label>
        <textarea name="mainParagraph" id="main-desc" cols="40" rows="5"></textarea>

        <label for="place1-img">Place 1 Image:</label>
        <input type="file" name="place1Img" id="place1-img">

        <label for="place1-desc">Description for Place 1:</label>
        <textarea name="place1Desc" id="place1-desc" cols="40" rows="5"></textarea>

        
        <label for="place2-img">Place 2 Image:</label>
        <input type="file" name="place2Img" id="place2-img">

        <label for="place2-desc">Description for Place 2:</label>
        <textarea name="place2Desc" id="place2-desc" cols="40" rows="5"></textarea>


        
        <label for="place3-img">Place 3 Image:</label>
        <input type="file" name="place3Img" id="place3-img">

        <label for="place3-desc">Description for Place 3:</label>
        <textarea name="place3Desc" id="place3-desc" cols="40" rows="5"></textarea>

        
        <label for="place4-img">Place 4 Image:</label>
        <input type="file" name="place4Img" id="place4-img">

        <label for="place4-desc">Description for Place 4:</label>
        <textarea name="place4Desc" id="place4-desc" cols="40" rows="5"></textarea>

        
        <label for="place5-img">Place 5 Image:</label>
        <input type="file" name="place5Img" id="place5-img">

        <label for="place5-desc">Description for Place 5:</label>
        <textarea name="place5Desc" id="place5-desc" cols="40" rows="5"></textarea>

        
        <label for="place6-img">Place 6 Image:</label>
        <input type="file" name="place6Img" id="place6-img">

        <label for="place6-desc">Description for Place 6:</label>
        <textarea name="place6Desc" id="place6-desc" cols="40" rows="5"></textarea>

        <label for="tags">Relative Tags:</label>
        <textarea name="tags" id="tags" cols="40" rows="5"></textarea>
        <button type="submit" name="submit">Creat</button>
    </form>
</body>

</html>