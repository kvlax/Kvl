<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Connect to your PostgreSQL database
    $db = new PDO("pgsql:host=ep-billowing-glade-17644033-pooler.us-east-1.postgres.vercel-storage.com;dbname=verceldb", "your_username", "sOtjrv7Zg4Rc");

    // Insert user data into the 'users' table
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    // Close the database connection
    $db = null;

    // Redirect to a success page or homepage
    header("Location: /welcome.html");
    exit();
}
?>
