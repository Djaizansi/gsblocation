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
  if($_POST["mdp"]==$_POST["mdp2"])
  {
    $unNom=$_POST["nom"];
    $unMdp=$_POST["mdp"];
    $utilisateur = inscription($unNom, $unMdp, $tabErreurs);
  }

  else{?>
          
        <center><h1><p class="text-warning w3-center">OUPS ! Une erreur est survenue.</h1></p></center>
        <center><h2><p class="text-info">  Il semble que les mots de passe ne correspondent pas</h2></p></center>
        <center><h2>Pour reesayer, cliquez ici  <a href="inscription.php"><button type="button" class="btn btn-danger">S'inscrire</button></a></h2></center>
    

  <?php
} 
}    
// Début de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if($etape==1)
{
  include($repVues."vInscrireForm.php");
}
if($etape==2)
{
  
}

include($repVues."pied.php");


    