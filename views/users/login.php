<?php
include('../layouts/boilerplate.php');
include("../../controllers/users/login.php");
?>
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1571863533956-01c88e79957e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80" alt="" class="card-img-top" />
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="validated-form" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="username_OR_email">Username or Email </label>
                            <input class="form-control" type="text" name="username_OR_email" id="username_OR_email" required autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password </label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
echo '<script src="../../public/javascripts/validateForms.js"></script>';
?>

</html>