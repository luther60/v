<?php

 session_start();
require_once 'header_avis.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/avis.php';
require_once __DIR__.'/../../config/error.php';
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
$allAvis = getPostTrue($pdo);

?>

<main class="min_height">
  <h1 class="title_index">Liste des avis validés en page d'accueil</h1>
  <section id="parent_avis">
    <?php foreach($allAvis as $avis) { ?>
    <article class="card_avis">
    <h2 class="h_avis"><?= htmlspecialchars($avis['firstname']) ?></h2>
    <h2 class="h_avis"><?= htmlspecialchars($avis['note']) ?></h2>
    <p class="text_avis"><?= htmlspecialchars($avis['avis']) ?></p>
    <p class="text_avis"><?= htmlspecialchars($avis['date_post']) ?></p>
    <div class="content_user btn_modify"><a class="link_modify" href="update_avis.php?id_avis=<?= htmlspecialchars($avis['id_avis'])?>">Valider</a></div>
    <div class="content_user btn_modify"><a class="link_modify" href="delete_avis.php?id_avis=<?=htmlspecialchars($avis['id_avis'])?>">Supprimer</a></div>
    </article>
    <?php } ?>
  </section>
</main>
 <?php require_once __DIR__.'/../footer.php';?>