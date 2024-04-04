<?php

//Récupération de tous les users
function getUsers(PDO $pdo):array {
  $query = $pdo->prepare('SELECT * FROM `users_parrot`');
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
}

//Vérification de l'user au submit
function verifyUser(PDO $pdo,string $email,string $password):array {
$query = $pdo->prepare('SELECT * FROM `users_parrot` WHERE mail = :email');
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password, $user['password'])) {
  return $user;
}else {
  return redirect();
}
}

//Récupération user by id
function userById(PDO $pdo,$id_user) {
  $query = $pdo->prepare('SELECT * FROM `users_parrot` WHERE `id_user` = :id_user');
$query->bindValue(':id_user',$id_user,PDO::PARAM_INT);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
return $user;

}

//Modification d'un utilisateur
function updateUser(PDO $pdo,int $id_user,string $name,string $firstname,string $mail,string $role):bool{
  $query = $pdo->prepare("UPDATE `users_parrot` SET `name` = :name,`firstname` = :firstname,`mail` = :mail,`role` = :role WHERE `id_user` = :id_user");
  $query->bindValue(":id_user", $id_user, PDO::PARAM_INT);
  $query->bindValue(":name", $name, PDO::PARAM_STR);
  $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
  $query->bindValue(":mail", $mail, PDO::PARAM_STR);
  $query->bindValue(":role", $role, PDO::PARAM_STR);
  return $query->execute();
}

//Création d'un nouvel utilisateur
function createUser(PDO $pdo,string $name,string $firstname,string $mail,string $password,string $role):bool {
  
  $query = $pdo->prepare("INSERT INTO `users_parrot` (`name`,`firstname`,`mail`,`password`,`role`)"
 ."VALUES (:name,:firstname,:mail,:password,:role)"); 

  $query->bindValue(":name", $name, PDO::PARAM_STR);
  $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
  $query->bindValue(":mail", $mail, PDO::PARAM_STR);
  $query->bindValue(":password", $password, PDO::PARAM_STR);
  $query->bindValue(":role", $role, PDO::PARAM_STR);
  return $query->execute();

}

//Suppression d'un utilisateur
function deleteUser(PDO $pdo, int $id_user):bool {
  $query = $pdo->prepare("DELETE FROM `users_parrot` WHERE `id_user` = :id_user");
  $query->bindValue(":id_user", $id_user, PDO::PARAM_INT);
  $query->execute();
  $userDelete = $query->fetch(PDO::FETCH_ASSOC);
  return $userDelete;
}