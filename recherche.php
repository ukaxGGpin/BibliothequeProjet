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
            require_once('connexionSql.php');           
            // Nom de l'auteur pour lequel on souhaite récupérer les livres
            $nom_auteur =$_POST['recherche'];            
            // Requête SQL pour récupérer les livres de l'auteur renseigner
            $sql = "SELECT * FROM livre WHERE noauteur = '$nom_auteur'";           
            $resultat = $connexion->query($sql);            
            // Vérifier s'il y a des résultats
            if ($resultat) {
                // Afficher les livres de l'auteur
                while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)); { 
                    echo "Titre : " . $ligne["titre"] . " - Auteur : " . $ligne["noauteur"] . "<br>";
                }
            } else {
                echo "Aucun livre trouvé pour cet auteur.";
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