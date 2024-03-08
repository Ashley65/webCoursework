<?php
include "../../overall/config/connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['course_id']) || empty($_POST['username'])) {
        echo "<script>alert('Please fill in all the fields')</script>";
        echo "<script>window.location.href='enrolment.php'</script>";
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
                $stmt2 = $conn->prepare("INSERT INTO enrollment (course_id, student_id) VALUES (?, ?)");

                // Bind the parameters
                $stmt2->bind_param("ii", $_POST['course_id'], $student_id);

                // Execute the statement
                $stmt2->execute();

                // Redirect to the dashboard
                header("Location: /aceTrain/dashboards/Teacher/enrolment.php");
                session_write_close();
            } else {
                echo "<script>alert('No user ID found for the username: " . $_POST['username'] . "')</script>";
                echo "<script>window.location.href='enrolment.php'</script>";
            }


        } else {
            echo "<script>alert('No user found with the username: " . $_POST['username'] . "')</script>";
            echo "<script>window.location.href='enrolment.php'</script>";
        }
    }
}

