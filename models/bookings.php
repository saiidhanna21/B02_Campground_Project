<?php
include('../utils/connect.php');
$table = "CREATE TABLE IF NOT EXISTS `bookings` ( 
                    `id` INT NOT NULL,
                    `userId` INT NOT NULL ,
                    `campId` INT NOT NULL,                  
                    `start_date` DATE NOT NULL , 
                    `end_date` DATE NOT NULL ,
    				`numberOfPersons` INT NOT NULL,
    				`cancel` ENUM('0','1') NOT NULL,
    				`phone_number` VARCHAR(80) NOT NULL,
    				`total_price` DECIMAL NOT NULL,
    		CONSTRAINT FOREIGN KEY (`userId`) REFERENCES `users`(`id`) ON DELETE CASCADE,
            CONSTRAINT FOREIGN KEY (`campId`) REFERENCES `campgrounds`(`id`) ON DELETE CASCADE,       
            CONSTRAINT PRIMARY KEY (`id`));";
if (!mysqli_query($con, $table)) {
    echo "Error creating table: " . mysqli_error($con);
    die;
}
echo "Table bookings Created";
?>