<?php
ini_set('display_errors', 'off');
 session_start();
require_once '../admin/header_admin.php';
require_once '../lib/pdo.php';
require_once '../config/vehicules.php';
require_once '../config/error.php';
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
  
//Vérification de la présence d'une soumission et de la méthode
if(isset($_POST['create_vehicule']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

  //Création d'un id vehicule unique
  $post_id = '';
  $id_car = uniqid($post_id,true);

  //Traitement de chaque entrée utilisateur
  if(isset($_POST['marque'])) {
    $marque_sanitize = htmlentities($_POST['marque']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$marque_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom de la marque est incorrect !! </h1>';
    }else {
      $marque = $marque_sanitize;
    }
  }

  if(isset($_POST['modele'])) {
    $modele_sanitize = htmlentities($_POST['modele'],);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$modele_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom du modèle est incorrect !! </h1>';
    } else {
      $modele = $modele_sanitize;
    }
  }

  if(isset($_POST['annee'])) {
    $annee_sanitize = htmlentities($_POST['annee']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$annee_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour l\année est incorrect !! </h1>';
    }else {
      $annee = $annee_sanitize;
    }
  }

  if(isset($_POST['km'])) {
    $km_sanitize = htmlentities($_POST['km']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$km_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le kilométrage est incorrect !! </h1>';
    }else {
      $km = $km_sanitize;
    }
  }

  if(isset($_POST['energie'])) {
    $energie_sanitize = htmlentities($_POST['energie']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$energie_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour l\énergie est incorrect !! </h1>';
    }else {
      $energie = $energie_sanitize;
    }
  }

  if(isset($_POST['transmission'])) {
    $transmission_sanitize = htmlentities($_POST['transmission']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$transmission_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour la transmission est incorrect !! </h1>';
    }else {
      $transmission = $transmission_sanitize;
    }
  }

  if(isset($_POST['cv'])) {
    $cv_sanitize = htmlentities($_POST['cv']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$cv_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour les CV est incorrect !! </h1>';
    }else {
      $cv = $cv_sanitize;
    }
  }

  if(isset($_POST['prix'])) {
    $prix_sanitize = htmlentities($_POST['prix']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$prix_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le prix est incorrect !! </h1>';
    }else {
      $prix = $prix_sanitize;
    }
  }

  if(isset($_POST['exterieur'])) {
    $exterieur_sanitize = htmlentities($_POST['exterieur']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$exterieur_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour les options extérieur est incorrect !! </h1>';
    }else {
      $exterieur = $exterieur_sanitize;
    }
  }

  if(isset($_POST['interieur'])) {
    $interieur_sanitize = htmlentities($_POST['interieur']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$interieur_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour les options intérieur est incorrect !! </h1>';
    }else {
      $interieur = $interieur_sanitize;
    }
  }

  if(isset($_POST['securite'])) {
    $securite_sanitize = htmlentities($_POST['securite']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$securite_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour les options de sécurité est incorrect !! </h1>';
    }else {
      $securite = $securite_sanitize;
    }
  }

  if(isset($_POST['confort'])) {
    $confort_sanitize = htmlentities($_POST['confort']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$confort_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour les options de confort est incorrect !! </h1>';
    }else {
      $confort = $confort_sanitize;
    }
  }
  
  if(isset($_FILES['img']) && ($_FILES['img']['error'] != 4)) {
    
    $extensions = ['jpg','png','jpeg'];//Tableau extension accepté
    $maxSize = 5000000;//Taille max du fichier imposé
    $countfiles = count($_FILES['img']['name']);//On compte le nb de fichiers uploadé

  for($i = 0; $i < $countfiles; $i++) {
    //Variable nom de fichier
    $filename = $_FILES['img']['name'][$i];
    $explode = explode('.',$filename);
    $extension = strtolower(end($explode));//Mise en minuscule de l'extension(jpg, etc, ...)
   
  if(!in_array($extension,$extensions)) {//Comparaison de l'extension par rapport à l'array défini
    echo '<h1 class=\'alert\'>Le format de fichier de l\'image '.$filename.' est incorrect (uniquement jpg, png ou jpeg) !! </h1>';
  }else{
  //Variable taille de fichier
  $filesize = $_FILES['img']['size'][$i];
  if($filesize > $maxSize) {//Comparaison de la taille par rapport au max défini 
    echo '<h1 class="alert">La taille du fichier '.$filename.' est trop volumineux (Max : 5 Mo) !! </h1>';  
  }else{
     $rename = uniqid().'.'.$filename;//creation id unique
     $filetemp = $_FILES['img']['tmp_name'][$i];
     $upload = "./upload_img/".$rename;
     move_uploaded_file($_FILES['img']['tmp_name'][$i], $upload); 
     $path_img = $upload;
     $id_current_img = $id_car;
     $name_img = $rename;
     $uploadImg = uploadImg($pdo,$name_img,$path_img,$id_current_img);
  }
   }
    }
     }
  
  //Si erreur sur l'une des variables
  if(empty($marque) || empty($modele) || empty($annee) || empty($km) || empty($energie) || empty($transmission) ||
  empty($cv) || empty($prix)) {
  echo '<h1 class=\'alert\'>La création du véhicule à échoué !! </h1>';
} else {
  
  $id_current = $id_car;
  $createVehicule = createVehicule($pdo,$id_car,$marque,$modele,$annee,$km,$energie,$transmission,$cv,$prix,$interieur,$exterieur,
  $securite,$confort,$id_current);
  echo '<h1 class=\'alert\'>La création du véhicule à été effectué !! </h1>';
} 
}
?>

<h1 class="title_index">Formulaire de création d'un nouveau vehicule :</h1>

</h2>

<form method="POST" action="create_vehicule.php" enctype="multipart/form-data">

  <label for="marque">Marque&nbsp;:<span aria-label="required">*</span></label>
  <input id="marque" type="text" name="marque" required />

  <label for="modele">Modèle&nbsp;:<span aria-label="required">*</span></label>
  <input id="modele" type="text" name="modele" />

  <label for="annee">Année&nbsp;:<span aria-label="required">*</span></label>
  <input id="annee" type="text" name="annee" required />

  <label for="km">Kilométrage&nbsp;:<span aria-label="required">*</span></label>
  <input id="km" type="text" name="km" required />

  <label for="energie">Energie&nbsp;:<span aria-label="required">*</span></label>
  <input id="energie" type="text" name="energie" required />

  <label for="transmission">Transmission&nbsp;:<span aria-label="required">*</span></label>
  <input id="transmission" type="text" name="transmission" required />

  <label for="cv">CV&nbsp;:<span aria-label="required">*</span></label>
  <input id="cv" type="text" name="cv" required />

  <label for="prix">Prix&nbsp;:<span aria-label="required">*</span></label>
  <input id="prix" type="text" name="prix" required />

  <label for="exterieur">Options extérieur&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="exterieur" name="exterieur" cols="60" rows="5" placeholder="Options extérieur"></textarea>

  <label for="interieur">Options intérieur&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="interieur" name="interieur" cols="60" rows="5" placeholder="Options intérieur"></textarea>

  <label for="securite">Options sécurité&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="securite" name="securite" cols="60" rows="5" placeholder="Options sécurité"></textarea>

  <label for="confort">Options confort&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="confort" name="confort" cols="60" rows="5" placeholder="Options confort"></textarea>

  <label for="img">Ajouter une image&nbsp;:<span>*</span></label>
  <input type="file" name="img[]" multiple required>


  <input class="button b_update" type="submit" name="create_vehicule" value="Créer">

</form>

 <?php require_once 'footer.php'; ?>