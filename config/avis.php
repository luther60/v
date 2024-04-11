<?php
//Création avis by user
function createAvis(PDO $pdo,string $firstname,string $avis,string $note,string $status) {

  $query = $pdo->prepare("INSERT INTO `avis` (`firstname`,`avis`,`note`,`status`)"
  ."VALUES (:firstname,:avis,:note,:status)");

  $query->bindValue(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindValue(':avis',$avis,PDO::PARAM_STR);
  $query->bindValue(':note',$note,PDO::PARAM_STR);
  $query->bindValue(':status',$status,PDO::PARAM_STR);
  return $query->execute();
}

//Récuperation avis non validé
function getPostFalse(PDO $pdo) {

  $query = $pdo->prepare("SELECT * FROM `avis` WHERE `status` = 'notvalid'");
  $query->execute();
  $avis = $query->fetchAll(PDO::FETCH_ASSOC);
  return $avis;
}

//Récuperation avis validé
function getPostTrue(PDO $pdo) {

  $query = $pdo->prepare("SELECT * FROM `avis` WHERE `status` = 'valid'");
  $query->execute();
  $avis = $query->fetchAll(PDO::FETCH_ASSOC);
  return $avis;
}

//Récuperation avis by id
function getPostById(PDO $pdo,int $id_avis) {

  $query = $pdo->prepare("SELECT * FROM `avis` WHERE `id_avis` = :id_avis");
  $query->bindValue(':id_avis',$id_avis,PDO::PARAM_INT);
  $query->execute();
  $avis = $query->fetch(PDO::FETCH_ASSOC);
  return $avis;
}

//Validation de l'avis
function validateAvis(PDO $pdo,int $id_avis,string $status) {

  $query = $pdo->prepare("UPDATE `avis` SET `status` = :status WHERE `id_avis` = :id_avis");
  $query->bindValue('id_avis',$id_avis,PDO::PARAM_INT);
  $query->bindValue(':status',$status,PDO::PARAM_STR);
  return $query->execute();
}

//Suppression avis
function deleteAvis(PDO $pdo,int $id_avis) {

  $query = $pdo->prepare("DELETE FROM `avis` WHERE `id_avis` = :id_avis");
  $query->bindValue('id_avis',$id_avis,PDO::PARAM_INT);
  $query->execute();
}