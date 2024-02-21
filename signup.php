<?php

include("connection.php");
session_start();

if(isset($_SESSION["id"])){
    header("location:youtube.php");
}

if (isset($_POST["s_btn"])) {
    $email = $_POST["s_email"];
    $pass = $_POST["s_pass"];
    $select = "SELECT * FROM `users`";
    $run = mysqli_query($connect, $select);
    $fetch = mysqli_fetch_array($run);
    if ($fetch["users_email"] == $email & $fetch["users_password"] == $pass) {
        $_SESSION["id"] = $fetch["users_id"];
        $_SESSION["name"] = $fetch["users_name"];
        $_SESSION["email"] = $fetch["users_email"];
        $_SESSION["pass"] = $fetch["users_password"];
        $_SESSION["img"] = $fetch["users_img"];
        header("location:youtube.php");

    }else{
        echo "
        <script>
        alert('Email or Password is wrong');
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image" href="img/youtube-logo-hd-8-removebg-preview.png">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>


    <div class="container">
        <form method="post" enctype="multipart/form-data">

            <div class="form_header">
                <h1>Sign In</h1>
            </div>

            <div class="form_input">
                <div class="input">
                    <input type="email" name="s_email" placeholder="Enter Your Email">
                </div>
                <div class="input">
                    <input type="text" name="s_pass" placeholder="Enter Your Password">
                </div>
                <div class="account">
                    <div class="remember">
                        <input type="radio" name="" id="">
                        <p>Remember me</p>
                    </div>
                    <a href="">Forget Password</a>
                </div>
                <div class="btn">
                    <button name="s_btn">Sign In</button>
                </div>
            </div>


        </form>
    </div>



</body>

</html>