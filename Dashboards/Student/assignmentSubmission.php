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

if (isset($_GET['assignmentID'])){
    $assignmentID = $_GET['assignmentID'];
} else {
    echo "No assignment ID provided";
    exit;
}
// get the assignment details from the assignment table where the student is enrolled in
$stmt2 = $conn->prepare("SELECT * FROM assignment WHERE assignment.assignmentID =?");
$stmt2->bind_param("i", $assignmentID);

$stmt2->execute();
$result2 = $stmt2->get_result();



// Fetch all assignments the student is enrolled in along with the user details
if( $result2->num_rows > 0){
    $assignments = $result2->fetch_assoc();
     echo "Assignment Name: " . $assignments['assignmentName'] . "<br>";
    echo "Assignment Description: " . $assignments['assignmentDescription'];
} else {
    echo "No assignment found with ID: " . $assignmentID;
}










?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Dashboard || Assignment Submission</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/theme.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/course_css/course.css">
    <link rel="stylesheet" href="../../assets/course_css/courseAdder.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForAssigment.css">
    <script src="../../js/Profile.js"></script>
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
            <a href="course.php" >
                <span class="material-symbols-outlined">book</span>
                <h3>Course</h3>
            </a>
            <a href="assignment.php" class="active">
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
    <main class="main">
        <?php if(isset($assignmentID)): ?>
        <div class="assignmentTitle">
            <h1>Assignment Submission - <?php echo isset($assignments) ? $assignments['assignmentName'] : '';?></h1>
        </div>
        <div class="assignmentDetails">
            <div class="assignmentDetailsHeader">
                <h2>Assignment Details</h2>
            </div>
            <div class="assignmentDetailsBody">
                <div class="assignment_details">
                    <h3>Assignment Name: <?php echo isset($assignments ) ? $assignments['assignmentName'] : '';?></h3>
                    <h3>Assignment Description: <?php echo isset($assignments) ? $assignments['assignmentDescription'] : '';?></h3>
                    <h3>Assignment Due Date: <?php echo isset($assignments) ? $assignments['dueDate'] : '';?></h3>
                </div>
            </div>
        </div>
        <div class="assignmentSubmission">
            <div class="assignmentSubmissionHeader">
                <h2>Assignment Submission</h2>
            </div>
            <div class="assignmentSubmissionBody">
                <form action="assignmentSubmission.php" method="post" enctype="multipart/form-data">
                    <div class="form-group
                    <label for="assignment_submission">Upload Assignment</label>
                    <input type="file" id="assignment_submission" name="assignment_submission">
                    <input type="submit" value="Submit Assignment" name="submit">
                </form>
            </div>
        </div>
        <?php else: ?>
            <div class="assignment notFound">
                <h2>No Assignment Found</h2>
                <p>There are no assignments available for submission</p>
            <h2>No Assignment Found</h2>
            <p>There are no assignments available for submission</p>
        </div>
        <?php endif; ?>
    </main>
</div>
</body>
</html>



