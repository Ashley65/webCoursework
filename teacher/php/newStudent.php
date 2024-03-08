<?php
include "../../overall/config/connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['student_email'])) {
        echo "<script>alert('Please fill in all the fields')</script>";
        echo "<script>window.location.href='newStudent.php'</script>";
    } else {
        //get the user userID from the users table using the username and store it in a variable
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $student_id = $user['id'];

            if ($student_id) {
                // Prepare the SQL statement
                $stmt2 = $conn->prepare("INSERT INTO student (student.userID, student.student_email) VALUES (?, ?)");

                // Bind the parameters
                $stmt2->bind_param("is", $student_id, $_POST['student_email']);

                // Execute the statement
                $stmt2->execute();

                // Redirect to the dashboard
                header("Location: /aceTrain/teacher/php/enrolment.php");
                session_write_close();
            } else {
                echo "<script>alert('No user ID found for the username: " . $_POST['username'] . "')</script>";
                echo "<script>window.location.href='newStudent.php'</script>";
            }
        } else {
            echo "<script>alert('No user found with the username: " . $_POST['username'] . "')</script>";
            echo "<script>window.location.href='newStudent.php'</script>";
        }
    }
}
