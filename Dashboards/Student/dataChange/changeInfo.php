<?php
include "../connection.php";
global $connPDO;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    // Prepare the SQL statement
    $stmt = $connPDO->prepare("UPDATE users SET FName = ?, LName = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bindParam(1, $_POST['FName']);
    $stmt->bindParam(2, $_POST['LName']);
    $stmt->bindParam(3, $_POST['email']);
    $stmt->bindParam(4, $_POST['phone']);
    $stmt->bindParam(5, $_SESSION['id']);

    // Execute the statement
    if($stmt->execute()){
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connPDO->error;
    }


}

