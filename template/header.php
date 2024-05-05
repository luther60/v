<?php require_once './lib/csp.php';  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  <title>Garage V.parrot</title>
</head>
<header>
  <!--First nav -->
  <nav class="head">
    <h1 class="logo"><a class="logo" href='../index.php'>Garage V.Parrot</a></h1>
    <div class="content_login">
    <img class="icon" src="/assets/home.png" alt="icone accueil">
    <h2><a class="login_link"  href="login.php">Espace pro</a></h2>
    </div>
  </nav>
  <!--Second nav -->
  <nav class="link">
    <ul class="link_category">
    <div class="lien">
      <img class="icon" src="/assets/cars_home.png" alt="icone accueil véhicule">
      <li><a class='nav_link' href="../vehicules.php">Nos véhicules</a></li>
    </div>
    <div class="lien">
      <img class="icon" src="/assets/mail.png" alt="icone message">
      <li><a class='nav_link' href="../contact.php">Nous contactez</a></li>
    </div>
    <div class="lien">
      <img class="icon" src="/assets/avis.png" alt="icone avis">
      <li><a class='nav_link' href="../post_avis.php">Poster un avis</a></li>
    </div>
    </ul>
  </nav>
</header>