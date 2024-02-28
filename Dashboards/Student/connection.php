<?php

$conn = "";

// This is the connection to the database
$severName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ace-train";

// Create connection
$conn = mysqli_connect($severName, $dbUsername, $dbPassword, $dbName);
if (!$conn){
    // This will stop the script from running and display the error
    die("Connection failed: ".mysqli_connect_error());
}

// pdo connection
try {
    $connPDO = new PDO("mysql:host=$severName;dbname=$dbName", $dbUsername, $dbPassword);
    // set the PDO error mode to exception
    $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}