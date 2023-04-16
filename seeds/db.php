<?php
$con = mysqli_connect('localhost', 'B02_Campgrounds', 'K@7&F4!Cy9bi!YZ');
$db = "CREATE DATABASE IF NOT EXISTS b02_campgrounds";
mysqli_query($con,$db);
mysqli_select_db($con, 'b02_campgrounds');
$query = "CREATE TABLE IF NOT EXISTS `users`( `id` INT NOT NULL AUTO_INCREMENT , 
                        `username` VARCHAR(20) NOT NULL, 
                        `password` VARCHAR(20) NOT NULL, 
                        `firstName` VARCHAR(20) NOT NULL, 
                        `lastName` VARCHAR(20) NOT NULL, 
                        `phoneNumber` VARCHAR(20) NULL, 
                        `email` VARCHAR(30) NOT NULL, 
                        PRIMARY KEY (`id`));
                        
CREATE TABLE IF NOT EXISTS `availability` ( `id` INT NOT NULL AUTO_INCREMENT, 
                    `campground_id` INT NOT NULL , 
                    `date` DATE NOT NULL , 
                    `available_camps` INT NOT NULL ,
                                           PRIMARY KEY (`id`),
            CONSTRAINT FOREIGN KEY (`campground_id`)REFERENCES `campgrounds`(`id`) ON DELETE CASCADE);
                        
CREATE TABLE IF NOT EXISTS `campgrounds` ( `id` INT NOT NULL AUTO_INCREMENT, 
                    `title` VARCHAR(20) NOT NULL , 
                    `price` DOUBLE NOT NULL , 
                    `description` VARCHAR(180) NOT NULL , 
                    `location` VARCHAR(100) NOT NULL ,
                    `owner_id` INT NOT NULL,
                    `image_id` INT NOT NULL,
					`owner_id` INT NOT NULL,
                    `start_date` DATE NOT NULL,
					`end_date` DATE NOT NULL,
                    `camps_number` INT NOT NULL,
					`rating` DECIMAL NOT NULL ,
                    PRIMARY KEY (`id`),
            CONSTRAINT FOREIGN KEY (`owner_id`)REFERENCES `users`(`id`) ON DELETE CASCADE,
            CONSTRAINT FOREIGN KEY (`image_id`)REFERENCES `images`(`id`)ON DELETE CASCADE);                    
        
        
CREATE TABLE IF NOT EXISTS `images` ( `id` INT NOT NULL AUTO_INCREMENT , 
                    `url` VARCHAR(200) NULL , 
                    PRIMARY KEY (`id`));



CREATE TABLE IF NOT EXISTS `reviews` ( 
					`id` INT NOT NULL ,
					`userId` INT NOT NULL ,
                    `campId` INT NOT NULL,                  
                    `rating` ENUM('1','2','3','4','5') NOT NULL , 
                    `text` TEXT NOT NULL ,
            CONSTRAINT FOREIGN KEY (`userId`)REFERENCES `users`(`id`) ON DELETE CASCADE,
            CONSTRAINT FOREIGN KEY (`campId`)REFERENCES `campgrounds`(`id`) ON DELETE CASCADE,       
            CONSTRAINT PRIMARY KEY (`id`))";
?>
