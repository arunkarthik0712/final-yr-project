<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <main>
        <h2>Register</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" required><br>

            <label for="department">Department</label>
            <input type="text" id="department" name="department" required><br>
             <label for="mobile">mobile</label>
            <input type="text" id="mobile" name="mobile" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </main>
</body>
</html>
<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $desg = $_POST["designation"];
    $dept = $_POST["department"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $sql = "INSERT INTO users (uname, psword,designation,department,mobile_number,email) VALUES ('$username', '$password','$desg','$dept','$mobile','$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
