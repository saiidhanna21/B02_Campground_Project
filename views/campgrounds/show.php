<?php
include("../layouts/boilerplate.php");
$id = $_GET["id"];
if (!empty($_SESSION["username"])) $username = $_SESSION["username"];
?>
<html>
<header>
    <link rel="stylesheet" href="../../public/stylesheets/stars.css">
</header>
<div class="container">
    <div class="row mt-2">
        <div class="col-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    include('../../controllers/campgrounds/show.php');
                    if (count($images) == 0) {
                        echo '<div class="carousel-item active">
                        <img src="../../assets/NO_PHOTO.jpg" class="d-block w-100"
                        class="card-img-top" alt="" crossorigin="anonymous"></div></div>';
                    } else {
                        for ($i = 0; $i < count($images); $i++) {
                            $active = $i == 0 ? "active" : "";
                            echo '<div class="carousel-item ' . $active . '">
                        <img src="' . $images[$i][0] . '" class="d-block w-100 "
                        class="card-img-top" alt="" crossorigin="anonymous"></div>';
                        }
                        echo '</div>';
                        if (count($images) > 1) {
                            echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>';
                        }
                    }
                    echo '</div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">' . $row["title"] . '</h5>
                <p class="card-text">' . $row["description"] . '</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-muted">' . $row["location"] . '</li>
                <li class="list-group-item text-muted">Owned by ' . $ownerName . '</li>
				<li class="list-group-item">OPEN From ' . $row["start_date"] . " till " . $row["end_date"] . '</li>
                <li class="list-group-item">$' . $row["price"] . '/night</li>
			    <li class="list-group-item">Number of available camps is ' . $row["camps_number"] . '</li>
            </ul>';
                    if (!empty($_SESSION["username"])) {
                        if ($userID == $ownerID) {
                            echo '<div class="card-body">
                <a href="http://localhost:3000/views/campgrounds/editCampground.php?id=' . $row['id'] . '" class="card-link btn btn-info">Edit</a>
                <a class="btn btn-danger" class="card-link" href="../../controllers/campgrounds/deleteCampground.php?id=' . $row['id'] . '"">Delete</a>
                </div>';
                        }
                    }
                    echo '
                </div>
            </div>'; ?>
                        <div class="col-4 offset-1">
                            <h2>Leave a Review</h2>
                                <form action="../../controllers/reviews/addReview.php" method="post" class="mb-3 validated-form" novalidate>
                                    <input type="hidden" name="id" value="<?php echo $id?>"/>
                                    <input type="hidden" name="userID" value="<?php echo $userID?>"/>
                                    <div>
                                        <fieldset class="starability-basic">
                                            <input type="radio" id="no-rate" class="input-no-rate" name="review_rating" value="5" checked aria-label="No rating." />
                                            <input type="radio" id="first-rate1" name="review_rating" value="1" />
                                            <label for="first-rate1" title="Terrible">1 star</label>
                                            <input type="radio" id="first-rate2" name="review_rating" value="2" />
                                            <label for="first-rate2" title="Not good">2 stars</label>
                                            <input type="radio" id="first-rate3" name="review_rating" value="3" />
                                            <label for="first-rate3" title="Average">3 stars</label>
                                            <input type="radio" id="first-rate4" name="review_rating" value="4" />
                                            <label for="first-rate4" title="Very good">4 stars</label>
                                            <input type="radio" id="first-rate5" name="review_rating" value="5" />
                                            <label for="first-rate5" title="Amazing">5 stars</label>
                                        </fieldset>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="review_body">Review</label>
                                        <textarea class="form-control" name="review_body" id="review_body" cols="30" rows="3" required></textarea>
                                        <div class="valid-feedback">
                                            Looks Good
                                        </div>
                                    </div>
                                    <button name='add_review' class="btn btn-success">Submit</button>

                                </form>
                                <?php
                                    include('../reviews/show.php');
                                    echo '<script src="../../public/javascripts/validateForms.js"></script>';
                                ?>                        