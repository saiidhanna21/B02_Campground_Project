<?php
$query = "SELECT * FROM `campgrounds` WHERE `id`='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (!empty($_SESSION["username"])) {
    $query2 = "SELECT `id` FROM `users` WHERE `username`='$username';";
    $result2 = mysqli_query($con, $query2);
    $user = mysqli_fetch_assoc($result2);
    $userID = $user['id'];
}

$ownerID = $row['owner_id'];
$query3 = "SELECT `username` FROM `users` WHERE `id` = '$ownerID';";
$result3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_assoc($result3);
$ownerName = $row3['username'];

$query1 = "SELECT `url` FROM `images` WHERE `campground_id`='$id';";
$result1 = mysqli_query($con, $query1);
$images = mysqli_fetch_all($result1);
?>