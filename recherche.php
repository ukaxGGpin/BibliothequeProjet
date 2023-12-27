<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <title>Bibliotheque LSB</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
        <div class="text-center alert alert-danger container-fluid ">
              <p>
              <h5 >ATTENTION ! La Bibliotheque LSB est fermée au public j'usqu'a nouvel ordre. Mais il vous est possible de réservé et
                retirer vos livre via notre service de Bibliotheque en ligne!</h5>
              </p>
            </div>
    </div>
  <div class="container-fluid">
    <!-- En-tête -->
    <?php
      include("entete.html");
    ?>
    <!-- Corps page principale -->
      <div class="row">
        <div class="col-md-8">
            <?php
            //connexion a base SQL
  require_once('connexionSql.php');           
            // Vérifier si une recherche a été effectuée
if (isset($_POST['recherche']) && !empty($_POST['recherche'])) {
  $nom_auteur = $_POST['recherche'];

  // Préparer la requête SQL pour rechercher les livres liés à l'auteur recherché
  $requete = "SELECT livre.titre FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur WHERE auteur.nom = '$nom_auteur'";
  // Exécuter la requête
  $resultat = $connexion->query($requete);

  if ($resultat) {
      // Afficher les résultats de la recherche
      if ($resultat->rowCount() > 0) {
          echo '<div class="text-center">';
          echo "<h5 class= text_center>Livres de l'auteur $nom_auteur :</h2>";
          echo "</div>";
          while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
              echo "<a href" .  $row['titre'] .  "</a>";
          }
          
      } else {
          echo "Aucun livre trouvé pour cet auteur.";
      }
      
    } else {
      echo "Erreur dans la requête : " . $connexion->error;
  }
}
   ?>
        <div class="col-md-4">
      
          <?php
            include("authentification.php");
          ?>
        </div>
      </div>
  </div>
</body>

</html>