<?php
// Connexion à la base de données SQLite
$database = new PDO('sqlite:data.db');

// Création de la table si elle n'existe pas
$database->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)");

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];

// Vérification si les mots de passe correspondent
if ($password !== $rePassword) {
    echo "Les mots de passe ne correspondent pas.";
    exit;
}

// Hachage du mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Préparation de la requête d'insertion
$query = "INSERT INTO users (email, password) VALUES (:email, :password)";
$stmt = $database->prepare($query);

// Liaison des paramètres
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashedPassword);

// Exécution de la requête
if ($stmt->execute()) {
    // Redirection vers la page de connexion ou une page de succès
    header('Location: login.php');
} else {
    echo "Erreur lors de l'inscription.";
}

// Fermeture de la connexion
$database = null;
exit;
?>