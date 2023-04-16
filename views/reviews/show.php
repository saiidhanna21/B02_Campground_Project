<?php
$search_reviews = "SELECT * 
                FROM reviews WHERE campId = '$id'";

$answer1 = mysqli_query($con, $search_reviews);
while ($getReview = mysqli_fetch_assoc($answer1)) {

    $reviewId = $getReview['id'];
    $reviewer = $getReview['userId'];
    $query = "SELECT * FROM users WHERE id='$reviewer'";
    $answer2 = mysqli_query($con, $query);
    $getUsername = mysqli_fetch_assoc($answer2);

    echo '           
            <div class="mb-3 card">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">' . $getUsername['username'] . '</h6>
                    <p class="starability-result" data-rating="' . $getReview['rating'] . '">
                    Rated:' . $getReview['rating'] . 'stars
                </p>
                <p class="card-text">
                Review:' . $getReview['text'] . '
            </p>';

    //display delete buttons if the review is made by the logged in user
    if (!empty($_SESSION["username"])) {
        if ($username == $getUsername['username']) {
            echo '  
                <form action="../../controllers/reviews/deleteReview.php?reviewId=' . $reviewId . '&campID=' . $id . '" method="post">
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>';
        }
    }
    echo '</div>
        </div>';
}
?>