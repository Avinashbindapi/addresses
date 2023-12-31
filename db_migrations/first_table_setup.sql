CREATE TABLE addresses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(60),
  last_name VARCHAR(20),
  email VARCHAR(40),
  street VARCHAR(80),
  zip_code INT(8),
  city_id INT
);

CREATE TABLE cities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  city_name VARCHAR(40)
);

CREATE TABLE groups (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    parent_id INT(11) DEFAULT 0,
    group_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `address_book`.`address_to_group` (
  `group_id` INT(11) NOT NULL   ,
  `address_id` INT(11) NOT NULL 
) ENGINE = InnoDB; 

ALTER TABLE `address_to_group` DROP PRIMARY KEY, ADD PRIMARY KEY(`group_id`, `address_id`); 