<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
 
 $unePlaque=lireDonneeUrl("plaque","");
 if (isset($_GET["id"])) {
    supprimervehi($_GET["id"], $tabErrs);
}
  $cat="";
  if (isset($_GET['categ']))
  {
  $cat = $_GET['categ'];
  }  
  $lafleur = listervehi($cat);
  
              
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vVehicule.php");
  include($repVues."pied.php") ;
  ?>
    
