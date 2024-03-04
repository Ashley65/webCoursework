<!--//--><?php
global $conn;
include "../config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['FName']) || empty($_POST['LName']) || empty($_POST['email']) || empty($_POST['phone'])) {
        echo "<script>alert('Please fill in all the fields')</script>";
        echo "<script>window.location.href='register.php'</script>";
    } else {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $cpassword = $_POST['cpassword'];
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

       // check if the password and confirm password fields match
        if (!password_verify($cpassword, $password)) {
            echo "<script>alert('Passwords do not match')</script>";
            echo "<script>window.location.href='register.php'</script>";
        }

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exists')</script>";
            echo "<script>window.location.href='register.php'</script>";

        }


        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (username, password, FName, LName, email, phone) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssssss", $username, $password, $FName, $LName, $email, $phone);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../dashboards/Student/StudentMain.php");
        } else {
            echo "Failed to register. Please try again.";
            echo "<br>";
            echo "<a href='register.php'>Try again</a>";
        }
    }
}


?>