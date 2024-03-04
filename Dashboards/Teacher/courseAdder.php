<?php
session_start();
include "../Student/connection.php";
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

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Teacher Dashboard || File Adder</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/theme.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/course_css/course.css">
    <link rel="stylesheet" href="../../assets/course_css/courseAdder.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForCourseAdder.css">
    <script src="../../js/Profile.js"></script>
    <script src="../../js/courseAdder.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="Top-bar">
        <div class="nav">
            <h2><span class="blue">Teacher</span> Dashboard</h2>
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
            <a href="courseAdder.php" class="active" >
                <span class="material-symbols-outlined">book</span>
                <h3>Course</h3>
            </a>
            <a href="assignmentPost.php">
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