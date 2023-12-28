<?php
$db_host = "your_database_host";
$db_user = "your_database_username";
$db_password = "your_database_password";
$db_name = "mydatabase";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "Welcome, $username!";
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
