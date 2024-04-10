<?php 
require_once __DIR__.'/template/header.php'; 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/vehicules.php';
require_once __DIR__.'/config/error.php';
$vehicule = getVehiculeById($pdo,$_GET['id_car']);
$options = getVehiculesOptions($pdo,$_GET['id_car']);
$images = getVehiculesImg($pdo,$_GET['id_car']);
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
      <img class="img_card" src="admin<?=$image['path_img'] ?>" alt="car image"/>
      <?php }  ?>
     
    </div>   
  </article>
  </section>

  <section id="text_option">
    <article class="details">
      <h2>Extérieur</h2>
      <li><?=nl2br($options['exterieur'])?></li>     
    </article>
  
    <article class="details">
      <h2>Intérieur</h2>
      <li><?=nl2br($options['interieur'])?></li>    
    </article>

    <article class="details">
      <h2>Confort</h2>
      <li><?=nl2br($options['confort'])?></li>      
    </article>
  
    <article class="details">
      <h2>Sécurité</h2>
      <li><?=nl2br($options['securite'])?></li>      
    </article>
  </section>

  <div class="call_car"><a href="contact.php?id_car=<?=$vehicule['id_car']?>">Nous contactez</a></div>
  
</main>
<?php require_once __DIR__.'/template/footer.php'; ?>  