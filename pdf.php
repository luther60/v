<?php
use Spipu\Html2Pdf\Html2Pdf;
require_once __DIR__.'/template/header.php'; 
require_once __DIR__.'/lib/pdo.php';
require_once __DIR__.'/config/vehicules.php';
require_once __DIR__.'/config/error.php';
if(isset($_GET['id_car'])){
  //Récuperation des infos
$vehicule = getVehiculeById($pdo, $_GET['id_car']);
$options = getVehiculesOptions($pdo,$_GET['id_car']);
$images = getVehiculesImg($pdo,$_GET['id_car']);

//Récupère le contenu du tampon
ob_get_clean();
//Variable contenant le html à transformer en PDF
$test = 
//Définition de marge sur la page(facultatif)
 '<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" >
  <style>
  h1{text-align: center; margin: 20px; }
  p{text-align: center;font-size: 1rem}
  h3,h2{text-align: center; font-family: dejavusans; font-size: 1rem; margin: 5px} 
  div{text-align: center}
  img{width: 50%; height:250px; margin: 30px} 
  </style>

  <h3>Marque : '.$vehicule['marque'].'</h3>
  <h3>Modèle : '.$vehicule['modele'].'</h3>
  <h3>'.$vehicule['km'].' Km</h3>
  <h3>Année : '.$vehicule['annee'].'</h3>
  <h3>Prix : '.$vehicule['prix'].' €</h3>

  <div>
  <img src="./admin/cars/'.$vehicule['img'].'">
  </div>
  <h2>Extérieur</h2>
  <p>'.nl2br($options['exterieur']).'</p>
  <h2>Intérieur</h2>
  <p>'.nl2br($options['interieur']).'</p>
  <h2>Sécurité</h2>
  <p>'.nl2br($options['securite']).'</p>
  <h2>Confort</h2>
  <p>'.nl2br($options['confort']).'</p>
  
</page>
';
//Instanciation d'un nouveau PDF (Portrait,Format,Langue,Unicode)
$html2pdf = new Html2Pdf('P','A4','fr',true,'UTF-8');
//Génération du PDF
$html2pdf->writeHTML($test);
//Choix du nom de fichier
$html2pdf->output('Véhicule '.$vehicule['marque'].'.pdf');
//Vide le tampon
ob_end_clean();
}
?>
  
