<?php
include('../../views/layouts/boilerplate.php');
$campId = $_GET['campID'];
$reviewId = $_GET['reviewId'];

$delete_query = "DELETE 
                    FROM reviews
                    WHERE id='$reviewId'";
mysqli_query($con, $delete_query);



$query = "SELECT AVG(rating)
                        FROM reviews
                        WHERE campId = '$campId';
                        ";
                $answer = mysqli_fetch_assoc(mysqli_query($con , $query));
                
                $campground_rating = $answer['AVG(rating)'];
                if($campground_rating ==NULL){
                    $campground_rating = 5.0;
                }
                
            
                $query = "UPDATE  campgrounds 
                            SET rating = '$campground_rating'
                            WHERE id = '$campId'";
                mysqli_query($con , $query);
header("location:../../views/campgrounds/show.php?id=" . $campId);
?>