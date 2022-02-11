<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "touristo";
$passwd = "";
$email = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["passwd"]=$_POST["passwd"];

        $sql = "SELECT fname,email,passwd FROM `user_tbl` where email='$_POST[email]' and passwd='$_POST[passwd]';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["email"] = $row["email"];
        if ($result->num_rows > 0 and $row["passwd"] == $_POST['passwd']) {
                echo "
                <script>
                    alert(`Login Successful!!`);
                    location.replace('home.php');
                </script>";
        }
        else
        {
            echo "Invalid Credentials";
        }
        
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo-container">
            <!-- <img src="css/images/logo.png" alt="logo"> -->
            <h3>Turisto<small>Explore Your Imagination In Nature</small></h3>

        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="login.php" class="nav-link">Login</a></li>
                <li><a href="signup.php" class="nav-link">SignUp</a></li>
                <li><a href="about.php" class="nav-link">Contact Us</a></li>
            </ul>

        </nav>
        <div class="acc">
            <i class=material-icons style="color: snow;">account_circle</i>
        </div>
    </header>
    <h2>Login With Your Account</h2>
    <main>
        <div class="container">
            <div class="heading">
                <h1>Log In</h1>
            </div>
            <form method="post" action="login.php">
                <div class="ttl">
                    <i class="material-icons" style="font-size: 20px; color:purple;">email</i><input type="email" name="email" value="<?php echo $email; ?>" placeholder="E-mail" required autocomplete="off">
                </div>
                <div class="ttl">
                    <i class="material-icons" style="font-size: 20px; color:purple">lock</i><input type="password" name="passwd" value="<?php echo $passwd; ?>" placeholder="Password" required autocomplete="off">
                </div>
                <div class="btn">
                    <input type="submit" class="sub" name="Login" value="Login">
                </div>
            </form>
            <div class="log">
                <a href="signup.php" class="login">Don't Have Account?</a>
            </div>
        </div>
    </main>

</body>

</html>