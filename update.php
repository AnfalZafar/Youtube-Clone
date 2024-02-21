<?php

include("connection.php");
session_start();

if(!isset($_SESSION['id'])){

    header("location:index.php");
}

if (isset($_POST["e_btn"])) {
    $name = $_POST["e_name"];
    $email = $_POST["e_email"];
    $img_type = $_FILES["e_img"]["type"];
    if (strtolower($img_type == "image/png")  || strtolower($img_type == "image/jpeg") || strtolower($img_type == "image/jpg")) {
        $img_name = $_FILES["e_img"]["name"];
        $target = "img/" . basename($img_name);
        if (move_uploaded_file($_FILES["e_img"]["tmp_name"], $target)) {
            $id =  $_SESSION["id"];
            $select = "SELECT * FROM `users` WHERE `users_id` = '$id' ";
            $update = "UPDATE `users` SET `users_name`='$name',`users_email`='$email',`users_img`='$img_name' WHERE 1";
            $run = mysqli_query($connect, $update);
            if ($run) {
                echo "
            <script>
            alert('Update Successfulley wrong');
            </script>
            ";
                header("location:you.php");
            }
        }
    }
}
