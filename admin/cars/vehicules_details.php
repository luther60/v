<?php session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
$vehicule = getVehiculeById($pdo,$_GET['id_car']);
$options = getVehiculesOptions($pdo,$_GET['id_car']);
$images = getVehiculesImg($pdo,$_GET['id_car']);
/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

?>

<main>
  <section class="bloc_card_detail">
  <article class="card_car_detail">
    <div class="text_card">
      
      <h2 class="info_car"><img class="icon_car" src="/../../assets/brand.png" alt="icone marque"/><?= $vehicule['marque']?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/modele.png" alt="icone modele"/><?= $vehicule['modele']?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/kilometer.png" alt="icone kilomètre"/><?= $vehicule['km']?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/annee.png" alt="icone annee"/><?= $vehicule['annee']?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/money.png" alt="icone prix"/><?= $vehicule['prix']?>€</h2> 
      <?php foreach($images as $image) { ?>
      <img id="img_card" src="<?=$image['path_img'] ?>" alt="car image"/>
      <?php }  ?>
     
    </div>   
  </article>
  </section>

  <section id="text_option">
    <article>
      <h2>Extérieur</h2>
      <li><?=nl2br($options['exterieur'])?></li>     
    </article>
  
    <article>
      <h2>Intérieur</h2>
      <li><?=nl2br($options['interieur'])?></li>    
    </article>

    <article>
      <h2>Confort</h2>
      <li><?=nl2br($options['confort'])?></li>      
    </article>
  
    <article>
      <h2>Sécurité</h2>
      <li><?=nl2br($options['securite'])?></li>      
    </article>
  </section>

  <div class="call_car"><a href="update_vehicule.php?id_car=<?=$vehicule['id_car']?>">Modifier</a></div>
  <div class="call_car"><a href="delete_vehicule.php?id_car=<?=$vehicule['id_car']?>">Supprimer</a></div>

</main>
<?php require_once __DIR__.'/../footer.php';?>