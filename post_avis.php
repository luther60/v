<?php 
require_once __DIR__.'/template/header.php'; 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/avis.php';
require_once __DIR__.'/lib/ini.php';
?>
<?php
if(isset($_POST['post_avis']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_POST['firstname'])) {
    $firstname_sanitize = htmlspecialchars($_POST['firstname']);
    if(!preg_match("/^[a-zA-Z-' éèç]*$/",$firstname_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le prénom sont incorrect !! </h1>';
    }else {
      $firstname = $firstname_sanitize;
    }
  }

  if(isset($_POST['note'])) {
    $note_sanitize = htmlspecialchars($_POST['note']);
    if(!preg_match("/^[0-9 ]*$/",$note_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour la note sont incorrect !! </h1>';
    }else {
      $note = $note_sanitize;
    }
  }

  if(isset($_POST['post'])) {
    $avis_sanitize = htmlspecialchars($_POST['post']);
    if(!preg_match("/^[[:alnum:][:punct:][:space:]èéçà]+$/",$avis_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour l\'avis sont incorrect où le champs est resté vide !! </h1>';
    }else{
      $avis = $avis_sanitize;
    }
  }

    if(isset($_POST['status'])) {
      $status_sanitize = htmlspecialchars($_POST['status']);
      if($status_sanitize != 'notvalid'){
        echo"<h1 class=alert> Erreur lors de l'envoi de l'avis !!</h1>";
      }else{
        $status = $status_sanitize;
      }    
      }  

      $date = date("d/m/Y");

  if(empty($firstname) || empty($avis) || empty($note) || empty($status)) {
    echo"<h1 class=alert> Echec lors de l'envoi de l'avis !!</h1>";
  }else{
    $send_avis = createAvis($pdo,$firstname,$avis,$note,$status,$date);
    echo '<h1 class=\'true\'>Votre avis à bien été envoyé !! </h1>';
  }
}
?>
<form method="POST" action="post_avis.php">

<label for="firstname">Prénom <span aria-label="required">*</span></label>
<input type="text" id="firstname" name="firstname" placeholder="Prénom" required/>

<label for="note">Note <span aria-label="required">*</span></label>
<input type="text" id="note" name="note" placeholder="Note de 1 à 5" required/>

<input type="hidden" id="status" name="status" value="notvalid" required/>

<label for="post">Avis <span aria-label="required">*</span></label>
<textarea id="post" name="post" rows="10" cols="100" placeholder="Votre avis ici...."></textarea>

<input class="button b_update" type="submit" name="post_avis" value="Envoyer"/>

</form>

<?php require_once __DIR__.'/template/footer.php'; ?>