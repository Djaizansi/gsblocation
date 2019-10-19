<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$laPlaque=lireDonneePost("plaq", "");
$leModele=lireDonneePost("mod", "");
$laMarque=lireDonneePost("mark", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajoutervehi($laPlaque, $leModele, $laMarque,$tabErreurs);
}

// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterFormVehi.php") ;
include($repVues."pied.php") ;
?>
  
