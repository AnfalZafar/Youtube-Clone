<?php

include("connection.php");
session_start();
if(isset($_SESSION["id"])){
    header("location:youtube.php");
}

if (isset($_POST["u_btn"])) {
    $name = $_POST["u_name"];
    $email = $_POST["u_email"];
    $pass = $_POST["u_pass"];
    if (!empty($name) && !empty($email) && !empty($pass)) {

        $select = "SELECT * FROM `users` WHERE `users_name` = '$name' OR `users_email` = '$email'";
        $run = mysqli_query($connect, $select);

        if ($run) {
            if (mysqli_num_rows($run) != 0) {
                $fetch = mysqli_fetch_array($run);
                if ($fetch["users_name"] == $name) {
                    echo "
    <script>
    alert('User Name Already Taken');
    </script>
    ";
                } else {
                    echo "
    <script>
    alert('User Email Already Taken');
    </script>
    ";
                }
            } else {
                $insert = "INSERT INTO `users`(`users_name`, `users_email`, `users_password`) VALUES ('$name','$email','$pass')";
                $run = mysqli_query($connect, $insert);
                if($run){
                    echo "
                    <script>
                    alert('Insert Successfulley');
                    </script>
                    ";
                    header("location:signup.php");

                }
               
            }
        } else {
            echo "
        <script>
        alert('Fill HEllo');
        </script>
        ";
        }
    } else {
        echo "
        <script>
        alert('Fill All Input File');
        </script>
        ";
    };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image" href="img/youtube-logo-hd-8-removebg-preview.png">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>


    <div class="container">
        <form method="post" enctype="multipart/form-data">

            <div class="form_header">
                <h1>Sign Up</h1>
            </div>

            <div class="form_input">
                <div class="input">
                    <input type="text" name="u_name" placeholder="Enter Your Name">
                </div>
                <div class="input">
                    <input type="email" name="u_email" placeholder="Enter Your Email">
                </div>
                <div class="input">
                    <input type="text" name="u_pass" placeholder="Enter Your Password">
                </div>
                <div class="account">
                    <p>Already have an account?</p>
                    <a href="signup.php">Sign In</a>
                </div>
                <div class="btn">
                    <button name="u_btn">Sign Up</button>
                </div>
            </div>


        </form>
    </div>



</body>

</html>