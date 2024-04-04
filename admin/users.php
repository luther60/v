<?php session_start();
require_once '../admin/header_admin.php';
require_once '../lib/pdo.php';
require_once '../config/users.php';
require_once '../config/error.php';
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

<main id="main_user">
<section >
  <?php foreach($users as $user) { ?>
    
  <article class="card_user">
    <p class="content_user"><?= $user['name'] ?></p>
    <p class="content_user"><?= $user['firstname'] ?></p>
    <p class="content_user"><?= $user['mail'] ?></p>
    <p class="content_user"><?= $user['role'] ?></p>
    <div class="content_user btn_modify"><a class="link_modify" href="update_user.php?id_user=<?= $user['id_user']?>">Modifier</a></div>
    <div class="content_user btn_modify"><a class="link_modify" href="delete_user.php?id_user=<?=$user['id_user']?>">Supprimer</a></div>
  </article>
  
  <?php } ?>  
</section>
</main>

<?php require_once '../admin/footer.php';?>