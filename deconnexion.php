<?php
// Démarrez la session
session_start();

// Détruire la session si elle est lancée
if (isset($_SESSION['utilisateur_connecte'])) {
    session_destroy();
}

// Redirige l'utilisateur vers la page d'acceuil (authentification.php)
header("Location: accueil.php"); 
exit;
?>
