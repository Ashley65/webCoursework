<?php

include "connection.php";
global $conn;

if (isset($_POST['course_id'])){
    $course_id = $_POST['course_id'];
    $stmt = $conn->prepare("SELECT * FROM coursematerial WHERE courseID = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->get_result();

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        echo json_encode($course);
    }else{
        echo json_encode("No data found with id:" . $course_id);
    }

}