<?php session_start();
require_once '../admin/header_admin.php';
require_once '../lib/pdo.php';
require_once '../config/users.php';
require_once '../config/error.php';
$user = getUsers($pdo);
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
?>


  <h1 class="title_index">Bienvenue dans votre espace <?= $_SESSION['user']['firstname'] ?></h1>




<?php require_once '../admin/footer.php';?>