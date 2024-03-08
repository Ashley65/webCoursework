<?php
include "../../overall/config/connection.php";
global $conn;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrol</title>
    <script src="../../https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../styleSheets/enrolment.css">
    <script src="../../js/enrolment.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

</head>
<body>
<div class="container">
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
            <a href="teacherMain.php">
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
            <a href="enrol.php" class="active">
                <span class="material-symbols-outlined">school</span>
                <h3>Enrolment</h3>
            </a>
            <a href="studentList.php">
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
    <div class="main">
        <div class="enrolmentFull">
            <div class="tabs">
                <button class="newStudentBtn" onclick="openTab(event, 'newStudent')"><span class="material-symbols-outlined">person_add</span>
                    New Student</button>
                <button class="enrollmentBtn" onclick="openTab(event, 'enrollment')"><span class="material-symbols-outlined">school</span>
                    Enrol</button>
            </div>
            <div class="newStudentForm" id="newStudentForm">
                <div class="enrolmentHeader">
                    <h1>New Student</h1>
                </div>
                <form action="newStudent.php" method="post">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <label for="student_email">Email:</label><br>
                    <input type="text" id="student_email" name="student_email" placeholder="Email"><br>
                    <input class="submit" type="submit" value="Add New Student">
                </form>
            </div>
            <div class="enrolmentForm" id="enrolmentForm">
                <div class="enrolmentHeader">
                    <h1>Course Enrolment</h1>
                </div>
                <form action="enrolment.php" method="post">
                    <label for="course_id">Course ID:</label><br>
                    <input type="text" id="course_id" name="course_id" placeholder="Course ID"><br>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <input class="submit" type="submit" value="Enrol Student Onto Course">
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>© 2024 AceTraining</p>
    </div>
</div>
</body>
</html>

