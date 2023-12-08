<?php
session_start();
require_once('connexionSql.php');
if (isset($_POST["mail"])) {
  $mail=$_POST["mail"];
  $Mdp=$_POST["Mdp"];
  $stmt = $connexion->prepare("SELECT * FROM utilisateur where mel=:mail AND motdepasse=:Mdp");
  $stmt->bindValue(":mail", $mail); // pas de troisième paramètre STR par défaut
  $stmt->bindValue(":Mdp", $Mdp); // idem
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  // Les résultats retournés par la requête seront traités en 'mode' objet
  $stmt->execute();
  // Parcours des enregistrements retournés par la requête : premier, deuxième…

  if($enregistrement = $stmt->fetch())
  {
    echo "Bienvenue.$mail."
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