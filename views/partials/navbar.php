<nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Camp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav mr-auto"> <!-- Add the "mr-auto" class to align the navigation links to the left side -->
                <a class="nav-link" href="http://localhost:3000/views/home.php">Home</a>
                <a class="nav-link" href="http://localhost:3000/views/campgrounds/index.php">Campgrounds</a>
                <a class="nav-link" href="http://localhost:3000/views/campgrounds/addCampground.php">New Campground</a>
            </div>
            <div class="navbar-nav"> <!-- Remove the "ml-auto" class to align the login and signup links to the right side -->
                <?php if (!isset($_SESSION['username'])) {
                    echo '<a href="http://localhost:3000/views/users/login.php" class="nav-link">Login</a>
                      <a href="http://localhost:3000/views/users/signup.php" class="nav-link">Register</a>';
                } else {
                    echo '<a href="http://localhost:3000/views/users/logout.php" class="nav-link">Logout</a>';
                } ?>
            </div>
        </div>
    </div>
</nav>