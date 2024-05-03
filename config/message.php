<?php

//Création d'un message
function createMessage(PDO $pdo,string $name,string $firstname,string $mail,string $message) {

  $query = $pdo->prepare("INSERT INTO `messages` (`name`,`firstname`,`mail`,`message`)"
  ."VALUES (:name,:firstname,:mail,:message)");

  $query->bindValue(':name',$name,PDO::PARAM_STR);
  $query->bindValue(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindValue(':mail',$mail,PDO::PARAM_STR);
  $query->bindValue(':message',$message,PDO::PARAM_STR);
  $query->execute();
}

//Récuperation des messages
function getMess(PDO $pdo) {

  $query = $pdo->prepare("SELECT * FROM `messages`");
  $query->execute();
  $messages = $query->fetchAll(PDO::FETCH_ASSOC);
  return $messages;
}

//Suppression des messages
function deleteMessage(PDO $pdo,int $id_message) {

  $query = $pdo->prepare("DELETE FROM `messages` WHERE `id_message` = :id_message");
  $query->bindValue(':id_message',$id_message,PDO::PARAM_INT);
  $query->execute();
}

//Récuperation des messages par id
function getMessId(PDO $pdo,int $id_message) {

  $query = $pdo->prepare("SELECT * FROM `messages` WHERE `id_message` = :id_message");
  $query->bindValue(':id_message',$id_message,PDO::PARAM_INT);
  $query->execute();
  $message = $query->fetch(PDO::FETCH_ASSOC);
  return $message;
}