<?php
include "../connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['oldPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword'])){
        echo "<script>alert('Please fill in all the fields')</script>";

    }else{
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $id = $_SESSION['id'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");

        // Bind the parameters
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the results
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if (password_verify($oldPassword, $user['password'])) { // Verify the plain text password against the hashed password
                if ($newPassword === $confirmPassword){
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $stmt->bind_param("si", $newPassword, $id);
                    $stmt->execute();
                    echo "<script>alert('Password changed successfully')</script>";
                    echo "<p>Redirecting to the login page</p>";
                }else{
                    echo "<script>alert('New password and confirm password do not match')</script>";
                }
            }else{
                echo "<script>alert('Invalid password')</script>";
            }
        }else{
            echo "<script>alert('Invalid user')</script>";
        }
    }
}


