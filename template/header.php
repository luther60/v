<?php
 define('_INDEX_','Bienvenue chez votre garagiste pro | Vente de véhicules d\'occasions | Spécialiste toutes réparations automobiles');
 define('_CARS_','Vendeur spécialiste de véhicules d\'occasion | Véhicules fiables et garanties');
 define('_ACCUEIL_','Bienvenue au Garage V.parrot ');
 define('_SALES_CARS_','Nos véhicules d\'occasions'); 
 define('_CONTACT_','Formulaire de contact V.parrot');
 define('_POST_RATING_','Déposer un avis pour le garage V.parrot');
 define('_CASUAL_','Garage V.parrot');
 define('_DESC_CARS_','Garage Parrot, votre spécialiste des véhicules d\'occasions fiables et garantie 6 mois minimum !');
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  <?php
  if($_SERVER['REQUEST_URI'] === '/index.php') {
    echo"<title>"._ACCUEIL_."</title>";
    echo"<meta name="._INDEX_."/>";
  }elseif($_SERVER['REQUEST_URI'] === '/vehicules.php') {
    echo"<title>"._SALES_CARS_."</title>";
    echo"<meta name="._CARS_."/>";
    echo"<meta description="._DESC_CARS_."/>";
  }elseif($_SERVER['REQUEST_URI'] === '/email.php') {
    echo"<title>"._CONTACT_."</title>";
  }elseif($_SERVER['REQUEST_URI'] === '/post_avis.php'){
    echo"<title>"._POST_RATING_."</title>";
  }else {
    echo"<title>"._CASUAL_."</title>";
  }
  ?>
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
      <ul><li><a class='nav_link' href="/vehicules.php">Nos véhicules</a></li></ul>
    </div>
    <div class="lien">
      <img class="icon" src="/assets/mail.png" alt="icone message">
      <ul><li><a class='nav_link' href="../contact.php">Nous contactez</a></li></ul>
    </div>
    <div class="lien">
      <img class="icon" src="/assets/avis.png" alt="icone avis">
      <ul><li><a class='nav_link' href="../post_avis.php">Poster un avis</a></li></ul>
    </div>
    </ul>
  </nav>
</header>