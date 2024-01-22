<?php
//session_start();
//include "connection.php";
//global $conn;
//if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//    header("location: /aceTrain/LoginSystem/loginStudent.php");
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
//
//
//?>
<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/dashboard_css/sidebar.css">
    <link rel="stylesheet" href="../../assets/gridlayout_css/gridLayoutForDash.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/Dashboard.css">
    <link rel="stylesheet" href="../../assets/dashboard_css/top-bar.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
    <div class="container">

        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg">
                    <h2><span class="blue">Ace</span>Training</h2>

                </div>
                <button class="menu-btn" id="toggleBtn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
            <div class="sidebar">
                <a href="#" class="active">
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
                <a href="course.php">
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

                <a href="../../LoginSystem/logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>

        </aside>
        <main>
            <h2><span class="blue">Student</span> Dashboard</h2>


        </main>

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




    </div>
    <script src="index.js"></script>

</body>
</html>
