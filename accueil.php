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
              require_once('connexionSql.php');
echo '<div id"demo" class ';
echo '';
echo '';
echo '';
echo '';
echo '';
echo '';


 
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