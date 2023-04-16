<?php
include('../../utils/connect.php');
include('../../views/partials/flash.php');
session_start();
if (empty($_SESSION["username"])) {
    $_SESSION["flash"] = flash("Unauthorized access, please login before!", true);
    header("location:../../views/users/login.php");
    exit();
}
if (isset($_POST['add_review'])) {
        if (!empty($_POST)) {
            extract($_POST);
            $rating = $review_rating;
            $text = $review_body;
            echo $id;
            echo " ";
            echo $userID;
        echo " ";

            echo $rating;
        echo " ";


        echo $text;
            $query = "INSERT INTO reviews (userId ,  campId , rating , text)
                                VALUES ('$userID' , '$id' , '$rating' , '$text') ";
            mysqli_query($con, $query);

            // calculate updated rating for the camp

            $query = "SELECT AVG(rating)
                        FROM reviews
                        WHERE campId = '$id';
                        ";
            $answer = mysqli_fetch_assoc(mysqli_query($con, $query));
            $campground_rating = $answer['AVG(rating)'];



            $query = "UPDATE  campgrounds 
                            SET rating = '$campground_rating'
                            WHERE id = '$id'";
            mysqli_query($con, $query);
        }
}
header("location:../../views/campgrounds/show.php?id=".$id);
?>