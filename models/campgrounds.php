<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `campgrounds` ( `id` INT NOT NULL AUTO_INCREMENT, 
                    `title` VARCHAR(20) NOT NULL , 
                    `price` DOUBLE NOT NULL , 
                    `description` VARCHAR(180) NOT NULL , 
                    `location` VARCHAR(100) NOT NULL ,
                    `owner_id` INT NOT NULL,                  
                    PRIMARY KEY (`id`),
            CONSTRAINT FOREIGN KEY (`owner_id`)REFERENCES `users`(`id`) ON DELETE CASCADE);";
if(!mysqli_query($con,$table)){
        echo "Error creating table: " . mysqli_error($con);
        die;
    }
echo "Table campgrounds Created";
?>