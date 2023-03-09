<?php
    $con = mysqli_connect('localhost', 'B02_Campgrounds', 'K@7&F4!Cy9bi!YZ');
    if(!$con){
        echo "Error, while connecting to the database";
        die;
    }
    mysqli_select_db($con, 'b02_campgrounds');
?>