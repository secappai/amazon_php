<?php
// Connect to the database amazing.db
$dbPath = 'amazing.db';

try {
    $db = new PDO("sqlite:$dbPath");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
    exit;
}
// create the info table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS info (fname TEXTNOT NULL, lname TEXT NOT NULL, bdate TEXT NOT NULL, pseudo TEXT UNIQUE NOT NULL, email TEXT NOT NULL, pp BLOB)");

// Get the form data (fname, lname, bdate, pseudo, pp(wich is a file))
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$pseudo = $_POST['pseudo'];
$pp = $_FILES['pp'];

// transform the pp to a blob
$pp = file_get_contents($pp['tmp_name']);

// get the email from the login page
session_start();
$email = $_SESSION['email'];


// Prepare the SQL statement
$sql = "INSERT INTO info (fname, lname, bdate, pseudo, email, pp) VALUES (:fname, :lname, :bdate, :pseudo, :email, :pp)";

// Bind the parameters
$stmt = $db->prepare($sql);
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':bdate', $bdate);
$stmt->bindParam(':pseudo', $pseudo);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pp', $pp, PDO::PARAM_LOB); // Bind $pp as a BLOB

// Execute the statement
if ($stmt->execute()) {
    echo "Message sent successfully!";
    // Redirect to the ok page or display a success message
    header("Location: ok.html");
    exit;
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

$db->close();
?>