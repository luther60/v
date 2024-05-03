<?php
 session_start();
require_once 'header_avis.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/avis.php';
require_once __DIR__.'/../../config/error.php';

if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

 if(isset($_GET['id_avis'])){
  try{
  $avis = getPostById($pdo,$_GET['id_avis']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}
 
?>

<?php
if(isset($_POST['delete_avis']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if(isset($_POST['id_avis'])) {
    $id_avis = htmlentities($_POST['id_avis']);
  }

  $deleteAvis = deleteAvis($pdo,$id_avis);

  if(isset($id_avis)) {
    echo '<h1 class=\'true\'>L\'avis à bien été supprimé !! </h1>';
  }else{
    echo '<h1 class=\'alert\'>Echec de la suppression !! </h1>';
  }
}
?>
<main class="min_height">
  <section id="parent_avis">
    <article class="card_avis "prt_avis_del>
    <h2 class="h_avis"><?= htmlspecialchars($avis['firstname']) ?></h2>
    <h2 class="h_avis"><?= htmlspecialchars($avis['note']) ?></h2>
    <p class="text_avis"><?= htmlspecialchars($avis['avis']) ?></p>
    <form method="POST" action="delete_avis.php?id_avis=<?=htmlspecialchars($avis['id_avis'])?>">
      <input type="hidden" name="id_avis" value="<?=htmlspecialchars($avis['id_avis'])?>"/>
      <input class="button b_update" type="submit" name="delete_avis" value="Supprimer"/>
    </form>
    </article>  
  </section>
</main>

<?php require_once __DIR__.'/../footer.php';?>