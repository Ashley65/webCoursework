<?php
global $course_id;
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
function getVideo($material_id): false|array|null
{
    global $conn;
    return $conn->query("SELECT * FROM coursematerial WHERE materialID= $material_id")->fetch_assoc();
}


?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Course</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/theme.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/course_css/course.css">
    <link rel="stylesheet" href="../../assets/course_css/notes.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForCourseVideo.css">
    <script src="../../js/Profile.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<div class="container">
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
            <a href="../Student/StudentMain.php" >
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="../Student/course.php" class="active">
                <span class="material-symbols-outlined">school</span>
                <h3>Courses</h3>
            </a>
            <a href="../Student/calendar.php">
                <span class="material-symbols-outlined">event</span>
                <h3>Calendar</h3>
            </a>
            <a href="../Student/profile.php">
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="../../LoginSystem/logout.php">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <div class="main">
        <div class="courseCard">
            <div class="VideoMainBody">
                <div class="Vid">
                    <video id="video" controls height="100%" width="100%">
                        <?php
                        if (isset($material_id)){
                            $video = getVideo(8);
                            echo "<iframe src='../Teacher/".$video['material_path']."' frameborder='0' allowfullscreen></iframe> ";
                        }else{
                            echo"error loading video";
                        }
                        ?>
                    </video>
                </div>

                <div class="videoInfo">

                </div>
                <div class="NoteTab">
                    <div class="NoteTabHeader">
                        <h3>Notes: </h3>

                    </div>
                    <div class="notes">
                        <form id="form">
                            <div class="input-group">
                                <label for="title">Title:</label>
                                <input type="text" id="title" />
                            </div>

                            <div class="input-group">
                                <label for="content">Content:</label>
                                <textarea id="content"></textarea>
                            </div>

                            <button class="btn" type="submit">Add Note</button>
                        </form>
                        <div class="notesList">
                            <ul id="notes-list"></ul>
                        </div>

                    </div>
                    <script src="../../js/notes.js" type="module"></script>
                </div>
            </div>
            <div class="courseNav">
                <div class="course-videos">
                    <button class="course-videos-btn tabsBtn" onclick="openPage(event, 'videos')" id="defaultTab">
                        <span class="material-symbols-outlined">video_library</span>
                        <h3>Videos</h3>
                    </button>
                </div>
                <div class="course-files">
                    <button class="course-materials-btn tabsBtn" onclick="openPage(event, 'materials')">
                        <span class="material-symbols-outlined">book</span>
                        <h3>Materials</h3>
                    </button>
                </div>
                <div class="course-quiz">
                    <button class="course-quiz-btn tabsBtn" onclick="openPage(event, 'quiz')">
                        <span class="material-symbols-outlined">assignment</span>
                        <h3>Quiz</h3>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>© 2024 AceTraining</p>
</div>

</body>
</html>

