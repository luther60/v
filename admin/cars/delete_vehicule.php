<?php session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
if(isset($_GET['id_car'])){
  try{
  $options = getVehiculesOptions($pdo,$_GET['id_car']);
  $images = getVehiculesImg($pdo,$_GET['id_car']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}

/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

//Si présence d'un id dans le GET, on le récupère via la variable  avec en paramètre le GET(id courant) en lieu et place de $id
if(isset($_GET['id_car'])) { 
  $vehicule = getVehiculeById($pdo, $_GET['id_car']);?>
  
   <h1 class="title_index">Vous êtes sur le point de supprimer ce véhicule, souhaitez-vous continuer ?</h1>
   <h1 class="title_index">L'action est irréversible, en cliquant sur "supprimer définitivement" , vous allez être redirigé.</h1>
    <ul class="recap">
      <li class="title_index"><?=htmlspecialchars($vehicule['marque'])?></li>
      <li class="title_index"><?=htmlspecialchars($vehicule['modele'])?></li>
      <li class="title_index"><?=htmlspecialchars($vehicule['annee'])?></li>
      <li class="title_index"><?=htmlspecialchars($vehicule['prix'])?></li>
    </ul>
    <div class="call_car"><a  href="finalDelete.php?id_car=<?=htmlspecialchars($_GET['id_car']);?>">Supprimer définitivement</a></div>
<?php } ?>


<?php require_once __DIR__.'/../footer.php';?>