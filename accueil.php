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

    <div>
      <?php
      session_start();
      include("entete.html");
      ?>
      <!-- Corps page principale -->
      <div class="row">
        <div class="col-md-8">
          <?php
          require_once('connexionSql.php');
          //Requete pour chercher le livre
          $requete = "SELECT * FROM `livre` ORDER BY dateajout DESC LIMIT 3";
          $resultat = $connexion->query($requete);
          $livre = $resultat->fetch(PDO::FETCH_ASSOC);
          if ($resultat->rowCount() > 0) {
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
              $imagePath = $row['image'];
            ?>
              <div id="demo" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>';
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>';
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>';
              <!--The slideshow/carousel-->
              <div class="text-center">';
              <h2 style="color: #fff;">Derniere acquisition</h2>';
              </div>';
              <div class="carousel-inner">';
              <div class="carousel-item active">';
            <?php
              echo '<img src=" ' . $livre['image'] . ' " alt=""> ';
              echo '<div class="carousel-caption">';
              echo "<h5><p>Titre: " . $livre['titre'] . "</p></h5>";
              echo '</div>';
              echo '<div class="carousel-item active">';
              echo '<img src=" ' . $livre['image'] . ' " alt=""> ';
              echo '<div class="carousel-caption">';
              echo "<h5><p>Titre: " . $livre['titre'] . "</p></h5>";
              echo '</div>';
              echo '<div class="carousel-item active">';
              echo '<img src=" ' . $livre['image'] . ' " alt=""> ';
              echo '<div class="carousel-caption">';
              echo "<h5><p>Titre: " . $livre['titre'] . "</p></h5>";
              echo '</div>';
              echo '</div>';
              echo '</div>';
              // Left and right controls/icons 
              echo '<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">';
              echo '<span class="carousel-control-prev-icon"></span>';
              echo '</button>';
              echo '<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">';
              echo '<span class="carousel-control-next-icon"></span>';
              echo '</button>';
              echo '</div>';
              echo '</div>';
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
    </div>
  </div>

</body>

</html>