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
}
if(count($_POST)==1)
  # code...
{
  $etape = 2;
  $unePlaque=$_POST["plaq"];
  $lafleur=0;
  $lafleur = recherchervehi($unePlaque, $tabErreurs);

}
if(count($_POST)>=2)
{
  $etape = 3;
  $unePlaque=$_POST["plaq"];
  $unModele=$_POST["mod"];
  $uneMarque=$_POST["mark"];
  $unEtat=$_POST["etat"];
  
  if(modifiervehi($unePlaque,$unModele,$uneMarque, $tabErreurs)==false || updateEtatFonctionnel($unePlaque, $unEtat) == false){
  ?>
            <h1><center><p class="text-warning w3-center">OUPS ! Une erreur est survenue.</center></h1></p>
            <h2><center><p class="text-info">  Il semble que la restitution a echoue</center></h2></p>
            <center><h2>Pour reesayer, cliquez ici  <a href="modifiervehi.php"><button type="button" class="btn btn-danger">Retour</button></a></h2></center>
  <?php
  }
  else{
  ?>
           <h1><center><p class="text-success w3-center">FELICITATION ! la modification a bien été faite</center></h1></p>
              <center><h2><a href="listervehi.php"><button type="button" class="btn btn-success">Voir Vehicule</button></a></h2></center>
              <?php
  }
}


// Début de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if($etape==1)
{
  include($repVues."vModifierRefFormVehi.php");
}
if($etape==2)
{
  include($repVues."vModifierFormVehi.php");
}
include($repVues."pied.php");
?>