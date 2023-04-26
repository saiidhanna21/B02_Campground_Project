<?php
include('../layouts/boilerplate.php');
include("../../controllers/users/signup.php");
?>
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xl-6 offset-xl-3">
            <div class="card shadow">
                <img src="https://images.unsplash.com/photo-1571863533956-01c88e79957e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80" alt="" class="card-img-top" />
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="validated-form" novalidate>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="firstName">FirstName</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $arr['firstName'] ?>" required autofocus>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="lastName">LastName</label>
                                <input class="form-control" type="text" id="lastName" name="lastName" value="<?php echo $arr['lastName'] ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?php echo $arr['username'] ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $arr['email'] ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" value="<?php echo $arr['password'] ?>" pattern="^(?=.*[A-Z])(?=.*[!@#$%^&*()_+-=])[a-zA-Z0-9!@#$%^&*()_+-=]{8,}$" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please use at least 8 characters, including one uppercase letter and one symbol (e.g. ! @ # $ % ^ & * ( ) _ + - =)
                            </div>
                        </div>
                        <!-- We may remove it -->
                        <div class="mb-3">
                            <label class="form-label" for="phoneNumber">PhoneNumber</label>
                            <input class="form-control" type="tel" id="phoneNumber" pattern="+961-[0-9]{8}" placeholder="+961-{555...}" name="phoneNumber" value="<?php echo $arr['phoneNumber'] ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-success btn-block">Register</button>
                    </form>
                    <div class="mt-3">
                        <a href="login.php">Have an account? Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo '<script src="../../public/javascripts/validateForms.js"></script>';
?>
</body>

</html>