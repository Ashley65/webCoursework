<?php

include "../connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['FName']) || empty($_POST['LName']) || empty($_POST['email']) || empty($_POST['phone'])) {
        echo "<script>alert('Please fill in all the fields')</script>";
    } else {
        $username = $_POST['username'];
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_SESSION['id'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE users SET username = ?, FName = ?, LName = ?, email = ?, phone = ? WHERE id = ?");

        // Bind the parameters
        $stmt->bind_param("sssssi", $username, $FName, $LName, $email, $phone, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Information changed successfully')</script>";
            echo "<p>Redirecting to the login page</p>";
        } else {
            echo "Failed to change information. Please try again.";
            echo "<br>";
            echo "<a href='changeInfo.php'>Try again</a>";
        }
    }
}
