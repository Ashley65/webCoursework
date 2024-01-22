
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="../Login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php

?>
<form action="RSValidate.php" method="post" AUTOCOMPLETE="off" >
    <div class="loginBox">
        <h1>Student Signup</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <label>
                <input type="text" placeholder="First Name" name="FName" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <label>
                <input type="text" placeholder="Last Name" name="LName" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-username"></i>
            <label>
                <input type="text" placeholder="Username" name="username" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label>
                <input type="password" placeholder="Password" name="password" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label>
                <input type="password" placeholder="Confirm Password" name="cpassword" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <label>
                <input type="text" placeholder="Email" name="email" value="">
            </label>
        </div>
        <div class="textbox">
            <i class="fas fa-phone"></i>
            <label>
                <input type="text" placeholder="Phone" name="phone" value="">
            </label>
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
            </label>
        </div>

        <input class="btn" type="submit" name="signup" value="sign up">
        <footer> Already a member? <a href="LoginStudent.php"> login here</a> </footer>


    </div>
</form>


</body>
</html>
