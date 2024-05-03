<?php
 session_start();
require_once 'header_avis.php';
require_once __DIR__.'/../../lib/pdo.php';
require_once __DIR__.'/../../config/avis.php';
require_once __DIR__.'/../../config/error.php';

if(($_SESSION['user']['role']) === null) { 
  redirect();
 }

 if(isset($_GET['id_avis'])){
  try{
  $avis = getPostById($pdo,$_GET['id_avis']);
}catch(Exception $e){
    echo"Capture de l'exception !".$e->getMessage();
};
}
 
?>

<?php
if(isset($_POST['validate_avis']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
   
  if(isset($_POST['id_avis'])) {
    $id_avis = htmlentities($_POST['id_avis']);
  }

  if(isset($_POST['status'])) {
    $status = htmlentities($_POST['status']);
  }

  if(empty($id_avis) || (empty($status) || $status != 'valid')){
    echo '<h1 class=\'alert\'>Echec de la modification !! </h1>';
  }else{
    $validate_avis = validateAvis($pdo,$id_avis,$status);
    echo '<h1 class=\'true\'>L\'avis à bien été validé !! </h1>';
  }
}
?>

<form method="POST" action="update_avis.php?id_avis=<?=htmlspecialchars($avis['id_avis'])?>">

  <input type="hidden" name="id_avis" value="<?=htmlspecialchars($avis['id_avis'])?>"/>

  <label for="firstname">Prénom <span aria-label="required">*</span></label>
<input type="text" id="firstname" name="firstname" value="<?=htmlspecialchars($avis['firstname'])?>" required/>

<p class="text_avis_validate"><?=htmlspecialchars($avis['avis'])?></p>

<input type="hidden" name="status" value="valid"/>

<input class="button b_update" type="submit" name="validate_avis" value="Valider"/>

</form>
<?php require_once __DIR__.'/../footer.php';?>