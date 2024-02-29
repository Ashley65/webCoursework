<?php
//// only allow access to this page if the user is a teacher or admin
//
//// start session
//session_start();
//include "../../config/connection.php";
//global $conn;
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header("location: /aceTrain/LoginSystem/loginStudent.php");
//    exit;
//}
//// configure the page to only allow access to instructors and admins from the instructor table
//$stmt = $conn->prepare("SELECT * FROM instructor WHERE instructor_id = ?");
//$stmt->bind_param("i", $_SESSION['id']);
//
//$stmt->execute();
//$result = $stmt->get_result();
//if ($result->num_rows > 0) {
//    $user = $result->fetch_assoc();
//} else {
//
//    echo "Access Denied, you are not an instructor or admin";
//
//}
//
//
//
////get the user personal details
//$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
//$stmt->bind_param("i", $_SESSION['id']);
//
//$stmt->execute();
//$result = $stmt->get_result();
//
//if ($result->num_rows > 0) {
//    $user = $result->fetch_assoc();
//} else {
//    echo "No data found with id:" . $_SESSION['id'];
//}
include "../../Dashboards/Student/connection.php";
global $conn;

$input = json_decode(file_get_contents('php://input'), true);

$quiz_name = $input['quiz_name'];
$course_id = $input['course_id'];
$duration = $input['duration'];
$num_of_questions = $input['num_of_questions'];
$passing_score = $input['passing_score'];

$query = $conn->prepare("INSERT INTO quizzes (quiz_name, course_id, duration, num_of_questions, passing_score) VALUES (?, ?, ?, ?, ?)");
$stmt = $pdo->prepare($query);




?>