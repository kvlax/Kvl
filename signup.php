<?php
// Database connection
$host = "ep-billowing-glade-17644033-pooler.us-east-1.postgres.vercel-storage.com";
$database = "verceldb";
$user = "default";
$password = "sOtjrv7Zg4Rc";

$conn = new PDO("pgsql:host=$host;dbname=$database;user=$user;password=$password");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
