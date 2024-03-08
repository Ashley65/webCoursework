<?php
include "../../overall/config/connection.php";
global $conn;

echo "Begin to create assignment";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Post request received";
    if (empty($_POST['assignment_name']) || empty($_POST['course_id']) || empty($_POST['instructor_id']) || empty($_POST['assignment_type']) || empty($_POST['assignment_points']) || empty($_POST['assignment_description']) || empty($_POST['assignment_due_date'])) {
        echo "<script>alert('Please fill in all the fields')</script>";
        echo "<script>window.location.href='assignmentCreator.php'</script>";
    } else {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO assignment (assignmentName, courseID, instructorID, assignment_type, assignment_points, assignmentDescription, assignment.dueDate) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("siisiss", $_POST['assignment_name'], $_POST['course_id'], $_POST['instructor_id'], $_POST['assignment_type'], $_POST['assignment_points'], $_POST['assignment_description'], $_POST['assignment_due_date']);

        // Execute the statement
        $stmt->execute();

        // Redirect to the dashboard
        header("Location: /aceTrain/dashboards/Teacher/assignmentCreator.php");
        session_write_close();
    }
}

