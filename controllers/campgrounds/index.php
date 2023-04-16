<?php
$query = "SELECT * FROM `campgrounds`";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    do {
        $campId = $row['id'];
        $query1 = "SELECT `url` FROM `images` WHERE `campground_id`='$campId';";
        $result1 = mysqli_query($con, $query1);
        if (!mysqli_num_rows($result1)) {
            $row1['url'] = '../../assets/NO_PHOTO.jpg';
        } else {
            $row1 = mysqli_fetch_assoc($result1);
        }
        echo "<div class='card mb-3'>
                    <div class='row'>
                        <div class='col-md-4'>
                            <img src='" . $row1['url'] . "' alt='' class='img-fluid'
                            crossorigin='anonymous'>
                        </div>
                        <div class='col-md-7'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row['title'] . "</h5>
								<p class='card-text'>OPEN From ". $row['start_date'] ." till ". $row['end_date']."</p>
                                <p class='card-text'>
                                    <small class='text-muted'>" . $row['location'] . " </small>
                                </p>
								<h6 class='card-text'><small class='text-muted'>".$row['price'] . "$/night"."</small></h6>
                                <a class='btn btn-primary' href='http://localhost:3000/views/campgrounds/show.php?id=" . $row['id'] . "'>View " . $row['title'] . "</a>
                            </div>
                        </div>
                    </div>
                </div>";
    } while ($row = mysqli_fetch_assoc($result));
}
mysqli_close($con);
?>