<?php

// define the base url
const BASE_URL = "http://localhost:63342/webCoursework";
global $conn;
include("../config/connection.php");

if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    if (empty($_POST['username']) || empty($_POST['password'])){
        echo "<script>alert('Please fill i00n all the fields')</script>";
        echo "<script>window.location.href='loginStudent.php'</script>";
    }else{
        $username = $_POST['username'];
        $password = $_POST['password']; // Don't hash the password here

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");

        // Bind the parameters
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Get the results
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // Verify the plain text password against the hashed password
                // Set the session variables
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];


                // Redirect to the dashboard
                header("Location: ".BASE_URL. "/dashboards/Student/StudentMain.php");
                session_write_close();
            } else {
                echo "<script>alert('Invalid password')</script>";
                echo "<script>window.location.href='loginStudent.php'</script>";
            }
        }else{
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location.href='loginStudent.php'</script>";
        }
    }
}