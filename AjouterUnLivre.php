<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Bibliotheque LSB</title>
    <?php
    include('cookie.html');
    ?>
</head>

<body>
    <?php

if (isset($_POST['ajout_livre'])) {
    require_once('connexionSql.php');

        $titre = $_POST['titre'];
        $isbn13 = $_POST['isbn13'];
        $anneeparution = $_POST['anneeparution'];
        $resume = $_POST['resume'];
        $image = $_POST['image'];

        // Exécutez la requête d'ajout de livre
        $requete_ajout_livre = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, resume, dateajout, image) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :resume, :dateajout, :image)");


        $requete_ajout_livre->bindParam(':noauteur', $_POST['noauteur']);
        $requete_ajout_livre->bindParam(':titre', $titre);
        $requete_ajout_livre->bindParam(':isbn13', $isbn13);
        $requete_ajout_livre->bindParam(':anneeparution', $anneeparution, PDO::PARAM_INT);
        $requete_ajout_livre->bindParam(':resume', $resume);
        $requete_ajout_livre->bindParam(':image', $image);
        $requete_ajout_livre->bindParam(':dateajout', $dateAjout);
        $dateAjout = date("Y-m-d");

    
        if ($requete_ajout_livre->execute()) {
            echo '<a href="accueil.php" class="btn btn-primary">Retour à la page d\'accueil</a>';
        } else {
            echo "Erreur lors de l'ajout du livre.";
        }
        
        
        
        // Exécutez la requête pour récupérer la liste des auteurs depuis la base de données
  
        
    }
    require_once('connexionSql.php');

    $requete_auteurs = $connexion->prepare("SELECT noauteur, nom, prenom FROM auteur");
    $requete_auteurs->execute();
    $auteurs = $requete_auteurs->fetchAll(PDO::FETCH_ASSOC);
    //echo $auteurs;
        echo '<div class="text-center">';
        echo '<form  method="post">';
        echo '<table class=" table-bordered ">';
        echo '<tr>';
        echo '<div class="mb-3 mt-3">';
        echo '<div class="dropdown">';
        echo '<label for="Profil" class="form-label">Auteur:</label>';
        echo '<select class="form-select" name="noauteur">';
        
        foreach ($auteurs as $auteur) {
            echo '<option value="' . $auteur['noauteur'] . '">'. $auteur['nom'] . ' </option>';
        } 
   echo'</select>';
   echo'</div>';
   echo '<div class="text-center">';
   echo '<table>';
   echo '<div class="mb-3 mt-3">';
   echo '<label for="nom" class="form-label">Titre:</label>';
   echo '<input type="text" class="form-control" placeholder="Entrer le titre" name="titre">';
   echo '</div>';
   echo '<div class="mb-3 mt-3">';
   echo '<label for="mail" class="form-label">ISBN:</label>';
   echo '<input type="text" class="form-control" placeholder="Entrer le numéro ISBN" name="isbn13">';
   echo '</div>';
   echo '<div class="mb-3 mt-3">';
   echo '<label for="Mdp" class="form-label">Année de publication:</label>';
   echo '<input type="text" class="form-control" placeholder="Entrer l\'année de publication" name="anneeparution">';
   echo '</div>';
   echo '<div class="mb-3 mt-3">';
   echo '<label for="adresse" class="form-label">Résumé:</label>';
   echo '<input type="text" class="form-control" placeholder="Entrer le résumé" name="resume">';
   echo '<div class="mb-3 mt-3">';
   echo '<label for="Mdp" class="form-label">image:</label>';
   echo '<input type="text" class="form-control" placeholder="Entrer l\'Url de l\'image" name="image">';
   echo '</div>';
   echo '</div>';
   echo '<button type="submit" class="btn btn-primary" name="ajout_livre">Ajouter le livre</button>';
   echo '</form>';
   echo '</td></tr>';
   echo '</table>';
   echo '</div>';



?>


</body>

</html>
