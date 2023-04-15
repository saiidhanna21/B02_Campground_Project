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

    if ($start_date > $end_date) {
        $_SESSION["flash"] = flash("End Date Must be greater then Start Date", true);
        header("location:../../views/campgrounds/addCampground.php");
        exit();
    }

    $user = $_SESSION["username"];
    $owner = "SELECT `id` FROM `users` WHERE `username`='$user';";
    $result = mysqli_query($con, $owner);
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['id'];
    $query = "INSERT INTO `campgrounds`(`title`, `price`, `description`, `location`,`owner_id`,`camps_number`,`start_date`,`end_date`)
            VALUES ('$title','$price','$description','$location','$owner_id','$camps_number','$start_date','$end_date')";

    mysqli_query($con, $query);

    $lastCamp = "SELECT `id` FROM `campgrounds` ORDER BY `id` DESC LIMIT 1";
    $campground = mysqli_fetch_assoc(mysqli_query($con, $lastCamp));
    $camp_id = $campground['id'];

    $query1 = "SELECT DATEDIFF(`end_date`, `start_date`) as `days_between`,`start_date` FROM `campgrounds` WHERE `id`='$camp_id';";

    $res = mysqli_fetch_assoc(mysqli_query($con, $query1));
    $date = $res['start_date'];

    for($i=0;$i<=$res['days_between'];$i++){
        $query2 = "INSERT INTO `availability`(`campground_id`, `date`, `available_camps`) VALUES ('$camp_id','$date','$camps_number')";
        mysqli_query($con, $query2);
        $baseTime = strtotime($date);
        $date = date('Y-m-d', strtotime('+1 day', $baseTime));
    }

    if (!empty($_FILES)) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $fileTmpName = $_FILES['images']['tmp_name'][$key];
            $uploadDir = '../../assets/' . $name;
            // Move the uploaded file to the assets directory
            if (move_uploaded_file($fileTmpName, $uploadDir)) {
                $query_images = "INSERT INTO `images`(`url`,`campground_id`) VALUES ('$uploadDir','$camp_id')";
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
