<?php
//session_start();
//include "connection.php";
//global $conn;
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header("location: /aceTrain/LoginSystem/loginStudent.php");
//
//    exit;
//}
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
//// get the assignment details from the assignment table where the student is enrolled in
//$stmt2 = $conn->prepare("SELECT * FROM assignment LEFT JOIN assignmentUpload ON assignment.assignmentID = assignmentUpload.assignmentID WHERE assignment.courseID IN (SELECT course_id FROM enrollment WHERE student_id = ?) AND (assignmentUpload.assignmentID IS NULL )");
//$stmt2->bind_param("i", $_SESSION['id']);
//
//$stmt2->execute();
//$result2 = $stmt2->get_result();
//
//// Initialize an empty array to hold the assignments
//$assignments = [];
//
//// Fetch all assignments the student is enrolled in along with the user details
//while($assignment = $result2->fetch_assoc()){
//    $assignments[] = $assignment;
//}
//
//?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../js/script.js"></script>
    <script src="../../../js/assignmentTheme.js"></script>
    <link rel="stylesheet" href="../../../assets/dashboard_css/dark-light.css">
    <link rel="stylesheet" href="../../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../../assets/course_css/assigment.css">
    <link rel="stylesheet" href="../../../assets/gridlayout_css/gridLayoutForAssigment.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<div class="container">
    <aside class="aside">
        <div class="toggle">
            <div class="logo">
                <img src="../../../assets/img/AceTraining-logo-light-transparent.png">
            </div>
            <button class="menu-btn" id="toggleBtn">
                <span class="material-symbols-outlined">menu</span>
            </button>

        </div>
        <div class="sidebar">
            <a href="../StudentMain.php" >
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="../profile.php" >
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="../course.php" >
                <span class="material-symbols-outlined">book</span>
                <h3>Course</h3>
            </a>
            <a href="assignment.php" class="active">
                <span class="material-symbols-outlined">assignment</span>
                <h3>Assignment</h3>
            </a>
            <a href="../timetable.php">
                <span class="material-symbols-outlined">today</span>
                <h3>Timetable</h3>
            </a>
            <a href="../calendar.php">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Calendar</h3>

            <a href="../../../LoginSystem/logout.php">
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
                    <img src="../../../assets/img/Default_pfp.png">

                </div>
            </div>



        </div>
    </div>
    <main class="main">
        <div class="assignment">
            <div class="assignmentTitle">
                <h2>Assignments</h2> <!-- Display the assignments for the student -->
            </div>
            <div class="assignmentBody"

                <ul>
<!--                    --><?php //foreach ($assignments as $assignment): ?>
                        <li>
                            <div class="assignments">
                                <h3><?php echo isset($assignment) ? $assignment['assignmentName']: 'Fake name '; ?></h3>
                                <p><?php echo isset($assignment) ? $assignment['assignmentDescription']: 'dkfnffkksl'; ?></p>
                                <p>Due Date: <?php echo  isset($assignment) ? $assignment['dueDate']: '1204:242:1' ; ?></p>
                                <p>Course: <?php echo  isset($assignment) ? $assignment['courseID']: '12' ?></p>

                                <a href="assignmentSubmission.php?assignmentID=<?php echo isset($assignment) ?  $assignment['assignmentID']: '12'; ?>">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 2</h3>
                                <p>Assignment 2 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 3</h3>
                                <p>Assignment 3 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 4</h3>
                                <p>Assignment 4 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 5</h3>
                                <p>Assignment 5 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 6</h3>
                                <p>Assignment 6 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>
                        <li>
                            <div class="assignments">
                                <h3>Assignment 7</h3>
                                <p>Assignment 7 Description</p>
                                <p>Due Date: 12/12/2021</p>
                                <p>Course: 12</p>
                                <a href="assignmentSubmission.php">Submit Assignment</a>
                            </div>
                        </li>


<!--                    --><?php //endforeach; ?>
                </ul>
            </div>
        </div>
    <div class="footer">

    </div>
</div>
</body>
</html>
