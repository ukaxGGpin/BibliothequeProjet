<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Bibliotheque LSB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container">

            <?php
              include("entete.html");
            ?>

      <div class="row">
    
          <div class="col-md-8">
          <div class="carousel-item">
  <img src="bleak.jpg" alt="Los Angeles">
  <div class="carousel-caption">
    <h3>BLEAK/h3>
    <p>Crée par le célebre YouTuber Squeezie</p>
  </div>
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
  </div>
  <footer>
  <div class="container-fluid mt-3">
    <div class="texte-center col-sm-12">
        <p>
        <h5 class="texte-center">La Bibliotheque LSB est fermée au public j'usqu'a nouvel ordre. Mais il vous est possible de réservé et
          retirer vos livre via notre service de Bibliotheque en ligne!</h5>
        </p>
      </div>
    </footer>
  -->

</body>

</html>