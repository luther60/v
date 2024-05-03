<?php session_start();
require_once 'header_user.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/users.php';
require_once __DIR__.'/../../config/error.php';
$users = getUsers($pdo);
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }elseif(($_SESSION['user']['role']) != 'admin') {
  getMessage();
 }

?>

<h1 class="title_index">Bienvenue dans votre espace de gestion des utilisateurs <?= $_SESSION['user']['firstname'] ?></h1>

<div class="content_user btn_modify"><a class="link_modify" href="create_user.php">Créer un nouvel utilisateur</a></div>

<main>
  <section id="parent_avis">
    <?php foreach($users as $user) { ?>
    <article class="card_avis">
    <h2 class="h_avis"><?=htmlspecialchars($user['name'])?></h2>
    <h2 class="h_avis"><?=htmlspecialchars($user['firstname'])?></h2>
    <h2 class="h_avis"><?=htmlspecialchars($user['mail'])?></h2>
    <p class="text_avis"><?=htmlspecialchars($user['role'])?></p>
    <div class="content_user btn_modify"><a class="link_modify" href="update_user.php?id_user=<?= htmlspecialchars($user['id_user'])?>">Modifier</a></div>
    <div class="content_user btn_modify"><a class="link_modify" href="delete_user.php?id_user=<?=htmlspecialchars($user['id_user'])?>">Supprimer</a></div>
    </article>
    <?php } ?>
  </section>
</main>

<?php require_once __DIR__. '/../footer.php';?>