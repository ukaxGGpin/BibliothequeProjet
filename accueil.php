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
  <div class="container">
    <!-- En-tête -->
    <?php
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
                <img src="images/bleak.jpg" alt="Bleak" class="d-block" style="width: 800px; length: 500px;">
                <div class="carousel-caption">
                  <h3>Squezzie</h3>
                  <p>Livre d'horreur du célèbre Youtubeur Squezzie</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/NoetMoi.jpg" alt="NoetMoi" class="d-block" style="width: 800px;length: 80px;">
                <div class="carousel-caption">
                  <h3>Delphine de Vigan</h3>
                  <p>Histoire passionnate du jeune fille et d'une sdf</p>
                </div> 
              </div>
              <div class="carousel-item">
                <img src="images/lesMisérables.jpg" alt="LesMisérables" class="d-block" style="width: 800px;length: 300px;">
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


  <!--  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <form class="d-flex col-sm-8">
        <input class="form-control me-5" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
      <div class="container-fluid col-sm-3 ">
        <form action="panier.php" method="post">
          <button class="btn btn-primary" type="button">Panier</button>
        </form>
      </div>
      <div class="container-fluid col-sm-2">
        <a class="navbar-brand">
          <img src="logo-bibliotheque_23-2147505735.avif" alt="Logo" style="width:70px;" class="rounded-pill">
        </a>
      </div>
    </nav>
    <div class="container mt-3">
      <h2>Se connecter</h2>
      <form action="">
        <div class="mb-3 mt-3">
          <label for="email">Mail:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="mail">
        </div>
        <div class="mb-3">
          <label for="pwd">Mot de passe:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Mdp">
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-primary">se connecter</button>
      </form>
    </div>
    
       

  </form>
</div>
-->
  </div>
  <footer>
  <div class="container-fluid ">
    <div class="texte-center">
        <p>
        <h5 class="texte-center">La Bibliotheque LSB est fermée au public j'usqu'a nouvel ordre. Mais il vous est possible de réservé et
          retirer vos livre via notre service de Bibliotheque en ligne!</h5>
        </p>
      </div>
    </footer>

</body>

</html>