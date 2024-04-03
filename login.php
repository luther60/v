<?php 
require_once __DIR__.'/template/header.php'; 
 ?>

<form id="login_form" method="post" action="">


<label for="mail">Email <span aria-label="required">*</span></label>
<input type="text" id="mail" name="mail" placeholder="Email" required/>

<label for="password">Mot de passe <span aria-label="required">*</span></label>
<input type="text" id="password" name="password" placeholder="Mot de passe" required/>
<div class="call_car"><a href="contact.php">Se connecter</a></div>




</form>

<?php require_once __DIR__.'/template/footer.php'; ?>