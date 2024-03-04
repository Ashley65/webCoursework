<?php
include "../Student/connection.php";
global $conn;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment Maker</title>
    <script src="../../https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/theme.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/course_css/course.css">
    <link rel="stylesheet" href="stylesheet/enrolment.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForEnrolment.css">
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
            <a href="StudentMain.php">
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="dashboard.php">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="profile.php">
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="course.php" >
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
            <a href="enrolmenter.php" class="active">
                <span class="material-symbols-outlined">school</span>
                <h3>Enrollment</h3>

            <a href="../../LoginSystem/logout.php">
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

