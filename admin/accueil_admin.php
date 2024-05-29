<?php 
require_once '../config/error.php';
require_once 'header_admin.php';
require_once '../lib/pdo.php';
require_once '../config/users.php';
require_once '../config/avis.php';
require_once '../config/vehicules.php';
//require_once '../lib/ini.php';

 try{  
$user = getUsers($pdo);
$countCars = countCars($pdo);
$allPrice = allPrice($pdo);
$allAvis = getPostFalse($pdo);
}catch(Exception $e){
  echo"Capture de l'exception !".$e->getMessage();
}
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if($_SESSION['user']['role'] === null) { 
  redirect();
 }

?>
<main class="min_height">

<h1 class="title_index">Bienvenue dans votre espace <?=htmlspecialchars($_SESSION['user']['firstname'])?></h1>

<h1 class="title_index">Liste des avis à valider ou supprimer:</h1>
  <section id="parent_avis">
    <?php
    if(empty($allAvis)){
      echo'<h1>Aucun nouvel avis</h1>';
    } ?>
    <?php foreach($allAvis as $avis) { ?>
    <article class="card_avis">
    <h2 class="h_avis"><?= htmlspecialchars($avis['firstname']) ?></h2>
    <h2 class="h_avis"><?= htmlspecialchars($avis['note']) ?></h2>
    <p class="text_avis"><?= $avis['avis'] ?></p>
    <p class="text_avis"><?= htmlspecialchars($avis['date_post']) ?></p>
    <div class="content_user btn_modify"><a class="link_modify" href="./avis/update_avis.php?id_avis=<?= htmlspecialchars($avis['id_avis'])?>">Valider</a></div>
    <div class="content_user btn_modify"><a class="link_modify" href="./avis/delete_avis.php?id_avis=<?=htmlspecialchars($avis['id_avis'])?>">Supprimer</a></div>
    </article>
    <?php } ?>
  </section>

  <h1 class="title_index">Nombre actuel de véhicules en vente :</h1>
  <h2 class="title_index"><?= $countCars['count(*)'] ?></h2>
  <h1 class="title_index">Prix moyen de nos véhicules en vente :</h1>
  <h2 class="title_index"><?= round($allPrice['AVG(prix)']) ?>€</h2>
</main>
<?php require_once '../admin/footer.php';?>