<?php
require_once './lib/pdo.php';
require_once './config/vehicules.php';
$file = $_FILES;
$countfiles = count($file);
var_dump($countfiles);

for($i = 0; $i < $countfiles; $i++) {
  var_dump($countfiles[$i]['name']);
}
if(isset($_POST['img'])) {

  
}

 

?>

<img src="../assets/backcars2.jpg"/>
<form method="POST" action="test2.php" enctype="multipart/form-data">

<label for="img">Ajouter une image&nbsp;:<span>*</span></label>
  <input type="file" name="img[]" multiple required>
  <input type="submit" name="submit">
</form>