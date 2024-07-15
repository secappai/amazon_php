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

// Préparation de la requête SQL pour vérifier l'existence de l'utilisateur par email
$query = "SELECT * FROM users WHERE email = :email";
$stmt = $database->prepare($query);

// Liaison des paramètres
$stmt->bindParam(':email', $email);

// Exécution de la requête
$stmt->execute();

// Récupération de l'utilisateur
$user = $stmt->fetch();

// Vérification si le mot de passe correspond au hachage dans la base de données
if ($user && password_verify($password, $user['password'])) {
    session_start();
    session_regenerate_id(); // Régénérer l'ID de session pour prévenir les attaques de fixation de session
    $_SESSION['email'] = $email; // Stocker l'email dans la session
    // Utilisateur trouvé, redirection vers home.php
    header('Location: home.php');
} else {
    // Utilisateur non trouvé ou mot de passe incorrect, affichage d'une erreur
    echo "Erreur lors de la connexion. (user or password wrong)";
}

// Fermeture de la connexion
$database = null;
exit;
?>