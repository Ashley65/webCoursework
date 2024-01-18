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
