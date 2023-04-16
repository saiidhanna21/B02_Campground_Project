<?php
include('../../utils/connect.php');
include('../../views/partials/flash.php');
session_start();
$camp_id = $_GET['id'];
$query = "SELECT users.username,end_date FROM users JOIN campgrounds ON users.id = campgrounds.owner_id
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

$current_date = strtotime(date('Y-m-d'));
$end_date = strtotime($result['end_date']);

if ($current_date < $end_date) {
    $_SESSION["flash"] = flash("Current date must be greater than end date to perform this action", true);
    header("location:../../views/campgrounds/index.php");
    exit();
}

$camp = "DELETE FROM `campgrounds` WHERE `id`=$camp_id";
mysqli_query($con, $camp);
$_SESSION["flash"] = flash('You have deleted the campground succesfully!', false);
header('location:http://localhost:3000/views/campgrounds/index.php');
exit();
mysqli_close($con);
?>