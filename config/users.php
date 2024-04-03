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