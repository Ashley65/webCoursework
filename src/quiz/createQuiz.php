<?php
//// only allow access to this page if the user is a teacher or admin
//
//// start session
//session_start();
//include "../../config/connection.php";
//global $conn;
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header("location: /aceTrain/LoginSystem/loginStudent.php");
//    exit;
//}
//// configure the page to only allow access to instructors and admins from the instructor table
//$stmt = $conn->prepare("SELECT * FROM instructor WHERE instructor_id = ?");
//$stmt->bind_param("i", $_SESSION['id']);
//
//$stmt->execute();
//$result = $stmt->get_result();
//if ($result->num_rows > 0) {
//    $user = $result->fetch_assoc();
//} else {
//
//    echo "Access Denied, you are not an instructor or admin";
//
//}
//
//
//
////get the user personal details
//$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
//$stmt->bind_param("i", $_SESSION['id']);
//
//$stmt->execute();
//$result = $stmt->get_result();
//
//if ($result->num_rows > 0) {
//    $user = $result->fetch_assoc();
//} else {
//    echo "No data found with id:" . $_SESSION['id'];
//}




?><! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForQuiz.css">
    <link rel="stylesheet" href="../../assets/Quiz/quizStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<div class="container">

    <aside class="aside">
        <div class="toggle">
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
            <a href="quiz.php" class="active">
                <span class="material-symbols-outlined">quiz</span>
                <h3>Quiz</h3>
            </a>
            <a href="assignment.php">
                <span class="material-symbols-outlined">assignment</span>
                <h3>Assignment</h3>
            </a>
            <a href="StudentMain.php?logout=1">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
    </aside>
    <div class="Top-bar">

        <div class="nav">
            <h2><span class="blue">Student</span> Dashboard</h2>
            <button  id="toggleBtn">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="dark-mode">
                <span class="material-symbols-outlined ">dark_mode</span>
                <span class="material-symbols-outlined active">light_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <p>hey, <?php echo isset($user) ? $user ['FName']: 'Guest';?></p>
                    <small class="textMuted">Student</small>
                </div>
                <div class="profile_pic">
                    <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg">

                </div>
            </div>



        </div>
    </div>
    <main class="main">
        <div class="main-top">
            <div class="stats-bar"></div>
            <div class="tabs">
                <div class="containerTabs">
                    <<div class="tab">
                        <button class="tablinks" onclick="openQuizCreate(event, 'Create')" id="defaultTab"> create</button>
                        <button class="tablinks" onclick="openQuizCreate(event, 'Configure')">Configure</button>
                        <button class="tablinks" onclick="openQuizCreate(event, 'Publish')">Publish</button>
                        <button class="tablinks" onclick="openQuizCreate(event, 'Analyze')">Analyze</button>
                    </div>
                    <div class="preview-btw" id="preview" onclick="">
                        <span class="material-symbols-outlined">preview</span>
                        <h3>Preview</h3>

                    </div>
                    <div class="preview-btw print-btw" id="printBlank" onclick="window.print()">
                        <span class="material-symbols-outlined">print</span>
                        <h3>Print</h3>
                    </div>

                </div>

            </div>
        </div>
        <div class="main-work">
            <div class="quizTabs">
               <div class="quizTab" id="Create">
                   <div class="quizTabHeader">
                       <h3>Create Quiz</h3>
                       <p>Enter the quiz details</p>
                   </div>
                   <div class="quizTabBody">
                       <form action="createQuiz.php" method="post">
                           <div class="quizTabBodyHeader">
                               <div class="quizTabBodyHeaderLeft">
                                   <label for="quizName">Quiz Name</label>
                                   <input type="text" name="quizName" id="quizName" placeholder="Enter Quiz Name">
                               </div>
                               <div class="quizTabBodyHeaderRight">
                                   <label for="quizDescription">Quiz Description</label>
                                   <input type="text" name="quizDescription" id="quizDescription" placeholder="Enter Quiz Description">
                               </div>
                           </div>
                           <div class="quizTabBodyBody">
                               <div class="quizTabBodyBodyLeft">
                                   <label for="quizTime">Quiz Time</label>
                                   <input type="text" name="quizTime" id="quizTime" placeholder="Enter Quiz Time">
                               </div>
                               <div class="quizTabBodyBodyRight">
                                   <label for="quizDate">Quiz Date</label>
                                   <input type="date" name="quizDate" id="quizDate" placeholder="Enter Quiz Date">
                               </div>
                           </div>
                           <div class="quizTabBodyFooter">
                               <button type="submit" name="createQuiz" id="createQuiz">Create Quiz</button>
                           </div>
                       </form>
                   </div>
               </div>
            </div>

        </div>
    </main>




</div>
<script src="index.js"></script>
</body>
</html>
