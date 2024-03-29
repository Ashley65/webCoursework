<?php
session_start();
include "../../overall/config/connection.php";
global $conn;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../../LoginSystem/loginStudent.php");

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

}// if the session id is not found in the instructor table redirect to the student dashboard
$stmt1 = $conn->prepare("SELECT * FROM instructor WHERE userID = ?");
// Bind the parameters
$stmt1->bind_param("i", $_SESSION['id']);
// Execute the statement
$stmt1->execute();
// Get the results
$result1 = $stmt1->get_result();
if ($result1->num_rows == 0){
    header("Location: ../../student/php/studentMain.php");
    session_write_close();
}


// get the user address from the address table
$stmt = $conn->prepare("SELECT * FROM useraddress WHERE userID = ?");
$stmt->bind_param("i", $_SESSION['id']);

$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $userAddress = $result->fetch_assoc();
}
?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../overall/javaScript/script.js"></script>
    <script src="../../overall/javaScript/theme.js"></script>
    <script src="../../overall/javaScript/profile.js"></script>
    <link rel="stylesheet" href="../../overall/styleSheets/dark-light.css">
    <link rel="stylesheet" href="../../overall/styleSheets/dashboard.css">
    <link rel="stylesheet" href="../../overall/styleSheets/sidebar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/topBar.css">
    <link rel="stylesheet" href="../../overall/styleSheets/profile.css">
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
            <a href="TeacherMain.php">
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="profile.php" class="active">
                <span class="material-symbols-outlined">person</span>
                <h3>Profile</h3>
            </a>
            <a href="courseAdder.php">
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
            <div class="sideProfile">
                <div class="main-side-profile">
                    <div class="profile-pic">
                        <img src="../../assets/img/Default_pfp.png">
                    </div>
                    <div class="profileBtn">
                        <button class="btn-primary">Change Profile Picture</button>
                    </div>
                    <div class="profileInfo">
                        <div class="line">
                        </div>
                        <h3><?php echo isset($user) ? $user ['FName']: 'Guest';?> , <?php echo isset($user) ? $user ['LName']: 'Guest';?></h3>
                         <div class="line">
                         </div>

                        <p><?php echo isset($user) ? $user ['email']: 'Guest';?></p>
                        <p><?php echo isset($user) ? $user ['phone']: 'Guest';?></p>
                        <p><?php echo isset($userAddress) ? $userAddress ['street']: 'Guest';?></p>
                        <p><?php echo isset($userAddress) ? $userAddress ['city']: 'Guest';?></p>
                        <p><?php echo isset($userAddress) ? $userAddress ['postcode']: 'Guest';?></p>

                    </div>
                </div>
            </div>

        <div class="mainProfile">
            <div class="header">Edit Account</div>
            <div class="tabSelection">
                <button class="tabBtn" onclick="openPage(event , 'personal' )" id="defaultTab">Personal Details</button>
                <button class="tabBtn" onclick="openPage(event , 'Security' )">Security</button>
                <button class="tabBtn" onclick="openPage(event , 'address')"> Address</button>
            </div>
            <div class="tabsArea">
                <div id="personal" class="tabContent">
                    <div class="card-body">
                        <form id="formAccountSettings" method="GET" action="dataChange/changeInfo.php">
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="inputFirstName">First name</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="First name">
                                </div>
                                <div class="form-group ">
                                    <label for="inputLastName">Last name</label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmailAddress">Email address</label>
                                <input type="email" class="form-control" id="inputEmailAddress" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
                            </div>
                            <div class="form-group">

                            </div>


                            <div class="ActionButton">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="Security" class="tabContent" style="display: none">
                    <div class="card-body">
                        <form id="formAccountSetting" method="get" action="dataChange/changePassword.php">
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" placeholder="Current Password">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="ActionButton">
                                <button type="submit" class="btn btn-primary me-2" method="">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="address" class="tabContent" style="display: none">
                    <div class="card-body">
                        <form id="formAccountSetting" method="get" action="dataChange/changeAddr.php">
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group">
                                    <label for="inputPostcode">Post Code</label>
                                    <input type="text" class="form-control" id="inputPostcode">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="inputCountry">Country</label>
                                <input type="text" class="form-control" id="inputCountry">
                            </div>
                            <div class="ActionButton">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>