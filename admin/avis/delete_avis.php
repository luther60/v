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
 $avis = getPostById($pdo,$_GET['id_avis']);
?>

<?php
if(isset($_POST['delete_avis']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if(isset($_POST['id_avis'])) {
    $id_avis = htmlentities($_POST['id_avis']);
  }

  $deleteAvis = deleteAvis($pdo,$id_avis);

  if($deleteAvis) {
    echo '<h1 class=\'true\'>L\'avis à bien été supprimé !! </h1>';
  }else{
    echo '<h1 class=\'alert\'>Echec de la suppression !! </h1>';
  }
}
?>
<main class="min_height">
  <section id="parent_avis">
    <article class="card_avis "prt_avis_del>
    <h2 class="h_avis"><?= $avis['firstname'] ?></h2>
    <h2 class="h_avis"><?= $avis['note'] ?></h2>
    <p class="text_avis"><?= $avis['avis'] ?></p>
    <form method="POST" action="delete_avis.php?id_avis=<?=$avis['id_avis']?>">
      <input type="hidden" name="id_avis" value="<?=$avis['id_avis']?>"/>
      <input class="button b_update" type="submit" name="delete_avis" value="Supprimer"/>
    </form>
    </article>

    
  </section>
</main>

<?php require_once __DIR__.'/../footer.php';?>