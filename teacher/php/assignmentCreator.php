<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment Maker</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../styleSheets/assigmentMaker.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
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
                <a href="assignmentCreator.php" class="active">
                    <span class="material-symbols-outlined">assignment</span>
                    <h3>Assignment</h3>
                </a>
                <a href="enrol.php">
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
        <main class="mainBody">
            <div class="assignmentMakers">
                <div class="assignment_header">
                    <h1>Create Assignment</h1>
                <div class="assignment">
                    <form action="assignmentPost.php" method="post">
                        <label for="assignment_name">Assignment Name</label>
                        <input type="text" id="assignment_name" name="assignment_name" placeholder="Assignment Name">
                        <label for="course_id">Course ID</label>
                        <input type="text" id="course_id" name="course_id" placeholder="Course ID">
                        <label for="instructor_id">Instructor ID</label>
                        <input type="text" id="instructor_id" name="instructor_id" placeholder="Instructor ID">
                        <label for="assignment_type">Assignment Type</label>
                        <select id="assignment_type" name="assignment_type">
                            <option value="Homework">Homework</option>
                            <option value="Test">Test</option>
                            <option value="Project">Project</option>
                        </select>
                        <label for="assignment_points">Assignment Points</label>
                        <input type="number" id="assignment_points" name="assignment_points" placeholder="Assignment Points">
                        <label for="assignment_description">Assignment Description</label>
                        <textarea id="assignment_description" name="assignment_description" placeholder="Assignment Description"></textarea>
                        <label for="assignment_due_date">Due Date</label>
                        <input type="date" id="assignment_due_date" name="assignment_due_date">
                        <input type="submit" value="Create">
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>