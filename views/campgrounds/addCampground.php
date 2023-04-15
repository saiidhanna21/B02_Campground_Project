<?php
include('../layouts/boilerplate.php');
include('../../controllers/campgrounds/addCampground.php');
if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>
<main class="container mt-5">
    <div class="row">
        <h1 class="text-center">New CampGround</h1>
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="validated-form" enctype="multipart/form-data" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="title">Title*: </label>
                    <input class="form-control" type="text" name="title" id="title" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="location">Location*:
                    </label>
                    <input class="form-control" type="text" name="location" id="location" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Add Images*:</label>
                    <input class="form-control" type="file" id="image" name="images[]" multiple required accept="image/*" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="camps_number">Available Campgrounds*: </label>
                    <input type="number" class="form-control" id="camps_number" placeholder="0" aria-label="camps_number" aria-describedby="camps_number-label" name="camps_number" step='1' min='10' required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">
                        Minimum 10 Campgrounds
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="start_date" class="form-label">Start Date*:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-6">
                            <label for="end_date" class="form-label">End Date*: (Up to 14 days)</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Please select a valid date within 14 days from the first date.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price">Camp Price*: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="price-label">$</span>
                        <input type="number" class="form-control" id="price" placeholder="0.00" aria-label="price" aria-describedby="price-label" name="price" step='0.01' min='0' max='999' required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">
                            Max 999$
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description*:
                    </label>
                    <textarea class="form-control" type="text" name="description" id="description" required></textarea>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
//Needs Validation to check for errors
echo '
    <script src="../../public/javascripts/validateForms.js"></script>
    <script src="../../public/javascripts/validateDate.js"></script>';
?>
</body>

</html>