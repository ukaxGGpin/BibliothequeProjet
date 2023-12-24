<?php
// Démarrez la session
session_start();

// Détruisez la session si elle est initialisée
if (isset($_SESSION['utilisateur_connecte'])) {
    session_destroy();
}

// Redirigez l'utilisateur vers une page appropriée après la déconnexion
header("Location: accueil.php"); // Assurez-vous que c'est le bon chemin vers votre page d'authentification
exit;
?>
