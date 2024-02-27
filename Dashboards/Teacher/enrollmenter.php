<?php
include "../Student/connection.php";
global $conn;


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Adding new user to student table</h1>
        <form action="newStudent.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <label for="student_email">Email</label>
            <input type="text" id="student_email" name="student_email">
            <input type="submit" value="new">
        </form>

        <h1>Enrollment</h1>
        <form action="enrollment.php" method="post">
            <label for="course_id">Course ID</label>
            <input type="text" id="course_id" name="course_id">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <input type="submit" value="Enroll">
        </form>
    </div>
</body>
</html>

