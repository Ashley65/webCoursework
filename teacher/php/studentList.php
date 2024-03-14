<?php
session_start();
include "../../overall/config/connection.php";
global $conn;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: /aceTrain/overall/LoginSystem/loginStudent.php");
    exit;
}

//get the user personal details
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['id']);

$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}else{
    echo "No data found with id:" . $_SESSION['id'];

}


// gate the student list from the database and display it in the table
$stmt2 = $conn->prepare("SELECT * FROM users ");
// Execute the statement
$stmt2 -> execute();
// Get the results
$result2 = $stmt2 -> get_result();

if ($result2->num_rows > 0){
    $students = $result2->fetch_assoc();
}else{
    echo "No data found with id:" . $_SESSION['id'];

}
// if the session id is not found in the instructor table redirect to the student dashboard
$stmt1 = $conn->prepare("SELECT * FROM instructor WHERE userID = ?");
// Bind the parameters
$stmt1->bind_param("i", $_SESSION['id']);
// Execute the statement
$stmt1->execute();
// Get the results
$result1 = $stmt1->get_result();
if ($result1->num_rows == 0){
    header("Location: ../../student/php/studentMain.php");
    session_write_close();
}


// Get users details from the users table





?>
<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student List</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../styleSheets/studentListStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<div class="container">

    <aside>
        <div class="toggle">
            <div class="logo">
                <img src="../../assets/img/AceTraining-logo-light-transparent.png">
            </div>
            <button class="menu-btn" id="toggleBtn">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
        <div class="sidebar">
            <a href="TeacherMain.php">
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="profile.php">
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="courseAdder.php">
                <span class="material-symbols-outlined">book</span>
                <h3>Course</h3>
            </a>
            <a href="assignmentCreator.php">
                <span class="material-symbols-outlined">assignment</span>
                <h3>Assignment</h3>
            </a>
            <a href="enrol.php">
                <span class="material-symbols-outlined">school</span>
                <h3>Enrolment</h3>
            </a>
            <a href="studentList.php" class="active">
                <span class="material-symbols-outlined">people</span>
                <h3>Students</h3>
            </a>
            <a href="timetable.php">
                <span class="material-symbols-outlined">today</span>
                <h3>Timetable</h3>
            </a>
            <a href="calendar.php">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Calendar</h3>
            </a>
            <a href="../../overall/loginSystem/logout.php">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
        </div>

    </aside>

    <div class="Top-bar">
        <div class="nav">
            <button  id="toggleBtn">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="toggleTheme" id="mode-toggle"></div>
            <div class="profile">
                <div class="info">
                    <p>hey, <?php echo isset($user) ? $user ['FName']: 'Guest';?></p>
                    <small class="textMuted">Student</small>
                </div>
                <div class="profile_pic">
                    <img src="../../assets/img/Default_pfp.png">
                </div>
            </div>
        </div>
    </div>
    <div class="mainBody">
        <div class="listContainer">
            <div class="listHeader">
                <h1>Student List</h1>
            </div>

            <div class="list">
                <div class="list">
                    <div class="student-item">
                        <span class="student-id">0001</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">1st year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0002</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">2nd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
                    <div class="student-item">
                        <span class="student-id">0003</span>
                        <span class="student-name">John Smith</span>
                        <span class="student-course">Computer Science</span>
                        <span class="student-year">3rd Year</span>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
