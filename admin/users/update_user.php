<?php session_start();
require_once 'header_user.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/users.php';
require_once __DIR__.'/../../config/error.php';

/*Vérification de l'user connecté, si pas de session, on redirige vers accueil 
(A la fermeture du client, la session est détruite)*/
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }elseif(($_SESSION['user']['role']) != 'admin') {
  getMessage();
 }
$user = userById($pdo,$_GET['id_user']);

?>

<?php
if(isset($_POST['update_user']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if(isset($_POST['id_user'])) {
    $id_sanitize =htmlentities($_POST['id_user'],);
    if(!preg_match("/^[0-9]*$/",$id_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour l\'id est incorrect !! </h1>';
    } else {
      $id_user = $id_sanitize;
    }
  }

  if(isset($_POST['name'])) {
    $name_sanitize = htmlentities($_POST['name']);
    if(!preg_match("/^[a-zA-Z -]+$/",$name_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom est incorrect !! </h1>';
    } else {
      $name = $name_sanitize;
    }
  }

  if(isset($_POST['firstname'])) {
    $firstname_sanitize = htmlentities($_POST['firstname']);
    if(!preg_match("/^[a-zA-Z -]+$/",$firstname_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le prénom est incorrect !! </h1>';
    } else {
      $firstname = $firstname_sanitize;
    }
  }

  if(isset($_POST['mail'])) {
    $mail_sanitize = filter_var($_POST['mail']);
    if(!filter_var($mail_sanitize,FILTER_VALIDATE_EMAIL)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le mail est incorrect !! </h1>';
    } else {
      $mail = $mail_sanitize;
    }
  }

  if(isset($_POST['role'])) {
    $role_sanitize = htmlentities($_POST['role']);
    if(!preg_match("/^[a-zA-Z -]+$/",$role_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le role est incorrect !! </h1>';
    } else {
      $role = $role_sanitize;
    }
  }
  
  //Si erreur sur l'une des variables
  if(empty($name) || empty($firstname) || empty($mail) || empty($id_user) || empty($role)) {
    echo '<h1 class=\'alert\'>La modification de l\'utilisateur à échoué !! </h1>';
  } else {
    //Si tout est OK
    $updateUser = updateUser($pdo,$id_user,$name,$firstname,$mail,$role);
    echo '<h1 class=\'alert\'>La modification de l\'utilisateur à été effectué !! </h1>';
  }
}

?>


<form method="POST" action="update_user.php?id_user=<?=$_GET['id_user']?>">

<input type="hidden" id="id_user" name="id_user" value="<?= htmlentities($user['id_user'] )?>" required/>

<label for="name">Nom <span aria-label="required">*</span></label>
<input type="text" id="name" name="name" value="<?= htmlentities($user['name'] )?>" required/>

<label for="firstname">Prénom <span aria-label="required">*</span></label>
<input type="text" id="firstname" name="firstname" value="<?= htmlentities($user['firstname']) ?>" required/>

<label for="mail">Téléphone <span aria-label="required">*</span></label>
<input type="text" id="mail" name="mail" value="<?= htmlentities($user['mail']) ?>" required/>

<label for="role">Email <span aria-label="required">*</span></label>
<input type="text" id="role" name="role" value="<?= htmlentities($user['role']) ?>" required/>

<input class="b_update" type="submit" name="update_user" value="Modifier"/>

</form>

<?php require_once __DIR__.'/../footer.php';?>