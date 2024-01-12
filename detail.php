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
  
  <div class="container-fluid">
    <!-- En-tête -->
   
    <div >
    <?php
    session_start();
    include("entete.html");
    ?>
    <!-- Corps page principale -->
      <div class="row">
        <div class="col-md-8">
            <?php
        require_once('connexionSql.php');
        // Vérifie si le numéro de livre est présent dans la barre de l'URL
        if (isset($_GET['nolivre'])) {
            //connexion à la base SQL

            $nolivre = $_GET['nolivre'];

            // Requête SQL pour avoir les détails 
            $requete = "SELECT * FROM livre WHERE nolivre = ?";
            $stmt = $connexion->prepare($requete);
            $stmt->execute([$nolivre]);
            $livre = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($livre) {
                // Affichier les détails du livre
                echo '<div class="row">';
                echo '<div class="col-md-8">';
                echo "<h5><p>Titre: " . $livre['titre'] . "</p></h5>";
                echo "<p>ISBN-13: " . $livre['isbn13'] . "</p>";
                echo "<p>Année de parution: " . $livre['anneeparution'] . "</p>";
                echo "<p>Résumé: <br>" . $livre['resume'] . "</p>";
                echo ' <div class="img ">';
                echo '<img src=" '.$livre['image'].' " alt=""> ';
                echo '</div>';
                // Boutton pour le panier
                echo '<form action="panier.php" method="post">';
                echo '<br><button type="submit" class="btn btn-primary">Ajouter au panier</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Aucun détail de livre trouvé.";
            }
        } else {
            echo "Aucun numéro de livre spécifié.";
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
</div>

</body>

</html>