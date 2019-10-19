<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  
  require("./include/_init.inc.php");
    

// DEBUT du contrôleur modifier.php

if (count($_POST)==0)
{
  $etape = 1;
  $unefleur=listermodif();  
}
if(count($_POST)==1)
  # code...
{
  $etape = 2;
  $leMatricule=$_POST["matricule"];
  $lafleur=0;
  $lafleur = recherchervisi($leMatricule, $tabErreurs);

}
if(count($_POST)>=2)
{
  $etape = 3;
  $leMatricule=$_POST["matricule"];
  $leNom=$_POST["nom"];
  $lePrenom=$_POST["prenom"];
  modifiervisi($leMatricule, $leNom, $lePrenom,$tabErreurs);
}


// Début de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if($etape==1)
{
  include($repVues."vModifierRefFormVisi.php");
}
if($etape==2)
{
  include($repVues."vModifierFormVisi.php");
}
include($repVues."pied.php");
?>