<?php session_start();
require_once '../admin/header_admin.php';
require_once '../lib/pdo.php';
require_once '../config/users.php';
require_once '../config/error.php';
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }elseif(($_SESSION['user']['role']) != 'admin') {
  getMessage();
 }

?>
<?php
//Si présence d'un id dans le GET, on le récupère via la variable user avec en paramètre le GET(id courant) en lieu et place de $id
 if(isset($_GET['id_user'])) { 
  $user = userById($pdo, $_GET['id_user']);?>
  <section id="full">
   <h1 class="title_index">Vous êtes sur le point de supprimer cette utilisateur, souhaitez-vous continuer ?</h1>
   <h1 class="title_index">L'action est irréversible, en cliquant sur "supprimer définitivement" ,vous allez être redirigé.</h1>
    <ul class="title_index">
      <li><?=$user['name']?></li>
      <li><?=$user['firstname']?></li>
      <li><?=$user['mail']?></li>
      <li><?=$user['role']?></li>
    </ul>
    <div class="content_user btn_modify"><a  href="finalDelete.php?id_user=<?=$_GET['id_user'];?>">Supprimer définitivement</a></div>
  </section>
<?php } ?>


<?php require_once '../admin/footer.php';?>