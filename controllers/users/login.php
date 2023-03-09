<?php
    if (isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
    if (!empty($_POST)) {
        extract($_POST);
        if (!filter_var($username_OR_email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT * FROM `users` WHERE `username`='$username_OR_email';";
        } else {
            $query = "SELECT * FROM `users` WHERE `email`='$username_OR_email';";
        }
        $result = mysqli_query($con, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["username"] = $row['username'];
                $_SESSION["flash"] = flash('Welcome back ' . $row['username'], false);
                header('Location:../campgrounds/index.php');
                exit();
            }
        }
        echo flash('Incorrect Username/Email or Password', true);
    }
    mysqli_close($con);
?>