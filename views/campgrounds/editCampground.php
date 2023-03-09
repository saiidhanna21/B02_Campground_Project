<?php
include('../layouts/boilerplate.php');
include('../../controllers/campgrounds/editCampground.php');
?>
<main class="container mt-5">
    <div class="row">
        <h1 class="text-center">New CampGround</h1>
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="validated-form" enctype="multipart/form-data" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="title">Title </label>
                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $campground['title'] ?>" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="location">Location:
                    </label>
                    <input class="form-control" type="text" name="location" id="location" value="<?php echo $campground['location'] ?>" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price">Campground Price: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="price-label">$</span>
                        <input type="number" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" value="<?php echo $campground['price'] ?>" name="price" step='0.01' min="0" required />
                        <div class="valid-feedback">Looks good!</div>
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
                    <!-- Go to home -->
                    <!-- <a class="btn btn-success" href="">Cancel</a> -->
                </div>
            </form>
        </div>
    </div>
</main>
<?php
//Needs Validation to check for errors
echo '<script src="../../public/javascripts/validateForms.js"></script>';
?>
</body>

</html>