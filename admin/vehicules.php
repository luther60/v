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

<h1 class="title_index">Bienvenue dans votre espace de gestion des vehicules <?= $_SESSION['user']['firstname'] ?></h1>

<div class="content_user btn_modify"><a class="link_modify" href="create_vehicule.php">Créer un nouveau vehicule</a></div>


<?php require_once '../admin/footer.php';?>