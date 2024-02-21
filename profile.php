<?php

include("connection.php");
session_start();

if(!isset($_SESSION['id'])){

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Youtube</title>
    <link rel="icon" type="image/x-icon" href="img/youtube-logo-hd-8-removebg-preview.png">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/decf226a92.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- mobile navbar -->

    <div class="mobile_navbar">
        <ul>
            <li><a href="index.php"><button style="background: rgb(234, 230, 230);">Home</button></a></li>
            <li><a href="subscribe.php"><button>Subscribe</button></a></li>
            <li><a href="create.php"><button>Create</button></a></li>
            <li><a href="you.php"><button>You</button></a></li>
        </ul>
    </div>


    <div class="main_container">

       <!-- header -->

       <header>

        <a href="youtube.php" class="logo"><img src="img/youtube-logo-hd-8-removebg-preview.png" alt=""></a>

        <div class="search_bar">
            <form method="post" class="search">
                <input type="search" name="" placeholder="Search" id="">
                <button name=""><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="profile">
            <a href="you.php"><img src="img/manimg.webp" alt=""></a>
        </div>
        <div class="Login">
            <button>Sign In</button>
        </div>


    </header>
        <!-- Main -->

        <div class="mian_content">

            <!-- Side Bar -->

            <div class="side_bar">

                <div class="icon">
                    <a href="youtube.php"><button style="background: rgb(242,242,242);">Home</button></a>
                </div>

                <div class="icon">
                    <a href="subscribe.php"><button>Subscribe</button></a>
                </div>

                <div class="icon">
                    <a href="create.php"><button>Create</button></a>
                </div>

                <div class="icon">
                    <a href="you.php"><button>You</button></a>
                </div>


            </div>


            <!-- Main Content -->

            <div class="container">
                <?php
                $id =  $_SESSION["id"];
                $select = "SELECT * FROM `users` WHERE `users_id` = '$id' ";
                $run = mysqli_query($connect, $select);
                $fetch = mysqli_fetch_array($run);
                
                ?>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <div class="input">
                        <input type="text" name="e_name" value="<?php echo $fetch["users_name"]?>">
                    </div>
                    <div class="input">
                        <input type="email" name="e_email" value="<?php echo $fetch["users_email"]?>">
                    </div>
                    <div class="input">
                        <input type="file" name="e_img" value="<?php echo $fetch["users_img"]?>">
                    </div>
                    <div class="form_btn">
                        <button name="e_btn">Edit</button>
                    </div>



                </form>
            </div>

        </div>


    </div>

<!-- serach bar output -->

<div class="serach_output">
    <div class="output_name">

        <div class="o_name">
            <h4>How to make youtube video and thumbline</h4>
        </div>

        <div class="o_name">
            <h4>How to make youtube video and thumbline</h4>
        </div>

        <div class="o_name">
            <h4>How to make youtube video and thumbline</h4>
        </div>

        <div class="o_name">
            <h4>How to make youtube video and thumbline</h4>
        </div>


    </div>
</div>


</body>

</html>