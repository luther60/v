<?php 
require_once __DIR__.'/template/header.php'; 
 ?>

<form id="login_form" method="POST" action="../admin/submit.php">

<label for="mail">Email <span aria-label="required">*</span></label>
<input type="text" id="mail" name="mail" placeholder="Email" required/>

<label for="password">Mot de passe <span aria-label="required">*</span></label>
<input type="text" id="password" name="password" placeholder="Mot de passe" required/>

<input class="call_car" type="submit" name="login" value="se connecter">

</form>

<?php require_once __DIR__.'/template/footer.php'; ?>