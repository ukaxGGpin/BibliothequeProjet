<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Bibliotheque LSB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
  <?php
  include('cookie.html')
  ?>
</head>

<body>
  </div>
  <div class="container-fluid">
    <!-- En-tête -->
    <?php
    session_start();
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
          $requete = "SELECT *  FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur WHERE auteur.nom = '$nom_auteur'";
          // Exécuter la requête
          $resultat = $connexion->query($requete);

          if ($resultat) {
            // Afficher les résultats de la recherche
            if ($resultat->rowCount() > 0) {
              echo '<div class="text-center">';
              echo "<h5 class= text_center>Livres de l'auteur $nom_auteur :</h5>";
              echo "<ul>";
              echo "</div>";
              while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><a href='detail.php?nolivre=". $row['nolivre'] . " '><h5>" . $row['titre'] . " (" . $row['anneeparution'] . ")</h5></a></li>";
              }
              echo "</ul>";
              // Si aucun livre trouver
            } else {
              echo '<div class="text-center">';
              echo "<h5>Aucun livre trouvé pour cet auteur.</h5>";
              echo "</div>";
            }
          } else {
           $connexion->error;
          }
        }
        ?>
      </div>
      <div class="col-md-4">

        <?php
        include("authentification.php");
        ?>
      </div>
    </div>
  </div>
  </div>
</body>

</html>