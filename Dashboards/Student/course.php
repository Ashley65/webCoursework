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
    <link rel="stylesheet" href="../../assets/course_css/course.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForCourse.css">

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
                <span class="material-symbols-outlined">today</span>
                <h3>Timetable</h3>
            </a>
            <a href="calendar.php">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Calendar</h3>
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
         <?php foreach ($courses as $course):?>
             <div class="courseCard" >
                 <div class="courseBody">
                     <h2><?php echo $courses[0]['course_name']; ?></h2>
                     <p><?php echo $courses[0]['course_description']; ?></p>
                     <a href="course_info.php?course_id=<?php echo $courses[0]['course_id']; ?>">Go to Course</a>
                 </div>
                 <div class="courseNav">
                     <div class="courseNavHeader">
                         <div id="courseNavHeaderTitle" class="courseTitle">
                             <p><?php echo $courses[0]['course_name']; ?></p>
                         </div>
                            <div id="courseNavHeaderIcon" class="courseIcon">
                                <div class="courseNavLeft">
                                    <button class="material-symbols-outlined">arrow_back</button>
                                </div>
                                <div class="courseNavRight">
                                    <button class="material-symbols-outlined">arrow_forward</button>
                                </div>
                            </div>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>
    <div class="footer">

    </div>



</div>
<script src="index.js"></script>
</body>
</html>
