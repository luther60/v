<?php 
 require_once '../admin/header_admin.php';
 require_once '../lib/pdo.php';
 require_once '../config/users.php';
 require_once '../config/error.php';
?>
<?php
//Si données présente et méthode "POST"
if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  //Si une des 2 données et vide ou toutes
  if(empty($_POST['mail']) || empty($_POST['password'])) {
    //Redirection vers login
    redirect();
  }else {
    //Traitement de l'email et password
    $email = filter_var($_POST['mail']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<h1 class=\'alert\'>Adresse mail ou mot de passe invalide !! </h1>';
    }
    $password = htmlentities($_POST['password']);
    //Vérification de l'existence de l'utilisateur et de son password
    $user = verifyUser($pdo,$email,$password);
    //Si inconnu ds la table => redirection
    if(empty($user)) {
      redirect();
    }
  }
  var_dump($user);
  //Si user existe bien
  if($user) {
    if($user['role'] === 'admin') {
      session_start();
      session_regenerate_id(true);
      $_SESSION['user'] = $user;
      setcookie("useradmin", 'admin', time()+3600, '/');
      header("location: accueil_admin.php");
    }
    if($user['role'] === 'beta') {
      session_start();
      session_regenerate_id(true);
      $_SESSION['user'] = $user;
      setcookie("user", 'user', time() + 3600, '/');
      header("location: accueil_admin.php");
  }

  if($user === '') {
    redirect();
  }  
  }   
  }
?>
<?php require_once '../admin/footer.php';?>