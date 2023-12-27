<?php
require_once('connexionSql.php');

// Vérifiez si l'utilisateur est déjà connecté
if(isset($_SESSION['utilisateur_connecte'])) {
    // Affichez les informations de l'utilisateur connecté et le bouton de déconnexion
    echo'<div class="text-center"';
    echo "<table class='rounded-table'>";
    echo "<tr><td>";
    echo "Bienvenue " . $_SESSION['nom_utilisateur'] . "<br>";
    echo "Email: " . $_SESSION['email_utilisateur'] . "<br>";
    echo '<form action="deconnexion.php" method="post">';
    echo '<button type="submit" class="btn btn-primary">Se déconnecter</button>';
    echo '</form>';
    echo "</td></tr>";
    echo "</table>";
    echo "</div>";

} else {
    // Si l'utilisateur n'est pas connecté, affichez le formulaire de connexion
    echo'<div class="text-center"';
    echo '<table class="rounded-table">';
    echo '<tr><td>';
    echo '<h2>Se connecter</h2>';
    echo '<form method="post">';
    echo '<label for="email">Mail:</label>';
    echo '<input type="email" class="form-control" id="email" placeholder="Entrer votre mail" name="mail"><br>';
    echo '<label for="pwd">Mot de passe:</label>';
    echo '<input type="password" class="form-control" id="pwd" placeholder="Entrer votre mot de passe" name="Mdp"><br>';
    echo '<label class="form-check-label">';
    echo '<input class="form-check-input" type="checkbox" name="remember"> se souvenir de moi';
    echo '</label><br>';
    echo '<div class="d-grid gap-2">';
    echo '<button type="submit" class="btn btn-primary" name="submit">Se connecter</button>';
    echo '</div>';
    echo '</form>';
    echo '<form action="AjouteUnMembre.php">';
    echo '<div class="d-grid gap-2">';
    echo '<button type="submit" class="btn btn-primary">Créer un compte</button>';
    echo '</div>';
    echo '</form>';
    echo '</td></tr>';
    echo '</table>';
    echo "</div>";

    if (isset($_POST['submit'])) {
        if (isset($_POST['mail']) && isset($_POST['Mdp'])) {
            try {
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Requête préparée pour l'authentification
                $requete_authentification = $connexion->prepare("SELECT mel, nom FROM utilisateur WHERE mel = :email AND motdepasse = :mdp");
                
                // Vos variables provenant du formulaire
                $email = $_POST['mail'];
                $mdp = $_POST['Mdp'];

                // Exécution de la requête préparée pour l'authentification
                $requete_authentification->bindParam(':email', $email);
                $requete_authentification->bindParam(':mdp', $mdp);
                $requete_authentification->execute();

                // Vérification de l'authentification et affichage des données si authentifié
                if ($requete_authentification->rowCount() > 0) {
                    // Stockez les informations de l'utilisateur dans la session
                    $utilisateur = $requete_authentification->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['utilisateur_connecte'] = true;
                    $_SESSION['nom_utilisateur'] = $utilisateur['nom'];
                    $_SESSION['email_utilisateur'] = $utilisateur['mel'];
                    
                    // Affichage d'un message de bienvenue
                    echo "Authentification réussie !<br>";
                    echo "Bienvenue " . $_SESSION['nom_utilisateur'] . "<br>";
                    echo "Email: " . $_SESSION['email_utilisateur'] . "<br>";
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
}
?>


