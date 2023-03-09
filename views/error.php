<?php
error_reporting(E_ALL);

function myErrorHandler($errno, $errstr, $errfile, $errline){
    if($errno==2){
        header('location:http://localhost:3000/views/campgrounds/index.php');
        exit();
    }else{
        $errorMessage = "An error occured: ".$errstr;
        header('location:http://localhost:3000/views/errorView.php?message='.urlencode($errorMessage));
        exit();
    }
}

set_error_handler("myErrorHandler");
?>