<?php
include('../layouts/boilerplate.php');
include('../../controllers/campgrounds/addCampground.php');
?>
<main class="container mt-5">
    <div class="row">
        <h1 class="text-center">New CampGround</h1>
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="validated-form" enctype="multipart/form-data" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="title">Title </label>
                    <input class="form-control" type="text" name="title" id="title" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="location">Location:
                    </label>
                    <input class="form-control" type="text" name="location" id="location" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Add Images</label>
                    <input class="form-control" type="file" id="image" name="images[]" multiple required accept="image/*" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price">Campground Price: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="price-label">$</span>
                        <input type="number" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" name="price" step='0.01' required />
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description:
                    </label>
                    <textarea class="form-control" type="text" name="description" id="description" required></textarea>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Submit</button>
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