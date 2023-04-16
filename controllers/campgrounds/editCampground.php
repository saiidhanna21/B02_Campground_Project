<?php
$camp_id = $_GET['id'];
$query = "SELECT users.username FROM users JOIN campgrounds ON users.id = campgrounds.owner_id
WHERE campgrounds.id = $camp_id";

$row = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($row);


if (empty($_SESSION["username"])) {
    $_SESSION["flash"] = flash("Please login before!", true);
    header("location:../users/login.php");
    exit();
} else if ($_SESSION['username'] != $result['username']) {
    header('location:http://localhost:3000/views/errorView.php?message=Unauthroied access!!');
    exit();
}
$camp = "SELECT * FROM `campgrounds` WHERE `id`=$camp_id";
$campground = mysqli_fetch_assoc(mysqli_query($con, $camp));
$images_query = "SELECT images.id,images.url FROM `images` JOIN `campgrounds` ON images.campground_id = campgrounds.id WHERE campgrounds.id=$camp_id";
$images = mysqli_fetch_all(mysqli_query($con, $images_query));

$current_date = strtotime(date('Y-m-d'));
$end_date = strtotime($campground['end_date']);

if($current_date>$end_date){
    $display = "display:''";
}else{
    $display = "display:none";
}

if (!empty($_POST)) {
    extract($_POST);

    if ($start_date > $end_date) {
        $_SESSION["flash"] = flash("End Date Must be greater then Start Date", true);
        header("location:../../views/campgrounds/editCampground.php?id=$camp_id");
        exit();
    }

    $query = "UPDATE `campgrounds` SET `title`='$title',
`price`='$price',`description`='$description',`location`='$location',`start_date`='$start_date',`end_date`='$end_date',`camps_number`='$camps_number' WHERE id=$camp_id";
    mysqli_query($con, $query);
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
    if (isset($deleteImages)) {
        foreach ($deleteImages as $image) {
            $query = "DELETE FROM `images` WHERE id=$image";
            mysqli_query($con, $query);
        }
    }

    $_SESSION["flash"] = flash('You have updated the campground succesfully!', false);
    header('location:index.php');
    exit();
}
?>
