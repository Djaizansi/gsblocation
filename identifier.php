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
  # code...
{
  $etape = 2;
  $unNom= htmlspecialchars($_POST['nom']);
  $unMdp=  htmlspecialchars($_POST['mdp']);
  $utilisateur = identifier($unNom, md5($unMdp), $tabErreurs);
  affecterInfosConnecte($utilisateur['nom'],$utilisateur['mdp'],$utilisateur['cat']);
  
}

// Début de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if($etape==1)
{
  include($repVues."vIdentifierForm.php");
}
if($etape==2)
{
  
  include($repVues."vAccueil.php");
}

include($repVues."pied.php");
?>