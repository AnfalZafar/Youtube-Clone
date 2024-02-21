<?php

include("connection.php");

session_start();

if (!isset($_SESSION['id'])) {

    header("location:index.php");
}

if(isset($_POST["p_btn"])){
    $user_id = $_SESSION["id"];
    $title = $_POST["p_title"];
    $video_name = $_FILES["p_video"]["name"];
    $video_file = $_FILES["p_video"]["tmp_name"];
    $target = "video/" .basename($video_name);
    
    $insert = "INSERT INTO `post`(`post_title`, `post_video`, `users_foren`) VALUES ('$title','$video_name','$user_id')";
    $run = mysqli_query($connect , $insert);
    if($run){
        echo "
        <script>
        alert('Uploade Successfulley');
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
    <title>My Youtube</title>
    <link rel="icon" type="image/x-icon" href="img/youtube-logo-hd-8-removebg-preview.png">
    <link rel="stylesheet" href="css/create.css">
    <script src="https://kit.fontawesome.com/decf226a92.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- mobile navbar -->

    <div class="mobile_navbar">
        <ul>
            <li><a href="index.php"><button>Home</button></a></li>
            <li><a href="subscribe.php"><button>Subscribe</button></a></li>
            <li><a href="create.php"><button style="background: rgb(234, 230, 230);">Create</button></a></li>
            <li><a href="you.php"><button>You</button></a></li>
        </ul>
    </div>

    <!-- mobile navbar end -->

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
                <?php
                $id = $_SESSION["id"];
                $select = "SELECT * FROM `users` WHERE `users_id` = '$id' ";
                $run = mysqli_query($connect, $select);
                $fetch = mysqli_fetch_array($run);



                if ($fetch["users_img"] != null) {     ?>
                    <a href="you.php"><img src="img/<?php echo $fetch["users_img"] ?>" alt=""></a>

                <?php
                } else { ?>
                    <a href="you.php"><img src="img/a.jpg" alt=""></a>

                <?php
                }
                ?>
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
                    <a href="youtube.php"><button>Home</button></a>
                </div>

                <div class="icon">
                    <a href="subscribe.php"><button>Subscribe</button></a>
                </div>

                <div class="icon">
                    <a href="create.php"><button style="background: rgb(242,242,242);">Create</button></a>
                </div>

                <div class="icon">
                    <a href="you.php"><button>You</button></a>
                </div>


            </div>

            <!-- create Content -->

            <div class="create">
                <form method="post" enctype="multipart/form-data">

                    <div class="title">
                        <textarea type="text" name="p_title" placeholder="Enter Your Title" maxlength="55" rows="4" cols="50"></textarea>
                    </div>
                    <div class="create_img">
                        <input type="file" name="p_video">
                    </div>
                    <div class="create_btn">
                        <button name="p_btn">Submit</button>
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