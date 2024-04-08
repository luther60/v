<?php session_start();
require_once 'header_user.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/users.php';
require_once __DIR__.'/../../config/error.php';
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }elseif(($_SESSION['user']['role']) != 'admin') {
  getMessage();
 }

?>
<?php

if(isset($_GET['id_user'])) {

   $userDelete = deleteUser($pdo, $_GET['id_user']);
   echo'<h1 class="title_index">L\'utilisateur à été définitivement supprimé !!</h1>';
 }
 ?>

 <div class="content_user btn_modify"><a href="users.php">Retour à la liste des utilisateurs</a></div>

 <?php require_once __DIR__.'/../footer.php';?>