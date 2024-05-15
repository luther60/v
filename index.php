<?php 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/avis.php';
require_once __DIR__.'/template/header.php'; 
try{
  $avisTrue = getPostLimit($pdo);
  $avisFilter = json_encode($avisTrue);
  $trueAvis = file_put_contents('./json/avis.json',$avisFilter);
}catch(Exception $e){
  echo"Capture de l'exception !".$e->getMessage();
}

 ?>

<body>

  <main>
    <div id="img_home"><img id="img_main" src="../assets/default.jpg" alt="car home"/></div>
    
   <h1 class="title_index">Bienvenue chez Monsieur Parrot, votre garagiste de confiance !</h1>
    <!--Bloc 1 -->
    <section class='content_article'>
    <img class="img_right" src="./assets/cars1.jpg" alt="cars1">
      <article class="text_right">
      <p>Depuis 15 ans, M. Parrot met son expertise et sa passion de l'automobile au service des automobilistes.</p> 
    
      <h2>Un Garagiste Expérimenté et Passionné</h2>
      <p>M. Parrot est un véritable passionné d'automobile. Il a commencé sa carrière comme mécanicien avant de se lancer dans 
      l'entrepreneuriat en ouvrant son propre garage. Son expérience et son savoir-faire lui permettent d'intervenir sur tous 
      types de véhicules, toutes marques confondues.</p>
      <h2>Un Service Client de Qualité</h2>
      <p>M. Parrot et son équipe accordent une grande importance à la satisfaction de leurs clients. Ils sont à l'écoute de vos
      besoins et vous conseillent sur les interventions nécessaires à l'entretien et à la réparation de votre véhicule.</p>
      <h2>Un Garage Moderne et Équipé</h2>
      <p>Le garage de M. Parrot est équipé de matériels modernes et performants permettant de réaliser des diagnostics précis 
        et des réparations de qualité.</p>
      <input id="btn1" type='button' value="Détails">
      </article>
    </section>
    <!--Sous bloc -->  
    <section class="sous_bloc">
      <article class="sous_article_right">
        <h2>Un large choix de prestations</h2>
        <ul>
          <li>Entretien courant : vidange, révision, changement de pneus, etc.</li>
          <li>Réparation mécanique et électronique : diagnostic, recherche de pannes, réparation de moteurs, etc.</li>
          <li>Carrosserie : réparation de tôlerie, peinture, etc.</li>
          <li>Vente de véhicules neufs et d'occasion</li>
        </ul>
        <strong>Des Tarifs Compétitifs</strong>
        <p>Le garage de M. Parrot propose des tarifs compétitifs et transparents.
        Un Engagement pour la Satisfaction Client
        M. Parrot et son équipe s'engagent à vous offrir un service de qualité et une satisfaction client optimale.
        Faites confiance à M. Parrot, votre garagiste de confiance.</p>
      </article>
    </section>
    <!--Bloc 2 -->
    <section class='content_article'>
      <article class="text_left"> 
    
      <h2>Un entretien automobile de qualité pour votre tranquillité d'esprit</h2>
      <p>Chez Monsieur Parrot, nous comprenons que votre voiture est essentielle à votre vie quotidienne. C'est pourquoi nous 
      offrons un service d'entretien complet et de qualité pour vous garantir une conduite sûre et sereine.</p>

      
      <p>Choisir Monsieur Parrot pour l'entretien de votre voiture, c'est s'assurer une équipe de professionnels expérimentés
         et passionnés, un service client irréprochable, des prix compétitifs, des pièces détachées d'origine constructeur, 
         un garage moderne et équipé des dernières technologies, un véhicule de courtoisie à votre disposition.</p>
      <strong>N'hésitez pas à nous contacter pour toute question ou demande de devis.</strong> 
      <div class="link_contact"><a   href="contact.php">Contact</a></div>
      <input id="btn2" type='button' value="Détails">
      </article>
      <img class="img_left" src="./assets/cars2.jpg" alt="cars2">
    </section>
    <!--Sous bloc2 -->  
    <section class="sous_bloc2">
      <article class="sous_article_left">
        <h2>Nos services d'entretien :</h2>
      <ul>
        <li>Vidange et remplacement des filtres</li>
        <li>Contrôle des niveaux (huile, liquide de frein, liquide de refroidissement...)</li>
        <li>Diagnostic électronique</li>
        <li>Remplacement des pneus</li>
        <li>Freinage (disques, plaquettes...)</li>
        <li>Amortisseurs</li>
        <li>Batterie</li>
        <li>Climatisation</li>
        <li>Et bien plus encore !</li>
      </ul>
      </article>
    </section>
    <!--Bloc 3 -->
    <section class='content_article'>
    <img class="img_right" src="./assets/cars1.jpg" alt="cars1">
      <article class="text_right"> 
    
      <h2>Vous avez besoin d'un garagiste fiable et expérimenté pour réparer votre véhicule ?</h2>
      <p>Monsieur Parrot est à votre service depuis plus de 15 ans pour tous vos besoins en matière de réparation automobile.
         Notre équipe de professionnels est qualifiée pour intervenir sur toutes les marques et tous les modèles de véhicules
         , et nous vous garantissons un travail de qualité à des prix compétitifs.</p>
      <input id="btn3" type='button' value="Détails">
      </article>
    </section>
    <!--Sous bloc3 -->  
    <section class="sous_bloc3">
      <article class="sous_article_right">
        <h2>Nos services de réparation:</h2>
        <ul>
          <li>Entretien courant : vidange, changement de pneus, freinage, climatisation, etc.</li>
          <li>Réparations mécaniques: moteur, boîte de vitesses, transmission, etc.</li>
          <li>Réparations électroniques: diagnostic, programmation, etc.</li>
          <li>Carrosserie: peinture, tôlerie, pare-brise, etc.</li>
          <li>Un savoir-faire reconnu: notre équipe est composée de techniciens expérimentés et régulièrement formés aux 
            dernières technologies.</li>
          <li>Des prix compétitifs: nous vous proposons des devis clairs et précis, sans surprise.</li>
          <li>Un accueil chaleureux: nous sommes à votre écoute pour vous conseiller et vous accompagner dans vos démarches.</li>  
        </ul>
      </article>
    </section>
    <!--Bloc 4 -->
    <section class='content_article'>
      <article class="text_left">
    
      <h2>Vous avez besoin d'un carrossier pour une réparation suite à un accident ou un accrochage ?</h2>
      <p>Notre équipe de professionnels expérimentés est spécialisée dans la réparation et la rénovation de carrosserie 
      automobile. Nous intervenons sur tous types de véhicules, toutes marques et tous modèles.</p>
      <input id="btn4" type='button' value="Détails">
      </article>
      <img class="img_left" src="./assets/cars2.jpg" alt="cars2">
    </section>
    <!--Sous bloc4 -->  
    <section class="sous_bloc4">
      <article class="sous_article_left">
        <h2>Nos services :</h2>
        <stong>Réparation de carrosserie :</stong>
        <ul>
          <li>Tôlerie</li>
          <li>Peinture</li>
          <li>Remplacement de pare-brise</li>
          <li>Débosselage</li>
          <li>Lustrage</li>
          <li>Rénovation de phares</li>
          <li>Préparation au contrôle technique</li>
          <li>Nettoyage intérieur et extérieur</li>
        </ul>
        <p>Un savoir-faire reconnu : Plus de 20 ans d'expérience dans le domaine de la carrosserie, un travail de qualité :
           nous utilisons des produits et des équipements de pointe pour garantir un résultat impeccable, un service client
          irréprochable : nous sommes à votre écoute pour vous conseiller et vous accompagner tout au long de la réparation
          des devis gratuits et personnalisés, un large choix de services complémentaires : prêt de véhicule, assistance 
          administrative, etc.</p>
      </article>
    </section>
    <!--Bloc 5 -->
    <section class='content_article'>
    <img class="img_right" src="./assets/cars1.jpg" alt="cars1">
      <article class="text_right"> 
    
      <h2>Pourquoi acheter votre voiture d'occasion chez Mr Parrot ?</h2>
       <p>Mr Parrot, votre garagiste de confiance, vous propose une large sélection de voitures d'occasion
       pour tous les budgets et tous les besoins.</p>
       <strong>Des voitures d'occasion fiables et garanties</strong>
       <p>Chez Mr Parrot, nous ne sélectionnons que des voitures d'occasion de qualité. Chaque véhicule est rigoureusement 
       contrôlé par nos mécaniciens avant d'être mis en vente. Nous vous proposons également une garantie sur tous nos 
       véhicules d'occasion.</p>
       
      <input id="btn5" type='button' value="Détails">
      </article>
    </section>
    <!--Sous bloc5 -->  
    <section class="sous_bloc5">
      <article class="sous_article_right">
        <strong>Un large choix de véhicules</strong>
       <p>Que vous soyez à la recherche d'une citadine, d'une berline, d'un SUV ou d'un monospace, vous trouverez forcément le 
       véhicule qui vous convient chez Mr Parrot. Nous proposons des véhicules de toutes les marques et de tous les modèles.</p>
       <strong>Des prix attractifs</strong>
       <p>Chez Mr Parrot, nous nous engageons à vous proposer des prix attractifs sur toutes nos voitures d'occasion. Nous 
       offrons également des facilités de paiement pour vous permettre de financer votre achat.</p>
       <strong>Un service client de qualité</strong>
       <p>Chez Mr Parrot, nous mettons tout en œuvre pour vous satisfaire. Notre équipe est à votre disposition pour vous 
       conseiller et vous accompagner dans votre recherche de véhicule.</p>
       <strong>N'attendez plus, venez découvrir notre sélection de voitures d'occasion chez Mr Parrot !</strong>
      <h2>Un Service Client de Qualité</h2>
      <p>M. Parrot et son équipe accordent une grande importance à la satisfaction de leurs clients. Ils sont à l'écoute de vos
      besoins et vous conseillent sur les interventions nécessaires à l'entretien et à la réparation de votre véhicule.</p>
      </article>
    </section>
    <!--Affichage js des avis -->
    <div class="validateAvis"></div>
  </main>
</body>
<script src='./javascript/style.js'></script>
<script src='./javascript/avis.js' ></script>

<?php require_once __DIR__.'/template/footer.php'; ?>
</html>