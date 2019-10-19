<?php
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");

$unePlaque=lireDonneeUrl("plaq", ""); // lireDonneeUrl va permettre de recuperer a partir d'un lien url la donnée saisi
$uneDateF=lireDonneePost("dateF", "");
$etat=lireDonneePost("etat", "");
  
if (count($_POST)==0)
{
  $etape = 1;
}
else
{ 
  $etape = 2;   
  if(restituer($unePlaque, $uneDateF, $tabErreurs)==false || updateEtatPanne($unePlaque, $etat) == false){
  ?>
            <h1><center><p class="text-warning w3-center">OUPS ! Une erreur est survenue.</center></h1></p>
            <h2><center><p class="text-info">  Il semble que la restitution a echoue</center></h2></p>
            <center><h2>Pour reesayer, cliquez ici  <a href="listeremprunter.php"><button type="button" class="btn btn-danger">Voir</button></a></h2></center>
  <?php
  }
  else{
  ?>
           <h1><center><p class="text-success w3-center">FELICITATION ! Votre vehicule a ete restituer a la date <?php echo $_POST["dateF"] ?></center></h1></p>
              <center><h2>Vehicule toujours fonctionnel ?<a href="listeremprunter.php"><button type="button" class="btn btn-success">Retour Emprunt</button></a></h2></center>
              <?php
  }
  
}

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if($etape==1){
include($repVues."vRestituer.php") ;
}
include($repVues."pied.php") ;

?>