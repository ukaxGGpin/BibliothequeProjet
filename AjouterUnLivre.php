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
    require_once('connexionSql.php');

    if (isset($_POST['ajouter_livre'])) {
        $titre = $_POST['titre'];
        $isbn13 = $_POST['isbn13'];
        $anneeparution = $_POST['anneeparution'];
        $resume = $_POST['resume'];

        // Exécutez la requête pour récupérer la liste des auteurs depuis la base de données
        $requete_auteurs = $connexion->prepare("SELECT noauteur, nom, prenom FROM auteur");
        $requete_auteurs->execute();
        $auteurs = $requete_auteurs->fetchAll(PDO::FETCH_ASSOC);

        // Exécutez la requête d'ajout de livre
        $requete_ajout_livre = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, resume, dateajout) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :resume, NOW())");

        $requete_ajout_livre->bindParam(':noauteur', $_POST['noauteur']);
        $requete_ajout_livre->bindParam(':titre', $titre);
        $requete_ajout_livre->bindParam(':isbn13', $isbn13);
        $requete_ajout_livre->bindParam(':anneeparution', $anneeparution);
        $requete_ajout_livre->bindParam(':resume', $resume);

        echo '<div class="text-center">';
        echo '<table class=" table-bordered ">';
        echo '<tr>';
        echo '<form  method="post">';
        echo '<div class="mb-3 mt-3">';
        echo '<div class="dropdown">';
        echo '<label for="Profil" class="form-label">Auteur:</label>';
        echo '<select class="form-select" name="noauteur">';
        
        foreach ($auteurs as $auteur) {
            echo '<option value="' . $auteur['noauteur'] . '"></option>';
        }

        echo '</select>';
        echo '</div>';
        echo '</div>';
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
        echo '</div>';

        echo '<button type="submit" class="btn btn-primary" name="ajouter_livre">Ajouter le livre</button>';
        echo '</form>';
        echo '</td></tr>';
        echo '</table>';
        echo '</div>';

        if ($requete_ajout_livre->execute()) {
            echo "Livre ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du livre.";
        }
    }
    ?>
</body>

</html>
