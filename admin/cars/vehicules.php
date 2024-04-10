<?php session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
$vehicules = getVehicules($pdo);
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

$carsForJs = json_encode($vehicules);
$carsFiles = file_put_contents(__DIR__.'/../../json/vehicules.json',$carsForJs);
?>

<h1 class="title_index">Bienvenue dans votre espace de gestion des vehicules <?= $_SESSION['user']['firstname'] ?></h1>

<div class="content_user btn_modify"><a class="link_modify" href="create_vehicule.php">Créer un nouveau vehicule</a></div>

<main>
  <section class="bloc_card">

  <?php foreach($vehicules as $vehicule) { ?>
  <article class="card_car">
    
    <?php if($vehicule['img'] == null) { ?>
      <img id="img_card" src="/../../admin/upload_img/backcars2.jpg" alt=""/>
    <?php }else{ ?>
    <img class="img_card" src="<?= $vehicule['img'] ?>" alt="<?= $vehicule['img'] ?>"/>
    <?php } ?>

    <div class="text_card">
    <h2><?= $vehicule['marque'].' '.$vehicule['modele'] ?></h2>
    <p><?= $vehicule['km'] ?></p>
    <p><?= $vehicule['annee'] ?></p>
    <h2><?= $vehicule['prix'] ?>€</h2>
    <div class="link_car"><a href="vehicules_details.php?id_car=<?= $vehicule['id_car'] ?>">Détails</a></div>
    </div>
  </article>
  <?php }  ?>

  </section>
</main>

<?php require_once __DIR__.'/../footer.php';?>