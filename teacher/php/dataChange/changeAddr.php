<?php

include "../connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
  if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['country']) || empty($_POST['zip'])) {
    echo "<script>alert('Please fill in all the fields')</script>";
  } else {
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['postcode'];
    $country = $_POST['country'];

    $id = $_SESSION['id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE useraddress SET street = ?, city = ?, postcode = ?, country = ? WHERE userID = ?");

    // Bind the parameters
    $stmt->bind_param("ssisi", $street, $city, $zip, $country, $id);

    // Execute the statement
    if ($stmt->execute()) {
      echo "<script>alert('Address changed successfully')</script>";
      echo "<p>Redirecting to the login page</p>";
    } else {
      echo "Failed to change address. Please try again.";
      echo "<br>";
      echo "<a href='changeAddr.php'>Try again</a>";
    }
  }
}
