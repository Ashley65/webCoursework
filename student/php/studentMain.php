<?php
session_start();
include "connection.php";
global $conn;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../../LoginSystem/loginStudent.php");
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
?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Main</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../styleSheets/studentMain.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
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
                <a href="#" class="active">
                    <span class="material-symbols-outlined">home</span>
                    <h3>Home</h3>
                </a>
                <a href="profile.php">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Profile</h3>
                </a>
                <a href="course.php">
                    <span class="material-symbols-outlined">book</span>
                    <h3>Course</h3>
                </a>
                <a href="assignment.php">
                    <span class="material-symbols-outlined">assignment</span>
                    <h3>Assignment</h3>
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
        <div class="header">
            <h1>Welcome to Ace Training</h1>
        </div>
        <div id="aboutBox">
            <h1>About</h1>
            <h2>Ace Training is an educational learning environment which
                aims to improve your studies by providing a user-friendly
                platform for students to access their course materials,
                assignments, view their timetable and much more.
            </h2>
        </div>
    </div>
</body>
</html>
