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


// take the post request from the form
if(isset($_POST["submit"])){
    $student_id = $_POST['studentID'];
    $assignment_id = $_POST['assignmentID'];
    $file_name = $_FILES['assignment_submission']['name'];
    $file_temp = $_FILES['assignment_submission']['tmp_name'];



    // create file for the user to upload the file if it does not exist
    if (!file_exists("../../assets/studentFileUpload/".$student_id)) {
        mkdir("../../assets/studentFileUpload/".$student_id, 0777, true);
    }
    // move the file to the directory
    if(move_uploaded_file($file_temp, "../../assets/studentFileUpload/".$student_id."/".$file_name)) {
        // File uploaded successfully, insert into database
        $sql = "INSERT INTO assignmentupload (studentID, assID, upload_path)
                VALUES ('$student_id', '$assignment_id', 'assets/studentFileUpload/$student_id/$file_name')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully and record inserted.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

