<?php
session_start();
include './php/connection.php';

if(!isset($_SESSION['uname'])){
?>
    <script>
        alert(`Login to book your pack!`);
        location.replace('login.php');
    </script>
<?php
}

$select = "SELECT * FROM pckg_tbl WHERE pckg_id = '$_SESSION[pcsrno]'";
$query = mysqli_query($conn, $select);
$detail = mysqli_fetch_assoc($query);

if(isset($_POST['submitbook'])){
    $insert = "INSERT INTO `book_tbl`(`name`,`emailid`, `pckg_name`, `pckg_price`, `datefrom`, `dateto`) VALUES ('$_SESSION[uname]','$_SESSION[email]','$detail[pckg_name]','$detail[pckg_price]','$_POST[from]','$_POST[to]');     ";

    $run = mysqli_query($conn, $insert);

    if($run){
        ?>
            <script>
                alert(`Your package has been booked!`);
                location.replace('mytrips.php');
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert(`Something went wrong try again later!`);
            </script>
        <?php
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book package</title>
    <link rel="stylesheet" href="./css/book.css">
    <link rel="stylesheet" href="./css/lode1.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="./js/jquery.min.js"></script>
</head>

<body onload="myFunction()">
<?php include_once 'main_nav.php'; ?>
    <div class="spinner" id="loader1">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>

    <!--==================================Formpart================================-->
    <div class="main-box">
        <div class="heading">
            <h2>Book your package</h2>
        </div>
        <div class="form">
            <form action="book.php" method="post">
                <div class="textbox">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['uname']; ?>" disabled>
                </div>
                <div class="textbox">
                    <label for="email">EmailID</label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" disabled>
                </div>
                <div class="textbox">
                    <label for="packname">Pakage name</label>
                    <input type="text" name="packname" id="packname" value="<?php echo $detail['pckg_name']; ?>" disabled>
                </div>
                <div class="textbox">
                    <label for="packprice">Pakage price</label>
                    <input type="text" name="packprice" id="packprice" value="<?php echo $detail['pckg_price']; ?>" disabled>
                </div>
                <div class="textbox">
                    <label for="from">From</label>
                    <input type="date" name="from" id="from" required>
                    <label for="to">to</label>
                    <input type="date" name="to" id="to" required>
                </div>
                <div class="textbox">
                    <label for="person">How many Members:</label>
                    <input type="number" name="mcount" id="person" required>
                </div>
                <div class="btn">
                    <input type="submit" value="Book now" name="submitbook">
                </div>
            </form>
        </div>
    </div>


</body>
<script>
    var preloader = document.getElementById('loader1');

    function myFunction() {
        preloader.style.display = 'none';
    }
    $(".profile").click(function() {
        $(".profile-container").fadeIn("slow").css("display", "flex");
        $(".close").click(function() {
            $(".profile-container").fadeOut("slow");
        });
    });
    $(".profile").click(function() {
        $(".profile-container").fadeIn("slow").css("display", "flex");
        $(".close").click(function() {
            $(".profile-container").fadeOut("slow");
        });
    });
</script>
</body>
<script src="./js/gsap.min.js"></script>
<!--linked the gsap javascript file-->
<script src="./js/ScrollTrigger.min.js"></script>
<!--linked the scrollTrigger javascript file-->
<script src="js/home_nav.js"></script>

</html>