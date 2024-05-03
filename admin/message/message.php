<?php session_start();
require_once 'header_message.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__. '/../../config/error.php';
require_once __DIR__. '/../../config/message.php';
$messages = getMess($pdo);
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
?>

<main class="min_height">
  <section id="parent_avis">
    <?php foreach($messages as $message) { ?>
    <article class="card_avis">
    <h2 class="h_avis"><?= htmlspecialchars($message['name']) ?></h2>
    <h2 class="h_avis"><?= htmlspecialchars($message['firstname']) ?></h2>
    <p class="text_avis"><?= htmlspecialchars($message['mail']) ?></p>
    <p class="text_avis"><?= htmlspecialchars($message['message']) ?></p>
   
    <div class="content_user btn_modify"><a class="link_modify" href="delete_message.php?id_message=<?=htmlspecialchars($message['id_message'])?>">Supprimer</a></div>
    </article>
    <?php } ?>
  </section>
</main>

<?php require_once __DIR__.'/../../admin/footer.php';?>