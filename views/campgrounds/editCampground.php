<?php
include('../layouts/boilerplate.php');
include('../../controllers/campgrounds/editCampground.php');
if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>
<main class="container mt-5">
    <div class="row">
        <h1 class="text-center">Edit CampGround</h1>
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="validated-form" enctype="multipart/form-data" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="title">Title:</label>
                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $campground['title'] ?>" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div style="<?php echo $display; ?>">
                    <div class="mb-3">
                        <label class="form-label" for="location">Location:
                        </label>
                        <input class="form-control" type="text" name="location" id="location" value="<?php echo $campground['location'] ?>" required />
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="start_date">Start Date:
                                </label>
                                <input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo $campground['start_date'] ?>" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required />
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="end_date">End Date: (Up to 14 days)
                                </label>
                                <input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo $campground['end_date'] ?>" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">
                                    Please select a valid date within 14 days from the first date.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="camps_number">Available Camps:
                        </label>
                        <input class="form-control" type="number" name="camps_number" id="camps_number" value="<?php echo $campground['camps_number'] ?>" placeholder="0" aria-label="camps_number" aria-describedby="camps_number-label" name="camps_number" step='1' min='10' required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">
                            Minimum 10 Campgrounds
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price">Campground Price: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="price-label">$</span>
                            <input type="number" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" value="<?php echo $campground['price'] ?>" name="price" step='0.01' min="0" max="999" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Max 999$
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description:
                    </label>
                    <textarea class="form-control" type="text" name="description" id="description" required><?php echo $campground['description'] ?></textarea>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">Add Images</label>
                        <input class="form-control" type="file" id="image" name="images[]" multiple accept="image/*" />
                    </div>
                </div>
                <div class="container mb-3">
                    <?php
                    for ($i = 0; $i < count($images); $i += 2) {
                        echo '<div class="row">
                                    <div class="col-md-6 mb-2">
                                        <img src="' . $images[$i][1] . '" class="img-thumbnail w-100" alt="" style="height:90%;">
                                        <div class="form-check-inline">
                                            <input type="checkbox" id="image-' . $i . '" name="deleteImages[]" value="' . $images[$i][0] . '">
                                            <label for="image-' . $i . '">Delete</label>
                                        </div>
                                    </div>';
                        if ($i + 1 < count($images)) {
                            echo '<div class="col-md-6 mb-2">
                                        <img src="' . $images[$i + 1][1] . '" class="img-thumbnail w-100" style="height:90%;" alt="">
                                        <div class="form-check-inline">
                                            <input type="checkbox" id="image-' . ($i + 1) . '" name="deleteImages[]" value="' . $images[$i + 1][0] . '">
                                            <label for="image-' . ($i + 1) . '">Delete</label>
                                        </div>
                                    </div>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
echo '
    <script src="../../public/javascripts/validateForms.js"></script>
    <script src="../../public/javascripts/validateDate.js"></script>';
?>
</body>

</html>