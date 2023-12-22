<?php
require_once('conf/connexion.php');
$stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:,: , , , , , ,");
// insertion d'une ligne
$nom = $_POST[''];
$prenom = 'Jacques';
$mel = 'j.martin@yahoo.fr';
$mot_de_passe = 'casimir';
$stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
$stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
$stmt->bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
$stmt->execute();
$nb_ligne_affectees = $stmt->rowCount();
echo $nb_ligne_affectees." Inscription enregistré";
$dernier_numero = $connexion->lastInsertId();
?>
  <table class=" table-bordered ">
    <tr>
  <form  method="post">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Nom:</label>
    <input type="email" class="form-control"  placeholder="Entrer votre nom" name="nom">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Prénom:</label>
    <input type="email" class="form-control"  placeholder="Entrer votre prénom" name="prenom">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Adresse:</label>
    <input type="email" class="form-control" placeholder="Entrer votre adresse" name="adresse">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Ville:</label>
    <input type="email" class="form-control"  placeholder="Entrer votre ville" name="ville">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Nom:</label>
    <input type="email" class="form-control"  placeholder="Entrer votre mail" name="mail">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Code Postal:</label>
    <input type="password" class="form-control"  placeholder="Entrer un mot de passe" name="pswd">
  </div>
  <button type="submit" class="btn btn-primary">Crée votre compte</button>
</form>
</tr>
</table>
