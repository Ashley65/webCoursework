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

// Process file upload
if(isset($_POST["submit"])) {
    $course_id = $_POST['course_id'];
    $material_name = $_POST['material_name'];
    $description = $_POST['description'];

    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Directory where files will be uploaded
    $upload_dir = "uploads/";

    // Move uploaded file to permanent location
    if(move_uploaded_file($file_temp, $upload_dir . $file_name)) {
        // File uploaded successfully, insert into database
        $sql = "INSERT INTO coursematerial (courseID, materialName, materialDescription, fileType, material_path)
                VALUES ('$course_id', '$material_name', '$description', '$file_type', '$upload_dir$file_name')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully and record inserted.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

$conn->close();
