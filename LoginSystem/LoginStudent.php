<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../Login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<form action="Validate.php" method="post">
    <div class="loginBox">
        <h1>Student Login</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
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

        <input class="btn" type="submit" name="login" value="login">
        <footer> Not a member? <a href="register.php"> register here</a> </footer>
    </div>
</form>

</body>
</html>