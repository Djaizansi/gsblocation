<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  
  require("./include/_init.inc.php");
  
  if (count($_POST)==0)
{
  $etape = 1;
}

else
{
  $etape = 2;  
  $unMatricule=$_POST["matricule"];
  $lafleur = recherchervisiSearch($unMatricule,$tabErreurs);
}


 
  
  
  // Construction de la page Lister
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  if($etape==1)
  {
    include($repVues."vRechercherFormVisi.php");
  }
  if($etape==2)
  {
    include($repVues."vRechercherVisi.php");
  }
  include($repVues."pied.php") ;
  ?>
    