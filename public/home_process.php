<?php
session_start();
$email = $_SESSION['email'] ?? ''; // Récupérer l'email de la session

// Chemin vers la base de données SQLite3
$database = new PDO('sqlite:data.db');

// Création de la table info si elle n'existe pas elle doit etre jointe avec la user par l'email
$query = "CREATE TABLE IF NOT EXISTS info (
    id INTEGER PRIMARY KEY,
    fname TEXT NOT NULL,
    lname TEXT NOT NULL,
    bdate TEXT NOT NULL,
    pseudo TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    pp BLOB NOT NULL,
    FOREIGN KEY (email) REFERENCES users (email) 
)";
$database->exec($query);

// Join des tables par l'émail
$query = "SELECT * FROM users JOIN info ON users.email = info.email";
$stmt = $database->prepare($query);
$stmt->execute();
$user = $stmt->fetch();

// Vérification si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $pseudo = $_POST['pseudo'];

    // Pour l'image, vous devez gérer l'upload et stocker l'image en binaire selon votre choix
    $pp = file_get_contents($_FILES['pp']['tmp_name']);
  


    // Préparation de la requête d'insertion
    $stmt = $database->prepare("INSERT INTO info (fname, lname, bdate, pseudo, email, pp) VALUES (:fname, :lname, :bdate, :pseudo, :email, :pp)");
    // Liaison des paramètres
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':bdate', $bdate);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pp', $pp, PDO::PARAM_LOB); // Pour l'image

    // Exécution de la requête
    $stmt->execute();

    echo "Informations enregistrées avec succès.";

    // Redirection vers ok.php
    header('Location: ok.php');
}
?>