<?php
//session_start();
//include "../../overall/config/connection.php";
//global $conn;
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header("location: /aceTrain/LoginSystem/loginStudent.php");
//
//    exit;
//}
//
////get the user personal details
//$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
//$stmt->bind_param("i", $_SESSION['id']);
//
//$stmt->execute();
//$result = $stmt->get_result();
//if ($result->num_rows > 0) {
//    $user = $result->fetch_assoc();
//}else{
//    echo "No data found with id:" . $_SESSION['id'];
//
//}
//
//?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Course Adder</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <script src="../../overall/javaScript/profile.js"></script>
    <script src="../../teacher/javaScript/courseAdder.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../styleSheets/courseAdder.css">
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
                    <small class="textMuted">Teacher</small>
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
            <a href="courseAdder.php" class="active">
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
        <div class="courseCard">
            <div class="courseNav">
                <div class="course-videos">
                    <button class="course-videos-btn" onclick="openPage(event, 'videos')" id="defaultTab">
                        <span class="material-symbols-outlined">video_library</span>
                        Videos
                    </button>
                </div>
                <div class="course-materials">
                    <button class="course-materials-btn" onclick="openPage(event, 'materials')">
                        <span class="material-symbols-outlined">book</span>
                        Materials
                    </button>
                </div>
            </div>
            <div class="fileAdderBody">
                <div id="materials" class="addMaterial">
                    <form class="materialsUploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="tile">
                            <h2>Add Material</h2>
                        </div>
                        <div class="courseID">
                            <label for="course_id">Course ID:
                                <input type="text" name="course_id" placeholder="Course ID">
                            </label>
                        </div>
                        <div class="fileName">
                            <label for="material_name">Material Name:
                                <input type="text" name="material_name" placeholder="Material Name">
                            </label>
                        </div>
                        <div class="description">
                            <label for="description">Description:
                                <textarea name="description" placeholder="Description"></textarea>
                            </label>
                        </div>
                        <div class="file">
                            <div>
                                <label for="file">Select File:</label>
                            </div>
                            <div>
                                <input type="file" name="file" class="hidden-file-input">
                                <button class="custom-file-button">Choose File</button>
                                <span class="file-name"></span>
                            </div>
                        </div>
                        <div class="submit">
                            <input class="submitBtn" type="submit" value="Upload" name="submit">
                        </div>
                    </form>
                </div>
                <div id="videos" class="addVideo">
                    <form class="videosUploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="tile">
                            <h2>Add Video</h2>
                        </div>
                        <div class="courseID">
                           <label for="course_id">Course ID:
                                <input type="text" name="course_id" placeholder="Course ID">
                           </label>
                          </div>
                        <div class="fileName">
                            <label for="material_name">Video Name:
                                <input type="text" name="material_name" placeholder="Video Name">
                            </label>
                        </div>
                        <div class="description">
                            <label for="description">Description:
                                <textarea name="description" placeholder="Description"></textarea>
                            </label>
                        </div>
                        <div class="file">
                            <div>
                                <label for="file">Select File:</label>
                            </div>
                            <div>
                                <input type="file" name="file" class="hidden-file-input">
                                <button class="custom-file-button">Choose File</button>
                                <span class="file-name"></span>
                            </div>
                        </div>
                        <div class="submit">
                            <input class="submitBtn" type="submit" value="Upload" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>© 2024 AceTraining</p>
    </div>

</body>
</html>