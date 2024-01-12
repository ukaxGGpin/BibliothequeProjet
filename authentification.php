<?php
require_once('connexionSql.php');

// Vérifiez si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
    if (isset($_POST['mail']) && isset($_POST['Mdp'])) {
        try {
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête préparée pour l'authentification
            $requete_authentification = $connexion->prepare("SELECT mel, nom FROM utilisateur WHERE mel = :email AND motdepasse = :mdp");

            $email = $_POST['mail'];
            $mdp = $_POST['Mdp'];

            $requete_authentification->bindParam(':email', $email);
            $requete_authentification->bindParam(':mdp', $mdp);
            $requete_authentification->execute();

            if ($requete_authentification->rowCount() > 0) {
                $utilisateur = $requete_authentification->fetch(PDO::FETCH_ASSOC);
                $_SESSION['utilisateur_connecte'] = true;
                $_SESSION['nom_utilisateur'] = $utilisateur['nom'];
                $_SESSION['email_utilisateur'] = $utilisateur['mel'];

                // Redirection ou autre action après une authentification réussie
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}


// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['utilisateur_connecte'])) {
    // Affichez les informations de l'utilisateur connecté et le bouton de déconnexion
    echo'<div class="text-center"';
    echo '<div class="login-card-container">';
    echo '<div class="login-card">';
    echo '<table style="padding: 1rem;">';
    echo "<tr><td>";
    echo "Bienvenue " . $_SESSION['nom_utilisateur'] . "<br>";
    echo "Email: " . $_SESSION['email_utilisateur'] . "<br>";
    echo '<form action="deconnexion.php" method="post">';
    echo '<br><button type="submit" class="btn btn-primary">Se déconnecter</button>';
    echo '</form>';
    echo "</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
} 
 else {
    // Si l'utilisateur n'est pas connecté, affichez le formulaire de connexion
    echo '<div class="login-card-container">';
    echo '<div class="login-card">';
    echo '<div class="login-card-logo">';
    echo '<div class="text-center" style="display: flex !important; justify-content: center !important; align-items: center !important; height: 70%; margin-right: 1rem;">';
    echo '<table style=" min-width: 70%; padding: .5rem !important; min-height: 70%; //">';
    echo '<tr><td>';
    echo '<div class="login-card-header">';//git
    echo '<h2>Se connecter</h2>';
    echo '</div>';
    echo '<form class="login-card-form" method="post">';//git
    echo '<div class="form-item">';//git
    echo '<span class="form-item-icon material-symbols-rounded">mail</span>';//git
    echo '<label for="email"></label>';
    echo '<input type="email" class="form-control" id="email" placeholder="Entrer votre mail" name="mail"autofocus required><br>';
    echo '<label for="pwd"></label>';
    echo '<div class="form-item">';//git
    echo '<span class="form-item-icon material-symbols-rounded">lock</span>';
    echo '<input type="password" class="form-control" id="pwd" placeholder="Entrer votre mot de passe" name="Mdp"autofocus required><br>';
    echo '<div class="form-item-other">';
    echo '<div class="checkbox">';
    echo '<input type="checkbox" id="rememberMeCheckbox" checked>';
    echo '<label for="rememberMeCheckbox">Se souvenir de moi</label><br>';
    echo '<div class="d-grid gap-2">';
    echo '<button type="submit" class="btn btn-primary" name="submit">Se connecter</button>';
    echo '</div>';

    

   }

?>

