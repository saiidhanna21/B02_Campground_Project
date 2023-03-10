<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `images` ( `id` INT NOT NULL AUTO_INCREMENT , 
                    `url` TEXT NOT NULL, 
                    PRIMARY KEY (`id`),
                    `campground_id` INT NOT NULL,
  					CONSTRAINT FOREIGN KEY (`campground_id`) REFERENCES `campgrounds`(`id`) ON DELETE CASCADE);";
if(!mysqli_query($con,$table)){
        echo "Error creating table: " . mysqli_error($con);
        die;
    }
echo "Table images Created";
?>