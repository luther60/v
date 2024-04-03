<?php 
require_once __DIR__.'/template/header.php'; 
 ?>

<form method="post" action="">

<label for="name">Nom <span aria-label="required">*</span></label>
<input type="text" id="name" name="name" placeholder="Nom" required/>

<label for="firstname">Prénom <span aria-label="required">*</span></label>
<input type="text" id="firstname" name="firstname" placeholder="Prénom" required/>

<label for="phone">Téléphone <span aria-label="required">*</span></label>
<input type="text" id="phone" name="phone" placeholder="Téléphone" required/>

<label for="mail">Email <span aria-label="required">*</span></label>
<input type="text" id="mail" name="mail" placeholder="Email" required/>

<label for="message">Message <span aria-label="required">*</span></label>
<textarea id="message" name="message" rows="10" cols="100" placeholder="Votre message ici...."></textarea>

<div class="call_car"><a href="contact.php">Envoyer</a></div>

</form>

<?php require_once __DIR__.'/template/footer.php'; ?>