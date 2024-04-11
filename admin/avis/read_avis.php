<?php
ini_set('display_errors', 'on');
 session_start();
require_once 'header_avis.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/avis.php';
require_once __DIR__.'/../../config/error.php';
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
$allAvis = getPostFalse($pdo);

?>

<main>
  <section id="parent_avis">
    <?php foreach($allAvis as $avis) { ?>
    <article class="card_avis">
    <h2 class="h_avis"><?= $avis['firstname'] ?></h2>
    <h2 class="h_avis"><?= $avis['note'] ?></h2>
    <p class="text_avis"><?= $avis['avis'] ?></p>
    <div class="content_user btn_modify"><a class="link_modify" href="update_avis.php?id_avis=<?= $avis['id_avis']?>">Valider</a></div>
    <div class="content_user btn_modify"><a class="link_modify" href="delete_avis.php?id_avis=<?=$avis['id_avis']?>">Supprimer</a></div>
    </article>
    <?php } ?>
  </section>
</main>
 <?php require_once __DIR__.'/../footer.php';?>