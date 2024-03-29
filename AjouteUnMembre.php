<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Bibliotheque LSB</title>
  <?php
  session_start();
  include('cookie.html')
  ?>
</head>

<body>
  <?php
  if (!isset($_SESSION['utilisateur_connecte']) || $_SESSION['profil_utilisateur'] == 'utilisateur') {
  
    echo "Connecté vous en tant que Admin pour accédée à cette page. ";
    echo '<a href="accueil.php" class="btn btn-primary">Retour à la page d\'accueil</a>';
  } 
  else{

  
  ?>
<div class="text-center">
<table class=" table-bordered ">
    <tr>
  <form  method="post" >
    <div class="mb-3 mt-3">
      <label for="prenom" class="form-label">Prénom:</label>
      <input type="text" class="form-control"  placeholder="Entrer votre prénom" name="prenom">
    </div>
  <div class="mb-3 mt-3">
    <label for="nom" class="form-label">Nom:</label>
    <input type="text" class="form-control"  placeholder="Entrer votre nom" name="nom">
  </div>
  <div class="mb-3 mt-3">
    <label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control"  placeholder="Entrer votre mail" name="mail">
  </div>
  <div class="mb-3 mt-3">
    <label for="Mdp" class="form-label">Mot de passe:</label>
    <input type="password" class="form-control"  placeholder="Entrer votre Mot de passe" name="Mdp">
  </div>
  <div class="mb-3 mt-3">
    <label for="adresse" class="form-label">Adresse:</label>
    <input type="text" class="form-control" placeholder="Entrer votre adresse" name="adresse">
  </div>
  <div class="mb-3 mt-3">
    <label for="ville" class="form-label">Ville:</label>
    <input type="text" class="form-control"  placeholder="Entrer votre ville" name="ville">
  </div>
  <div class="mb-3">
    <label for="codepostal" class="form-label">Code Postal:</label>
    <input type="text" class="form-control"  placeholder="Entrer votre code postal" name="CodePostal">
  </div>
  <div class="dropdown">
                <label for="Profil" class="form-label">Profil:</label>
                <select class="form-select" name="Profil">
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
  <br><button type="submit" class="btn btn-primary" name="Ajouter_membre">Crée votre compte</button>
</form> 
</tr>
</table>
</div>
</body>
</html>

<?php


if (isset($_POST['Ajouter_membre'])) {
 require_once('connexionSql.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Requete sql pour mettre un membre
   $stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mail, :Mdp, :nom, :prenom, :adresse, :ville, :CodePostal, :Profil)");

   $mel = $_POST['mail'];
   $Mdp = $_POST['Mdp'];
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $adresse = $_POST['adresse'];
   $ville = $_POST['ville'];
   $codepostal = $_POST['CodePostal'];
   $profil = $_POST['Profil'];

   $stmt->bindValue(':mail', $mel, PDO::PARAM_STR);
   $stmt->bindValue(':Mdp', $Mdp, PDO::PARAM_STR);
   $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
   $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
   $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
   $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
   $stmt->bindValue(':CodePostal', $codepostal, PDO::PARAM_STR);
   $stmt->bindValue(':Profil', $profil, PDO::PARAM_STR);

   $stmt->execute();
   $nb_ligne_affectees = $stmt->rowCount();
   // Message d'enregistrement
   echo $nb_ligne_affectees . " Inscription enregistrée";
   $dernier_numero = $connexion->lastInsertId();

   if ($nb_ligne_affectees > 0) {
     echo "Votre inscription a été enregistrée. ";
     echo '<a href="accueil.php" class="btn btn-primary">Retour à la page d\'accueil</a>';
   }
 }
}



}

 ?>

