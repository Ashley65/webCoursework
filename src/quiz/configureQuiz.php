<?php

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
        <div class="main-work-create" id="Create">
            <div class="main-work-create-top">
                <div class="main-work-create-top-left">
                    <div class="main-work-create-top-left-top">
                        <div class="main-work-create-top-left-top-left">
                            <h3>Quiz Title</h3>
                            <input type="text" name="quizTitle" id="quizTitle" placeholder="Enter Quiz Title">
                        </div>
                        <div class="main-work-create-top-left-top-right">
                            <h3>Quiz Description</h3>
                            <textarea name="quizDescription" id="quizDescription" cols="30" rows="10" placeholder="Enter Quiz Description"></textarea>
                        </div>
                    </div>
                    <div class="main-work-create-top-left-bottom">
                        <div class="main-work-create-top-left-bottom-left">
                            <h3>Quiz Duration</h3>
                            <input type="number" name="quizDuration" id="quizDuration" placeholder="Enter Quiz Duration">
                        </div>
                        <div class="main-work-create-top-left-bottom-right">
                            <h3>Quiz Attempts</h3>
                            <input type="number" name="quizAttempts" id="quizAttempts" placeholder="Enter Quiz Attempts">
                        </div>
                    </div>
                </div>
                <div class="main-work-create-top-right">
                    <div class="main-work-create-top-right-top">
                        <h3>Quiz Instructions</h3>
                        <textarea name="quizInstructions" id="quizInstructions" cols="30" rows="10" placeholder="Enter Quiz Instructions"></textarea>
                    </div>
                    <div class="main-work-create-top-right-bottom">
                        <h3>Quiz Tags</h3>
                        <input type="text" name="quizTags" id="quizTags" placeholder="Enter Quiz Tags">
                    </div>
                </div>
            </div>
            <div class="main-work-create-bottom">
                <div class="main-work-create-bottom-left">
                    <h3>Quiz Questions</h3>
                    <div class="main-work-create-bottom-left-top">
                        <div class="main-work-create-bottom-left-top-left">
                            <h3>Question</h3>
                            <textarea name="question" id="question" cols="30" rows="10" placeholder="Enter Question"></textarea>

    </div>


