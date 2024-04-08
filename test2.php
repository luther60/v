<?php
require_once './lib/pdo.php';
require_once './config/vehicules.php';



if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $extensions = ['jpg','png','jpeg'];//Tableau extension accepté
  $maxSize = 5000000;//Taille max du fichier imposé
  var_dump($_FILES['img']);
  $countFiles = count($_FILES['img']['name']);//On compte le nb de fichiers transmis

  for($i = 0; $i < $countFiles; $i++) {
    $fileName = $_FILES['img']['name'][$i];
    
    $explode = explode('.',$fileName);
    $extension = strtolower(end($explode));//Mise en minuscule de l'extension(jpg, etc, ...)
   var_dump($fileName);

  if(!in_array($extension,$extensions)) {//Comparaison de l'extension par rapport à l'array défini
    echo '<h1 class=\'alert\'>Le format de fichier de l\'image '.$fileName.' est incorrect (uniquement jpg, png ou jpeg) !! </h1>';
  }else{
  //Variable taille de fichier
  $filesize = $_FILES['img']['size'][$i];
  if($filesize > $maxSize) {//Comparaison de la taille par rapport au max défini 
    echo '<h1 class="alert">La taille du fichier '.$fileName.' est trop volumineux (Max : 5 Mo) !! </h1>';  
  }else{
     $rename = uniqid().'.'.$fileName;//creation id unique
     var_dump($rename);
     
    
    $upload = "./admin/upload_img/" ;
   // move_uploaded_file($_FILES['img']['tmp_name'][$i],$upload.$rename);
   $filePath = $upload.$rename;
  /* var_dump($filePath);
   $array = array();
   array_push($array, $filePath);
   var_dump($array);*/
   
   
    // array_push($array,$fileName);
    $tableau = array_fill(0, $countFiles, $filePath);
    var_dump($tableau);
  
  
     
     // var_dump($array);
    
   }
   

 }   
  } 
 
  
   }
    
   

 

?>

<img src="../assets/backcars2.jpg"/>
<form method="POST" action="test2.php" enctype="multipart/form-data">

<label for="img">Ajouter une image&nbsp;:<span>*</span></label>
  <input type="file" name="img[]" multiple required>
  <input type="submit" name="submit">
</form>