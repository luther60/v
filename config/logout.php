<?php session_start() ;

session_unset();//Détruit les variables de session

session_destroy();//Détruit la session

header('location:../index.php');//Redirection vers accueil
?>
