<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `reviews` ( 
					`id` INT NOT NULL ,
					`userId` INT NOT NULL ,
                    `campId` INT NOT NULL,                  
                    `rating` ENUM('1','2','3','4','5') NOT NULL , 
                    `text` TEXT NOT NULL ,
            CONSTRAINT FOREIGN KEY (`userId`)REFERENCES `users`(`id`) ON DELETE CASCADE,
            CONSTRAINT FOREIGN KEY (`campId`)REFERENCES `campgrounds`(`id`) ON DELETE CASCADE,       
            CONSTRAINT PRIMARY KEY (`id`))";
if(!mysqli_query($con,$table)){
        echo "Error creating table: " . mysqli_error($con);
        die;
    }
echo "Table reviews Created";
?>
