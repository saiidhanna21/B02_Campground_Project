<?php
include('../../utils/connect.php');
include('../../views/partials/flash.php');
session_start();
$camp_id = $_GET['id'];
$query = "SELECT users.username FROM users JOIN campgrounds ON users.id = campgrounds.owner_id
WHERE campgrounds.id = $camp_id";

$row = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($row);


if (empty($_SESSION["username"])) {
    $_SESSION["flash"] = flash("Please login before!", true);
    header("location:http://localhost:3000/views/users/login.php");
    exit();
} else if ($_SESSION['username'] != $result['username']) {
    header('location:http://localhost:3000/views/errorView.php?message=Unauthroied access!!');
    exit();
}
$camp = "DELETE FROM `campgrounds` WHERE `id`=$camp_id";
mysqli_query($con, $camp);
$_SESSION["flash"] = flash('You have deleted the campground succesfully!', false);
header('location:http://localhost:3000/views/campgrounds/index.php');
exit();
mysqli_close($con);
?>