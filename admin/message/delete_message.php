<?php session_start();
require_once 'header_message.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__. '/../../config/error.php';
require_once __DIR__. '/../../config/message.php';
try{
$messages = getMess($pdo);
}catch(Exception $e){
  echo"Capture de l'exception !".$e->getMessage();
};
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

 if(isset($_GET['id_message'])){
  try{
  $message = getMessId($pdo,$_GET['id_message']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}
 
 
?>

<?php
if(isset($_POST['delete_message']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if(isset($_POST['id_message'])) {
    $id_message = htmlentities($_POST['id_message']);
  }

  $deleteMessage = deleteMessage($pdo,$id_message);

  if(isset($id_message)) {
    echo '<h1 class=\'true\'>Le message à bien été supprimé !! </h1>';
  }else{
    echo '<h1 class=\'alert\'>Echec de la suppression !! </h1>';
  }
}
?>

<main class="min_height">
  <section id="parent_avis">
    <article class="card_avis">
    <h2 class="h_avis"><?=htmlspecialchars($message['name'])?></h2>
    <h2 class="h_avis"><?=htmlspecialchars($message['firstname'])?></h2>
    <h2 class="h_avis"><?=htmlspecialchars($message['mail'])?></h2>
    <p class="text_avis"><?=htmlspecialchars($message['message'])?></p>
    <form method="POST" action="delete_message.php?id_message=<?=htmlspecialchars($message['id_message'])?>">
      <input type="hidden" name="id_message" value="<?=htmlspecialchars($message['id_message'])?>"/>
      <input class="button b_update" type="submit" name="delete_message" value="Supprimer"/>
    </form>
    </article>  
  </section>
</main>

<?php require_once __DIR__.'/../../admin/footer.php';?>