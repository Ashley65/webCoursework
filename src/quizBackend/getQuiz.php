<?php
include "../../Dashboards/Student/connection.php";
global $conn;

$quiz_id = $_GET['quiz_id'];

$response = ['success' => false, 'data' => null, 'message' => 'No data found'];

$quizQuery = $conn->prepare("SELECT * FROM quizzes WHERE id = ?");
$quizQuery->bind_param("i", $quiz_id);
$quizQuery->execute();
$quizResult = $quizQuery->get_result();


if ($quiz = $quizResult->fetch_assoc()) {
    $questionsQuery = $conn->prepare("SELECT * FROM questions WHERE quiz_id = ?");
    $questionsQuery->bind_param("i", $quiz_id);
    $questionsQuery->execute();
    $questionsResult = $questionsQuery->get_result();

    $questions = [];
    while ($question = $questionsResult->fetch_assoc()) {
        $optionsQuery = $conn->prepare("SELECT * FROM answers WHERE question_id = ?");
        $optionsQuery->bind_param("i", $question['question_id']);
        $optionsQuery->execute();
        $optionsResult = $optionsQuery->get_result();

        $options = [];
        while ($option = $optionsResult->fetch_assoc()) {
            $options[] = $option;
        }
        $question['options'] = $options;
        $questions[] = $question;
    }
    $quiz['questions'] = $questions;
    $response['success'] = true;
    $response['data'] = $quiz;
    $response['message'] = 'Data found';

}
header('Content-Type: application/json');
echo json_encode($response);
?>