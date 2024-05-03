<?php session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
if(isset($_GET['id_car'])){
  try{
  $vehicule = getVehiculeById($pdo,$_GET['id_car']);
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
$count = count($images);//On compte le nb images actuelles
$path_img_default = $vehicule['img'];//On récupere le path img du véhicule
$id_options = $options['id_options'];//On récupere l'id options du véhicule

 if(isset($_GET['id_car'])) {

  while($count > -1) {//Tant qu'il y a des images(-1 afin de prendre en compte l'index 0)
    $count--;//Décremente
    
    foreach($images as $image) {//Parcours le tableau
      
      if($image['path_img']) {//Si présence
        if(file_exists($image['path_img'])) {//Si existe
      unlink($image['path_img']);//Supression
    }
      $id_img = $image['id_img'];
      
      if($id_img) {//Si présence
        
        $carDelete = deleteImagesCar($pdo,$id_img);//Supression
      }    
     }
    } 
   } 
  
    $optionsDelete = deleteOptions($pdo,$id_options);//Supression

    if(file_exists($path_img_default)) {//Si existe
        unlink($path_img_default);//Supression
    $carDelete = deleteCar($pdo, $_GET['id_car']);//Supression
    }     
 }
?>

<h1 class="hello_admin">Le véhicule à été définitivement supprimé !!</h1>

<div class="delete"><a href="user_management.php">Retour à la liste des utilisateurs</a></div>


<?php require_once __DIR__.'/../footer.php';?>