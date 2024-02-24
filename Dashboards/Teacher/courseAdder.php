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
            <a href="StudentMain.php" >
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="dashboard.php" >
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="profile.php"  class="active" >
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="course.php" >
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

    <div class="main">
        <div class="courseCard">
            <div class="courseNav">
                <div class="course-videos">
                    <button class="course-videos-btn tabsBtn" onclick="openPage(event, 'videos')" id="defaultTab">
                        <span class="material-symbols-outlined">video_library</span>
                        Videos
                    </button>
                </div>
                <div class="course-materials">
                    <button class="course-materials-btn tabsBtn" onclick="openPage(event, 'materials')">
                        <span class="material-symbols-outlined">book</span>
                        Materials
                    </button>
                </div>
                <div class="course-assignments">
                    <button class="course-assignments-btn tabsBtn" onclick="openPage(event, 'assignments')">
                        <span class="material-symbols-outlined">assignment</span>
                        Assignments
                    </button>
                </div>
            </div>
            <div class="fileAdderBody">
                <div class="tile">
                    <h2>Add Material</h2>
                </div>
                <div id="materials" class="addMaterial">
                    <form class="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="courseID">
                           <label for="course_id">Course ID:
                                <input type="text" name="course_id">
                           </label>
                       </div>
                        <div class="fileName">
                            <label for="material_name">Material Name:
                                <input type="text" name="material_name">
                            </label>
                        </div>
                        <div class="description">
                            <label for="description">Description:
                                <textarea name="description"></textarea>
                            </label>
                        </div>
                        <div class="file">
                            <label for="file">Select File:
                                <input type="file" name="file">
                            </label>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Upload" name="submit">
                        </div>
                    </form>
                </div>
                <div id="videos" class="addMaterial" style="display: none">
                    <form class="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="courseID">
                           <label for="course_id">Course ID:
                                <input type="text" name="course_id">
                           </label>
                          </div>
                        <div class="fileName">
                            <label for="material_name">Video Name:
                                <input type="text" name="material_name">
                            </label>
                        </div>
                        <div class="description">
                            <label for="description">Description:
                                <textarea name="description"></textarea>
                            </label>
                        </div>
                        <div class="file">
                            <label for="file">Select File:
                                <input type="file" name="file">
                            </label>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Upload" name="submit">
                        </div>
                    </form>
                </div>
                <div id="assignments" class="addMaterial" style="display: none">
                    <form class="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="courseID">
                           <label for="course_id">Course ID:
                                <input type="text" name="course_id">
                           </label>
                          </div>
                        <div class="fileName">
                            <label for="material_name">Assignment Name:
                                <input type="text" name="material_name">
                            </label>
                        </div>
                        <div class="description">
                            <label for="description">Description:
                                <textarea name="description"></textarea>
                            </label>
                        </div>
                        <div class="file">
                            <label for="file">Select File:
                                <input type="file" name="file">
                            </label>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Upload" name="submit">
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