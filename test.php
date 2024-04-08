<?php


if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  var_dump($_FILES['img']);
  if($_FILES['img']['error'] != 4) {
    echo 'Hello';
  $extensions = ['jpg','png','jpeg'];//Tableau extension accepté
  $maxSize = 5000000;//Taille max du fichier imposé
  $countfiles = count($_FILES['img']['name']);//On compte le nb de fichiers uploadé

  for($i = 0; $i < $countfiles; $i++) {
    //Variable nom de fichier
    $filename = $_FILES['img']['name'][$i];
    $explode = explode('.',$filename);
    $extension = strtolower(end($explode));//Mise en minuscule de l'extension(jpg, etc, ...)
   

  if(!in_array($extension,$extensions) && $_FILES['img']['error'] != 4) {//Comparaison de l'extension par rapport à l'array défini
    echo '<h1 class=\'alert\'>Le format de fichier de l\'image '.$filename.' est incorrect (uniquement jpg, png ou jpeg) !! </h1>';
  }else{
  //Variable taille de fichier
  $filesize = $_FILES['img']['size'][$i];
  if($filesize > $maxSize) {//Comparaison de la taille par rapport au max défini 
    echo '<h1 class="alert">La taille du fichier '.$filename.' est trop volumineux (Max : 5 Mo) !! </h1>';  
  }else{
     $rename = uniqid().'.'.$filename;//creation id unique
     var_dump($rename);
    if($_FILES['img']['error'] != 4) {

    $upload = "./admin/upload_img/" ;
    move_uploaded_file($_FILES['img']['tmp_name'][$i],$upload.$rename);
}
 }   
  } 
   }
  }else{
    
  }

 
    }
?>

<img src="../assets/backcars2.jpg"/>
<form method="POST" action="test.php" enctype="multipart/form-data">

<label for="img">Ajouter une image&nbsp;:<span>*</span></label>
  <input type="file" name="img[]" multiple>
  <input type="submit" name="submit">
</form>

