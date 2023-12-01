<?php
require_once('connexionSql.php');
$stmt = $connexion->prepare("SELECT * FROM utilisateur where mail=:nom AND prenom=:prenom");
$stmt->bindValue(":mail", $nom); // pas de troisième paramètre STR par défaut
$stmt->bindValue(":Mpd", $prenom); // idem
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $stmt->fetch())
{
  // Affichage des champs nom et prenom de la table 'utilisateur'
  echo '<h1>', $enregistrement->nom, ' ', $enregistrement->prenom,' ', $enregistrement->mot_de_passe,'</h1>';
}
?>