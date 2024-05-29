<?php session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
require_once __DIR__.'/../../lib/ini.php';
require_once __DIR__.'/../../lib/csp.php';
try{
$vehicules = getVehicules($pdo);
$carsForJs = json_encode($vehicules);
$carsFiles = file_put_contents(__DIR__.'/../../json/vehicules.json',$carsForJs);
}catch(Exception $e){
  echo"Capture de l'exception !".$e->getMessage();
};
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }


?>

<h1 class="title_index">Bienvenue dans votre espace de gestion des vehicules <?=htmlspecialchars($_SESSION['user']['firstname'])?></h1>

<div class="content_user btn_modify"><a class="link_modify" href="create_vehicule.php">Créer un nouveau vehicule</a></div>

<main>
  <section class="bloc_card">

  <?php foreach($vehicules as $vehicule) { ?>
  <article class="card_car">
    
    <?php if($vehicule['img'] == null) { ?>
      <img id="img_card" src="./admin/upload_img/backcars2.jpg" alt=""/>
    <?php }else{ ?>
    <img class="img_card" src="<?=htmlspecialchars($vehicule['img'])?>" alt="<?=htmlspecialchars($vehicule['img'])?>"/>
    <?php } ?>

    <div class="text_card">
    <h2><?=htmlspecialchars($vehicule['marque']).' '.htmlspecialchars($vehicule['modele'])?></h2>
    <p><?=htmlspecialchars($vehicule['km'])?></p>
    <p><?=htmlspecialchars($vehicule['annee'])?></p>
    <h2><?=htmlspecialchars($vehicule['prix'])?>€</h2>
    <div class="link_car"><a href="vehicules_details.php?id_car=<?=htmlspecialchars($vehicule['id_car'])?>">Détails</a></div>
    </div>
  </article>
  <?php }  ?>

  </section>
</main>

<?php require_once __DIR__.'/../footer.php';?>