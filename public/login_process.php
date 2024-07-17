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

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare the SQL statement
$stmt = $db->prepare("SELECT password FROM users WHERE email = :email");
$stmt->bindValue(':email', $email);

// Execute the statement
$stmt->execute();

// Check if a user with the provided email exists
$result = $stmt->fetch(PDO::FETCH_ASSOC);

//stock the email in the session
session_start();
$_SESSION['email'] = $email;

if ($result) {
    // Verify the password with the hashed one
    if (password_verify($password, $result['password'])) {
        echo "Login successful!";
        // Redirect to the home page or display a success message
        header("Location: home.html");
        exit;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$db = null; // Close the database connection
?>
