<?php

include("connection.php");
session_start();

if (!isset($_SESSION['id'])) {

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
    <link rel="stylesheet" href="css/user_view.css">
    <script src="https://kit.fontawesome.com/decf226a92.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- mobile navbar -->

    <div class="mobile_navbar">
        <ul>
            <li><a href="index.php"><button>Home</button></a></li>
            <li><a href="subscribe.php"><button>Subscribe</button></a></li>
            <li><a href="create.php"><button>Create</button></a></li>
            <li><a href="you.php"><button style="background: rgb(242,242,242);">You</button></a></li>
        </ul>
    </div>

    <!-- mobile navbar end -->

    <div class="main_container">

        <!-- header -->

        <header>

            <a href="youtube.php" class="logo"><img src="img/youtube-logo-hd-8-removebg-preview.png" alt=""></a>

            <div class="search_bar">
                <div class="search">
                    <input type="search" name="" placeholder="Search" id="">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
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
                    <a href="youtube.php"><button>Home</button></a>
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
            <div class="main_main">

                <!-- you img -->

                <div class="you_img">

                    <div class="user_subscribe">
                        <a href=""><button>Subscribe</button></a>
                    </div>

                    <div class="subscribers">
                        <h3>500 Subscribers</h3>
                    </div>
                </div>




                <!-- main -->

                <div class="main">

                    <?php

                    $get = $_GET["id"];
                    $select = "SELECT * FROM `post` WHERE `post_id` = $get";
                    $run = mysqli_query($connect, $select);
                    while ($data = mysqli_fetch_array($run)) { 
                        $user_id = $data["users_foren"];
                        $select_users = "SELECT * FROM `users` WHERE `users_id` = $user_id";
                        $con = mysqli_query($connect , $select_users);
                        $fetch = mysqli_fetch_array($con);
                        ?>
                    
                    <div class="first_card">
                        <a href="" class="first_card_img">
                            <video src="video/<?php echo $data["post_video"]?>"></video>
                        </a>
                        <div class="first_card_content">

                            <div class="content_descript">
                                <a href=""><img src="img/<?php echo $fetch["users_img"]?>" alt=""></a>
                                <p><?php echo $data["post_title"]?></p>
                            </div>
                            <div class="content_likes">
                                <p class="like">100 Likes</p>
                                <p class="view">1000 Views</p>
                            </div>

                        </div>
                    </div>

                    <?php
                    }


                    ?>
                    



                </div>

            </div>

        </div>


    </div>






</body>

</html>