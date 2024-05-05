<?php
 session_start();
require_once 'header_car.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/vehicules.php';
require_once __DIR__.'/../../config/error.php';
if(($_SESSION['user']['role']) === null) { 
  redirect();
 }
 if(isset($_GET['id_car'])){
  try{
  $vehicule = getVehiculeById($pdo,$_GET['id_car']);
  $options = getVehiculesOptions($pdo,$_GET['id_car']);
  $images = getVehiculesImg($pdo,$_GET['id_car']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}
 
?>

<?php
//Vérification de la présence d'une soumission et de la méthode
if(isset($_POST['update_vehicule']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

  $id_car = $_GET['id_car'];

  //Traitement de chaque entrée utilisateur
  if(isset($_POST['marque'])) {
    $marque_sanitize = htmlspecialchars($_POST['marque']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$marque_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le nom de la marque sont incorrect !! </h1>';
    }else {
      $marque = $marque_sanitize;
    }
  }

  if(isset($_POST['modele'])) {
    $modele_sanitize = htmlspecialchars($_POST['modele'],);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$modele_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le nom du modèle sont incorrect !! </h1>';
    } else {
      $modele = $modele_sanitize;
    }
  }

  if(isset($_POST['annee'])) {
    $annee_sanitize = htmlspecialchars($_POST['annee']);
    if(!preg_match("/^[ 0-9]*$/",$annee_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour l\année sont incorrect !! </h1>';
    }else {
      $annee = $annee_sanitize;
    }
  }

  if(isset($_POST['km'])) {
    $km_sanitize = htmlspecialchars($_POST['km']);
    if(!preg_match("/^[ 0-9]*$/",$km_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le kilométrage sont incorrect !! </h1>';
    }else {
      $km = $km_sanitize;
    }
  }

  if(isset($_POST['energie'])) {
    $energie_sanitize = htmlentities($_POST['energie']);
    $energie = $energie_sanitize;
    }
  
  if(isset($_POST['transmission'])) {
    $transmission_sanitize = htmlentities($_POST['transmission']);
    $transmission = $transmission_sanitize;
    }
  
  if(isset($_POST['cv'])) {
    $cv_sanitize = htmlentities($_POST['cv']);
    if(!preg_match("/^[a-zA-Z-' 0-9]*$/",$cv_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour les CV sont incorrect !! </h1>';
    }else {
      $cv = $cv_sanitize;
    }
  }

  if(isset($_POST['prix'])) {
    $prix_sanitize = htmlentities($_POST['prix']);
    if(!preg_match("/^[ 0-9]*$/",$prix_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le prix sont incorrect !! </h1>';
    }else {
      $prix = $prix_sanitize;
    }
  }

  if(isset($_POST['exterieur'])) {
    $exterieur_sanitize = htmlspecialchars($_POST['exterieur']);
    if(!preg_match("/^[[:alnum:][:punct:][:space:]èéç]+$/",$exterieur_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le message sont incorrect où le champs est resté vide !! </h1>';
    }else{
      $exterieur = $exterieur_sanitize;
    }
    }
  
  if(isset($_POST['interieur'])) {
    $interieur_sanitize = htmlspecialchars($_POST['interieur']);
    if(!preg_match("/^[[:alnum:][:punct:][:space:]èéç]+$/",$interieur_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le message sont incorrect où le champs est resté vide !! </h1>';
    }else{
      $interieur = $interieur_sanitize;
    }
    }
  
  if(isset($_POST['securite'])) {
    $securite_sanitize = htmlspecialchars($_POST['securite']);
    if(!preg_match("/^[[:alnum:][:punct:][:space:]èéç]+$/",$securite_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le message sont incorrect où le champs est resté vide !! </h1>';
    }else{
      $securite = $securite_sanitize;
    }
    }
  
  if(isset($_POST['confort'])) {
    $confort_sanitize = htmlspecialchars($_POST['confort']);
    if(!preg_match("/^[[:alnum:][:punct:][:space:]èéç]+$/",$confort_sanitize)) {
      echo '<h1 class=\'alert\'>Certains caractères utilisé pour le message sont incorrect où le champs est resté vide !! </h1>';
    }else{
      $confort = $confort_sanitize;
    }
    }
  
  //Traitement image default
  if(isset($_POST['img_default']) && ($_FILES['img_default']['error'] != 4)) {

    $extensions = ['jpg','png','jpeg'];//Tableau extension accepté
    $maxSize = 5000000;//Taille max du fichier imposé
    $post_img = $_FILES['img_default']['name'];
    $explode_default = explode('.',$post_img);
    $extension_default = strtolower(end($explode_default));

    if(!in_array($extension_default,$extensions)) {//Comparaison de l'extension par rapport à l'array défini
      echo '<h1 class=\'alert\'>Le format de fichier de l\'image '.$post_img.' est incorrect (uniquement jpg, png ou jpeg) !! </h1>';
  }else{
    $imgSize = $_FILES['img_default']['size'];
    if($imgSize > $maxSize) {//Comparaison de la taille par rapport au max défini 
      echo '<h1 class="alert">La taille du fichier '.$post_img.' est trop volumineux (Max : 5 Mo) !! </h1>';  
  }
   }
    }

    //Traitement multi images
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
     $count = count($images);//On compte le nb images actuelles
     for($i = 0; $i < $count; $i++) {
     $currentImg = $images[$i]['id_img'];
     $id_img = $currentImg;
     if(file_exists($images[$i]['path_img'])) {
      unlink($images[$i]['path_img']);
     }
     $rename = uniqid().'.'.$filename;//creation id unique
     $upload = "../upload_img/".$rename;
     move_uploaded_file($_FILES['img']['tmp_name'][$i], $upload); 
     $path_img = $upload;
     $id_current_img = $id_car;
     $name = $rename;
     $updateImg = updateImg($pdo,$name,$path_img,$id_current_img,$id_img);   
 }
  }
   }
    }
     }
  
  //Si erreur sur l'une des variables
  if(empty($marque) || empty($modele) || empty($annee) || empty($km) || empty($energie) || empty($transmission) ||
  empty($cv) || empty($prix)) {
  echo '<h1 class=\'alert\'>La création du véhicule à échoué !! </h1>';
} else {
     $newName = uniqid().'.'.$_FILES['img_default']['name'];
     //Si présence d'une ancienne image, on la supprime
     if(file_exists($vehicule['img'])) {
      unlink($vehicule['img']);
     }
     $img_temp = $_FILES['img_default']['tmp_name'];
     $upload_img = "../upload_img/".$newName;
     move_uploaded_file($img_temp,$upload_img);
  $img = $upload_img;
  $id_current = $id_car;
  $updateVehicule = updateVehicule($pdo,$id_car,$marque,$modele,$annee,$km,$energie,$transmission,$cv,$prix,$interieur,$exterieur,
  $securite,$confort,$id_current,$img);
  echo '<h1 class=\'true\'>La création du véhicule à été effectué !! </h1>';
} 
}
?>

 <h1 class="title_index">Formulaire de modification d'un vehicule :</h1>

</h2>

<form method="POST" action="update_vehicule.php?id_car=<?=htmlspecialchars($_GET['id_car'])?>" enctype="multipart/form-data">

  <label for="marque">Marque&nbsp;:<span aria-label="required">*</span></label>
  <input id="marque" type="text" name="marque" value="<?=htmlspecialchars($vehicule['marque'])?>" required />

  <label for="modele">Modèle&nbsp;:<span aria-label="required">*</span></label>
  <input id="modele" type="text" value="<?=htmlspecialchars($vehicule['modele'])?>" name="modele" />

  <label for="annee">Année&nbsp;:<span aria-label="required">*</span></label>
  <input id="annee" type="text" value="<?=htmlspecialchars($vehicule['annee'])?>" name="annee" required />

  <label for="km">Kilométrage&nbsp;:<span aria-label="required">*</span></label>
  <input id="km" type="text" value="<?=htmlspecialchars($vehicule['km'])?>" name="km" required />

  <div class="liste_filter"> 
  <label id="lab_filter" for="filter">Choisir le type de carburant :</label>
  <select id="option" name="energie" required>
    <option value="">Veuillez choisir</option> 
    <option value="Essence">Essence</option>
    <option value="Diesel">Diesel</option>
    <option value="GPL">GPL</option>
    <option value="Hybride">Hybride</option>
    <option value="Electrique">Electrique</option>
    <option value="Hydrogene">Hydrogene</option>
  </select>
  </div>

  <div class="liste_filter"> 
  <label id="lab_filter" for="filter">Choisir le type de transmission :</label>
  <select id="option" name="transmission" required>
    <option value="">Veuillez choisir</option> 
    <option value="Boite manuel">Boite manuel</option>
    <option value="Boite automatique">Boite automatique</option>
  </select>
  </div>

  <label for="cv">CV&nbsp;:<span aria-label="required">*</span></label>
  <input id="cv" type="text" value="<?=htmlspecialchars($vehicule['cv'])?>" name="cv" required />

  <label for="prix">Prix&nbsp;:<span aria-label="required">*</span></label>
  <input id="prix" type="text" value="<?=htmlspecialchars($vehicule['prix'])?>" name="prix" required />

  <label for="exterieur">Options extérieur&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="exterieur" name="exterieur"  cols="60" rows="5" placeholder="Options extérieur"><?=htmlspecialchars($options['exterieur'])?></textarea>

  <label for="interieur">Options intérieur&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="interieur" name="interieur"  cols="60" rows="5" placeholder="Options intérieur"><?=htmlspecialchars($options['interieur'])?></textarea>

  <label for="securite">Options sécurité&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="securite" name="securite"  cols="60" rows="5" placeholder="Options sécurité"><?=htmlspecialchars($options['securite'])?></textarea>

  <label for="confort">Options confort&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="confort" name="confort"  cols="60" rows="5" placeholder="Options confort"><?=htmlspecialchars($options['confort'])?></textarea>

  <label for="img">Ajouter une image principale&nbsp;:<span>*</span></label>
  <input type="file" name="img_default" required>

  <label for="img">Ajouter des images secondaires (1 min)&nbsp;:</label>
  <input type="file" name="img[]" multiple required>

  <input class="button b_update" type="submit" name="update_vehicule" value="Modifier">

</form>

<?php require_once __DIR__.'/../footer.php';?>