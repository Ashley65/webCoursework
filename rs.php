<?php

// define variables and set to empty values
$fullname = $email = $phone = $address = $city = $state = $zip = $country = $gender = $dob = $username = $password = $cpassword = $security = $answer = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = test_input($_POST["fullname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);


}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

