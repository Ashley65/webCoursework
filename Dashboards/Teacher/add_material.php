<?php
include "../Student/connection.php";
global $conn;

if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['courseId'];
    $material_name = $_POST['materialName'];
    $materialDescription = $_POST['materialDescription'];
    $fileType = $_POST['fileType'];

    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Directory where files will be uploaded
    $upload_dir = "uploads/";

    // Move uploaded file to permanent location
    if(move_uploaded_file($file_temp, $upload_dir . $file_name)) {
        // File uploaded successfully, insert into database
        $sql = "INSERT INTO coursematerial (courseID, materialName, materialDescription, fileType, material_path)
                VALUES ('$course_id', '$material_name', '$materialDescription ', '$file_type', '$upload_dir$file_name')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully and record inserted.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }

    header("location: TeacherMain.php");
}