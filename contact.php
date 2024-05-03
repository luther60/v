<?php 
require_once __DIR__.'/template/header.php'; 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/vehicules.php';
require_once __DIR__.'/config/message.php';
require_once __DIR__.'/lib/ini.php';

//Une fonction de gestion d'erreurs globales est chargée en amont
if(isset($_GET['id_car'])){
  try{
  $vehicule = getVehiculeById($pdo,$_GET['id_car']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}

 ?>

<?php

if(isset($_POST['post_message']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_POST['name'])) {
    $name_sanitize = htmlspecialchars($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' éèç]*$/",$name_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le nom sont incorrect !! </h1>';
    }else {
      $name = $name_sanitize; 
}
}

if(isset($_POST['firstname'])) {
  $firstname_sanitize = htmlspecialchars($_POST['firstname']);
  if(!preg_match("/^[a-zA-Z-' éèç]*$/",$firstname_sanitize)) {
    echo '<h1 class=\'alert\'>Certains caractères utilisé pour le prénom sont incorrect !! </h1>';
  }else {
    $firstname = $firstname_sanitize; 
}
}

if(isset($_POST['mail'])) {
  $mail = filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL);
    if($mail === false) {
      echo '<h1 class=\'alert\'>Adresse mail invalide !! </h1>';
    }
}

if(isset($_POST['message'])) {
  $message_sanitize = htmlspecialchars($_POST['message']);
  if(!preg_match("/^[[:alnum:][:punct:][:space:]èéç]+$/",$message_sanitize)) {
    echo '<h1 class=\'alert\'>Certains caractères utilisé pour le message sont incorrect où le champs est resté vide !! </h1>';
  }else{
    $message = $message_sanitize;
  }
}

if(empty($name) || empty($firstname) || ($mail === false || empty($mail)) || empty($message)) {
  echo '<h1 class=\'alert\'>Echec de l\'envoi du message !! </h1>';
}else {
   $send_message = createMessage($pdo,$name,$firstname,$mail,$message);
  echo '<h1 class=\'true\'>Message envoyé !! </h1>';
}
}

?>

<form method="post" action="contact.php">

<label for="name">Nom <span aria-label="required">*</span></label>
<input type="text" id="name" name="name" placeholder="Nom" required/>

<label for="firstname">Prénom <span aria-label="required">*</span></label>
<input type="text" id="firstname" name="firstname" placeholder="Prénom" required/>

<label for="mail">Email <span aria-label="required">*</span></label>
<input type="text" id="mail" name="mail" placeholder="Email" required/>
<?php if(isset($_GET['id_car'])) { ?>
  <label for="message">Message <span aria-label="required">*</span></label>
<textarea id="message" name="message" rows="10" cols="100" placeholder="Votre message ici....">Bonjour, je souhaiterais 
  des renseignement concernant : <?=htmlspecialchars($vehicule['marque']).' '.htmlspecialchars($vehicule['modele']).' (Ref : '.htmlspecialchars($vehicule['id_car']).' )'?></textarea>
<?php }else { ?>  
<label for="message">Message <span aria-label="required">*</span></label>
<textarea id="message" name="message" rows="10" cols="100" placeholder="Votre message ici...."></textarea>
<?php } ?>
<input class="button b_update" type="submit" name="post_message" value="Envoyer"/>

</form>

<?php require_once __DIR__.'/template/footer.php'; ?>