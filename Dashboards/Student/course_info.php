<?php
session_start();
include "connection.php";
global $conn;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: /aceTrain/LoginSystem/loginStudent.php");

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
//get the course details from the courses table where the student is enrolled in
$stmt = $conn->prepare("SELECT * FROM courses WHERE course_id IN (SELECT course_id FROM enrollment WHERE student_id = ?)");
$stmt->bind_param("i", $_SESSION['id']);

$stmt->execute();
$result2 = $stmt->get_result();
// Initialize an empty array to hold the courses
$courses = [];

// Fetch all courses the student is enrolled in along with the user details
while($course = $result2->fetch_assoc()){
    $courses[] = $course;
}
function getCourseDetails($course_id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_id IN (SELECT course_id FROM enrollment WHERE student_id = ?)");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $result = $result->fetch_assoc();
    if (0 > $result->num_rows) {
        return $result;
    }else{
        return "No data found with id:" . $course_id;
    }
}





?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/theme.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/course.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForCourseInfo.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
<div class="container">
    <aside class="aside">
        <div class="toggle">
            <div class="logo">
                <img src="../../assets/img/AceTraining-logo-light-transparent.png">
            </div>
            <button class="menu-btn" id="toggleBtn">
                <span class="material-symbols-outlined">menu</span>
            </button>

        </div>
        <div class="sidebar">
            <a href="StudentMain.php" >
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="dashboard.php" >
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="profile.php" >
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="course.php" class="active">
                <span class="material-symbols-outlined">book</span>
                <h3>Course</h3>
            </a>
            <a href="assignment.php">
                <span class="material-symbols-outlined">assignment</span>
                <h3>Assignment</h3>
            </a>
            <a href="timetable.php">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Timetable</h3>
            </a>

            <a href="../../LoginSystem/logout.php">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
        </div>

    </aside>
    <div class="Top-bar">
        <div class="nav">
            <h2><span class="blue">Student</span> Dashboard</h2>
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
        <?php  foreach ($courses as $course)?>
        <div class="courseCard">
            <div class="coursebody">
                <div id="videos " class="tabcontent">
                    <h3><?php echo $course['course-name']?></h3>
                </div>
                <div id="files" class="tabcontent">
                    <h3>files</h3>
                    <p>files will be displayed here</p>
                </div>
                <div id="Quiz" class="tabcontent" style="display: none">
                    <h3>Quiz</h3>
                    <p>Quiz will be displayed here</p>
                </div>
            </div>

            <div class="courseNav">
                <div class="course-videos">
                    <button class="course-videos-btn tabsBtn" onclick="openPage(event, 'videos')" id="defaultTab">
                        <span class="material-symbols-outlined">video_library</span>
                        Videos
                    </button>
                </div>
                <div class="course-files">
                    <button class="course-files-btn tabsBtn" onclick="openPage(event, 'files')">
                        <span class="material-symbols-outlined">folder</span>
                        Files
                    </button>
                </div>
                <div class="course-quiz">
                    <button class="course-quiz-btn tabsBtn" onclick="openPage(event, 'Quiz')">
                        <span class="material-symbols-outlined">quiz</span>
                        Quiz
                    </button>
                </div>
            </div>

    </div>
        <div class="footer">
            <p>© 2024 AceTraining</p>
        </div>
