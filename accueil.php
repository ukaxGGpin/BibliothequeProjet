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
            <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                  <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                  <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/bleak.jpg" alt="Los Angeles" class="d-block w-50">
                      </div>
                      <div class="carousel-item">
                        <img src="images/lesMisérables.jpg" alt="Chicago" class="d-block w-50">
                      </div>
                      <div class="carousel-item">
                        <img src="images/NoetMoi.jpg" alt="New York" class="d-block w-50">
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
      </div>

</body>

</html>