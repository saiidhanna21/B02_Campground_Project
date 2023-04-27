<?php
if (empty($_POST)) {
    $arr = array();
    $arr["firstName"] = "";
    $arr["lastName"] = "";
    $arr["username"] = "";
    $arr["phoneNumber"] = "";
    $arr["email"] = "";
    $arr["password"] = "";
} else {
    extract($_POST);

    $arr["firstName"] = $firstName;
    $arr["lastName"] = $lastName;
    $arr["username"] = $username;
    if (empty($phoneNumber)) $phoneNumber = "";
    $arr["phoneNumber"] = $phoneNumber;
    $arr["email"] = $email;
    $arr["password"] = $password;

    $query = "SELECT * FROM `users` WHERE `username`='$username'";
    $result = mysqli_query($con, $query);
    $query1 = "SELECT * FROM `users` WHERE `email`='$email'";
    $result1 = mysqli_query($con, $query1);
    
    $pattern = "/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+-=])[a-zA-Z0-9!@#$%^&*()_+-=]{8,}$/";
    if (mysqli_fetch_array($result)) {
        $arr["username"] = "";
        echo flash('Username already exists!', true);
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $arr["email"] = "";
        echo flash('Not a valid email', true);
    } else if (mysqli_fetch_array($result1)) {
        $arr["email"] = "";
        echo flash('Email already exists! Want to <a href="login.php">Log In</a>?', true);
    } else if(!preg_match($pattern,$password)){
        $arr["password"] = "";
        echo flash('Password must consist of at least 8 characters, including one uppercase letter and one symbol (e.g. ! @ # $ % ^ & * ( ) _ + - =)', true);
    }else {
        $_SESSION["username"] = $username;
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `phoneNumber`, `email`)
VALUES ('$username', '$hashed', '$firstName', '$lastName', '$phoneNumber', '$email');";
        $result = mysqli_query($con, $query);
        $_SESSION["flash"] = flash('Welcome home ' . $username, false);
        header("Location:../campgrounds/index.php");
    }
}
?>