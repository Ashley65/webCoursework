<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}
// the is code is used to create the database

$sql = "CREATE DATABASE IF NOT EXISTS ace-train";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " .$conn->error;
}
$createTable1 = "CREATE TABLE IF NOT EXISTS `ace-train`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `Firstname` VARCHAR(45) NOT NULL,
    `Surename` VARCHAR(45) NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `phone` VARCHAR(45) NOT NULL,
    `role` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`));";
if ($conn->query($createTable1) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " .$conn->error;

}
$createTable2 = "CREATE TABLE IF NOT EXISTS `ace-train`.`events` (
    `id_events` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45) NOT NULL,
    `date` DATE NOT NULL,
    'created' DATETIME NOT NULL,
    .`modified` DATETIME NOT NULL,
    `status` INT NOT NULL,
    PRIMARY KEY (`id_events`));";

if ($conn->query($createTable2) === TRUE) {
    echo "Table events created successfully";
} else {
    echo "Error creating table: " .$conn->error;
}

$conn->close();