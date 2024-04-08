<?php

//Création de vehicule
function createVehicule(PDO $pdo,string $id_car,string $marque,string $modele,string $annee,string $km,string $energie,string $transmission,
string $cv,string $prix,string $interieur,string $exterieur,string $securite,string $confort,string $id_current,string $img) {
  
  $query = $pdo->prepare("INSERT INTO `vehicules` (`id_car`,`marque`,`modele`,`annee`,`km`,`energie`,`transmission`,`cv`,`prix`,`img`)"
  ."VALUES (:id_car,:marque,:modele,:annee,:km,:energie,:transmission,:cv,:prix,:img)");

  $query->bindValue(":id_car",$id_car,PDO::PARAM_STR);
  $query->bindValue(":marque",$marque,PDO::PARAM_STR);
  $query->bindValue(":modele",$modele,PDO::PARAM_STR);
  $query->bindValue(":annee",$annee,PDO::PARAM_STR);
  $query->bindValue(":km",$km,PDO::PARAM_STR);
  $query->bindValue(":energie",$energie,PDO::PARAM_STR);
  $query->bindValue(":transmission",$transmission,PDO::PARAM_STR);
  $query->bindValue(":cv",$cv,PDO::PARAM_STR);
  $query->bindValue(":prix",$prix,PDO::PARAM_STR);
  $query->bindValue(":img",$img,PDO::PARAM_STR);
  
  $query->execute();

  if($exterieur || $interieur || $securite || $confort || $id_current) {

    $query = $pdo->prepare("INSERT INTO `options` (`interieur`,`exterieur`,`securite`,`confort`,`id_current`)"
  ."VALUES (:interieur,:exterieur,:securite,:confort,:id_current)");

  $query->bindValue(":interieur",$interieur,PDO::PARAM_STR);
  $query->bindValue(":exterieur",$exterieur,PDO::PARAM_STR);
  $query->bindValue(":securite",$securite,PDO::PARAM_STR);
  $query->bindValue(":confort",$confort,PDO::PARAM_STR);
  $query->bindValue(":id_current",$id_current,PDO::PARAM_STR);
  $query->execute();
}
}

//Upload images vehicule
function uploadImg(PDO $pdo,string $name_img,string $path_img,string $id_current_img) {
  $query = $pdo->prepare("INSERT INTO `image` (`name`,`path_img`,`id_current_img`)"
  ."VALUES (:name,:path_img,:id_current_img)");
  
  $query->bindValue(":name",$name_img,PDO::PARAM_STR);
  $query->bindValue(":path_img",$path_img,PDO::PARAM_STR);
  $query->bindValue(":id_current_img",$id_current_img,PDO::PARAM_STR);
  $query->execute();
}

//Récupération des véhicules avec options
function getVehiculesOptions(PDO $pdo,string $id_current):array {
  $query = $pdo->prepare('SELECT * FROM `options` WHERE `id_current` = :id_current');
  $query->bindValue(':id_current',$id_current,PDO::PARAM_STR);
  $query->execute();
  $options = $query->fetch(PDO::FETCH_ASSOC);
  return $options;
}

//Récupération des véhicules avec images
function getVehiculesImg(PDO $pdo,string $id_current_img):array {
  $query = $pdo->prepare('SELECT * FROM `image` WHERE `id_current_img` = :id_current_img');
  $query->bindValue(':id_current_img',$id_current_img,PDO::PARAM_STR);
  $query->execute();
  $images = $query->fetchAll(PDO::FETCH_ASSOC);
  return $images;
 
}

//Récupération des véhicules
function getVehicules(PDO $pdo):array {
  $query = $pdo->prepare('SELECT * FROM `vehicules`');
  $query->execute();
  $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);
  return $vehicules;
}

//Récuperation vehicule by id
function getVehiculeById(PDO $pdo,string $id_car) {
  $query = $pdo->prepare('SELECT * FROM `vehicules` WHERE `id_car` = :id_car');
  $query->bindValue(':id_car',$id_car,PDO::PARAM_STR);
  $query->execute();
  $vehicule = $query->fetch(PDO::FETCH_ASSOC);
  return $vehicule;
}



