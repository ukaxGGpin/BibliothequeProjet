<?php
// Paramètres de connexion à la base de données
session_start();
require_once('connexionSql.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des champs du formulaire
    if (isset($_POST['mail']) && isset($_POST['Mdp'])) {
        // Connexion à la base de données
        try {
            //$connexion = new PDO("mysql:host=localhost;dbname=bibliodrive", $utilisateur, $mot_de_passe);
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
                $utilisateur = $requete_authentification->fetch(PDO::FETCH_ASSOC);
                echo "Authentification réussie !<br>";
                echo "Bienvenue " . $utilisateur['nom'] . "<br>";
                echo "Email: " . $utilisateur['email'] . "<br>";
                // Autres actions après l'authentification réussie
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
?>
<table>
<h2>Se connecter</h2>
<form action="authentification.php" method="post">
          <tr>
          <label for="email">Mail:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="mail">
          <label for="pwd">Mot de passe:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Mdp">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> se souvenir de moi
          </label><br>
        <button type="submit" class="btn btn-primary">se connecter</button>
      </tr>
    </table>  
      </form>