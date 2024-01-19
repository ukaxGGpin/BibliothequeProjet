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
    <div class="row">
      <div class="col-md-8">
        <!-- En-tête -->
        <div>
          <?php
          //revoi les session_start car la ton sesion_start est en trop !
          session_start();
          include("entete.html");
          ?>
          <!-- Corps page principale -->
          <div class="row">
            <div class="col-md-8">
              <?php
             echo '<div id="demo" class="carousel slide" data-bs-ride="carousel">';
             echo '<ul class="carousel-indicators">';
             echo '<li data-bs-slide-to="0" class="active"></li>';
             echo '<li data-bs-slide-to="1"></li>';
             echo '</ul>';
             echo '<div class="carousel-inner">';
             
             require_once('connexionSql.php');
             $stmt = $connexion->prepare("SELECT * FROM `livre` ORDER BY dateajout DESC LIMIT 2");
             $stmt->setFetchMode(PDO::FETCH_OBJ);
             $stmt->execute();
             
             $first = true; // Utilisé pour définir la classe active uniquement pour le premier élément
             
             while ($enregistrement = $stmt->fetch(PDO::FETCH_OBJ)) {
                 echo '<div class="carousel-item container-fluid' . ($first ? 'active' : '') . '">';
                 echo '<img src="' . $enregistrement->image . '" class="d-block w-100" alt="Image du livre">';
                 echo '</div>';
                 $first = false; // Désactive la classe active après le premier élément
             }
              echo '</div>';
              echo '<a class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">';
              echo '<span class="carousel-control-prev-icon"></span>';
              echo '</a>';
              echo '<a class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">';
              echo '<span class="carousel-control-next-icon"></span>';
              echo '</a>';
              echo '</div>';
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