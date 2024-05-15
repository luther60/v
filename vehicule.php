<?php 
require_once __DIR__.'/template/header.php'; 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/vehicules.php';
require_once __DIR__.'/config/error.php';

if(isset($_GET['id_car'])){
  try{
  $vehicule = getVehiculeById($pdo,$_GET['id_car']);
  $options = getVehiculesOptions($pdo,$_GET['id_car']);
  $images = getVehiculesImg($pdo,$_GET['id_car']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}

 ?>

<main>
  <section class="bloc_card_detail">
  <article class="card_car_detail">
    <div class="text_card">
      
      <h2 class="info_car"><img class="icon_car" src="/../../assets/brand.png" alt="icone marque"/><?=htmlspecialchars($vehicule['marque'])?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/modele.png" alt="icone modele"/><?=htmlspecialchars($vehicule['modele'])?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/kilometer.png" alt="icone kilomètre"/><?=htmlspecialchars($vehicule['km'])?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/annee.png" alt="icone annee"/><?=htmlspecialchars($vehicule['annee'])?></h2>
      <h2 class="info_car"><img class="icon_car" src="/../../assets/money.png" alt="icone prix"/><?=htmlspecialchars($vehicule['prix'])?>€</h2> 
      <?php foreach($images as $image) { ?>
      <img class="img_card" src="admin<?=htmlspecialchars($image['path_img'])?>" alt="car image"/>
      <?php }  ?>
     
    </div>   
  </article>
  </section>

  <section id="text_option">
    <article class="details">
      <h2 class="title_cars_detail">Extérieur</h2>
      <li><?=nl2br(htmlspecialchars($options['exterieur']))?></li>     
    </article>
  
    <article class="details">
      <h2 class="title_cars_detail">Intérieur</h2>
      <li><?=nl2br(htmlspecialchars($options['interieur']))?></li>    
    </article>

    <article class="details">
      <h2 class="title_cars_detail">Confort</h2>
      <li><?=nl2br(htmlspecialchars($options['confort']))?></li>      
    </article>
  
    <article class="details">
      <h2 class="title_cars_detail">Sécurité</h2>
      <li><?=nl2br(htmlspecialchars($options['securite']))?></li>      
    </article>
  </section>

  <div class="call_car"><a href="contact.php?id_car=<?=htmlspecialchars($vehicule['id_car'])?>">Nous contactez</a></div>
  <div class="call_car"><a  href="pdf.php?id_car=<?=$vehicule['id_car']?>" target="_blank">Télécharger la fiche en PDF</a></div>
  
</main>
<?php require_once __DIR__.'/template/footer.php'; ?>  