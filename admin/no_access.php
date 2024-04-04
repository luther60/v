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

  <div id="alert"><img id="img_alert"  src="../assets/bloquer.png" alt="logo entrée interdite"/></div>
  <h1 id="title_alert">Désolé, <?= $_SESSION['user']['firstname'] ?> tu n'as pas accès à cette fonctionnalité !!</h1>
  <div class="link_return"><a href="accueil_admin.php">Revenir à l'accueil</a></div>

<?php require_once '../admin/footer.php';?>