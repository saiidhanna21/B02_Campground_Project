<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `availability` ( `id` INT NOT NULL AUTO_INCREMENT, 
                    `campground_id` INT NOT NULL , 
                    `date` DATE NOT NULL , 
                    `available_camps` INT NOT NULL ,
                                           PRIMARY KEY (`id`),
            CONSTRAINT FOREIGN KEY (`campground_id`)REFERENCES `campgrounds`(`id`) ON DELETE CASCADE);";
if(!mysqli_query($con,$table)){
        echo "Error creating table: " . mysqli_error($con);
        die;
    }
echo "Table availability Created";
?>
