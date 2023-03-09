<?php
if (empty($_SESSION["username"])) {
    $_SESSION["flash"] = flash("Unauthorized access, please login before!", true);
    header("location:../users/login.php");
    exit();
}
if (!empty($_POST)) {
    include('../../utils/sanitize.php');
    $_POST = sanitize($_POST);
    extract($_POST);
    $user = $_SESSION["username"];
    $owner = "SELECT `id` FROM `users` WHERE `username`='$user';";
    $result = mysqli_query($con, $owner);
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['id'];
    $query = "INSERT INTO `campgrounds`(`title`, `price`, `description`, `location`, `owner_id`)
VALUES ('$title','$price','$description','$location','$owner_id')";

    mysqli_query($con, $query);

    $lastCamp = "SELECT `id` FROM `campgrounds` ORDER BY `id` DESC LIMIT 1";
    $campground = mysqli_fetch_assoc(mysqli_query($con, $lastCamp));

    if (!empty($_FILES)) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $fileTmpName = $_FILES['images']['tmp_name'][$key];
            $uploadDir = '../../assets/' . $name;
            // Move the uploaded file to the assets directory
            if (move_uploaded_file($fileTmpName, $uploadDir)) {
                $query_images = "INSERT INTO `images`(`url`,`campground_id`) VALUES ('$uploadDir','" . $campground['id'] . "')";
                mysqli_query($con, $query_images);
            } else {
                echo "Error uploading file.";
            }
        }
    }
    $_SESSION["flash"] = flash('You have added a campground succesfully!', false);
    header('location:index.php');
    exit();
}
?>