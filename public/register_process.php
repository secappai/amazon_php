<?php
// Connect to the SQLite3 database amazing.db
$dbPath = 'amazing.db';

try {
    $db = new PDO("sqlite:$dbPath");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
    exit;
}

// create the users table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, email TEXT UNIQUE, password TEXT)");



// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];

// Validate the form data
if ($password != $rePassword) {
    echo "Passwords do not match.";
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

if ($db->exec($sql)) {
    echo "Registration successful!";
    // Redirect to the login page or display a success message
    header("Location: login.html");
    exit;
} else {
    echo "Error: " . $db->lastErrorMsg();
}

$db->close();
?>