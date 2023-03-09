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
    include('../../sanitize.php');
    $_POST = sanitize($_POST);
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
    
    if (mysqli_fetch_array($result)) {
        $arr["username"] = "";
        echo flash('Username already exists!', true);
    } else if (mysqli_fetch_array($result1)) {
        $arr["email"] = "";
        echo flash('Email already exists! Want to <a href="login.php">Log In</a>?', true);
    } else {
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