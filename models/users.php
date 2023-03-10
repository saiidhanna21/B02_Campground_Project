<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `users`( `id` INT NOT NULL AUTO_INCREMENT , 
                        `username` VARCHAR(20) NOT NULL, 
                        `password` VARCHAR(300) NOT NULL, 
                        `firstName` VARCHAR(20) NOT NULL, 
                        `lastName` VARCHAR(20) NOT NULL, 
                        `phoneNumber` VARCHAR(20) NULL, 
                        `email` VARCHAR(30) NOT NULL, 
                        PRIMARY KEY (`id`));";
if(!mysqli_query($con,$table)){
        echo "Error creating table: " . mysqli_error($con);
        die;
    }
echo "Table users Created";
?>