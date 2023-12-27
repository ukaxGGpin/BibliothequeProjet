<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Bibliotheque LSB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="text-center alert alert-danger container-fluid ">
              <p>
              <h5 >ATTENTION ! La Bibliotheque LSB est fermée au public j'usqu'a nouvel ordre. Mais il vous est possible de réservé et
                retirer vos livre via notre service de Bibliotheque en ligne!</h5>
              </p>
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
        <!-- Carousel -->
          <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="text-center">
              <h2>Derniere acquisition</h2>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/bleak.jpg" alt="Bleak" class="d-block ; ">
                <div class="carousel-caption">
                  <h3>Squezzie</h3>
                  <p>Livre d'horreur du célèbre Youtubeur Squezzie</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/NoetMoi.jpg" alt="NoetMoi" class="d-block ">
                <div class="carousel-caption">
                  <h3>Delphine de Vigan</h3>
                  <p>Histoire passionnate du jeune fille et d'une sdf</p>
                </div> 
              </div>
              <div class="carousel-item">
                <img src="images/lesMisérables.jpg" alt="LesMisérables" class="d-block ">
                <div class="carousel-caption">
                  <h3>Victor Hgo</h3>
                  <p>L'un des livre les plus prisés du célèbre écrivain Victor Hugo</p>
                </div>  
              </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
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