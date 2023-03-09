<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campground</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/stylesheets/home.css">
</head>
<?php session_start();
include('error.php') ?>

<body class="d-flex text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-left mb-0">Campground</h3>
                <nav class="nav nav-masthead justify-content-center float-md-right">
                    <a href="#" class="nav-link active" aria-current="page">Home</a>
                    <a href="http://localhost:3000/views/campgrounds/index.php" class="nav-link">Campgrounds</a>
                    <?php if (!isset($_SESSION['username'])) {
                        echo '<a href="http://localhost:3000/views/users/login.php" class="nav-link">Login</a>
                        <a href="http://localhost:3000/views/users/signup.php" class="nav-link">Register</a>';
                    } else {
                        echo '<a href="http://localhost:3000/views/users/logout.php" class="nav-link">Logout</a>';
                    } ?>
                </nav>
            </div>
        </header>
        <main class="px-3">
            <h1>CampGround</h1>
            <p class="lead">
                Welcome to Campground! <br> Jump right in and explore our many campgrounds. <br>
                Feel free to share some of your own and comment on others!
            </p>
            <a href="./campgrounds/index.php" class="btn btn-lg btn-secondary font-weight-bold border-white bg-white">View CampGrounds</a>
        </main>
        <footer class="mt-auto text-white-50">
            <p>&copy;Campground</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>