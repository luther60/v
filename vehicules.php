<?php 
require_once __DIR__.'./template/header.php'; 
 ?>

<main>
    <!--Tri par liste déroulante -->
<div class="liste_filter_car">

<label id="lab_filter" for="filter">Trier les véhicules par :</label>
  <select id="filter_cars">
    <option value="">Veuillez choisir</option>
    <option value="allCars">Toutes les voitures</option>
    <optgroup label="Tri par :"></optgroup>
    <option value="price">Tri par prix</option>
    <option value="km">Tri par kilomètres</option>
    <option value="year">Tri par années</option>
  </select>
  </div>
  <section class="bloc_card">

  <!--Affichage js (fetch)-->

  </section>
</main>
<script src="./javascript/vehicules.js" type="module"></script>
<?php require_once __DIR__.'/template/footer.php'; ?>