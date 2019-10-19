<?php
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");



//$unMat=lireDonneeUrl("matricule", "");

$unId=lireDonneeUrl("id","");
$unMat=lireDonneePost("matricule", "");
$unePlaque=lireDonneePost("plaq", "");
$uneDateD=lireDonneePost("dateD", "");
if (count($_POST)==0)
{
  $etape = 1;
  $unefleur=listermodif();
}
else
{
  $etape = 2;  
  //emprunter($unMat,$unePlaque,$uneDateD, $tabErreurs);
   
  //if(estEmprunter($unMat, $tabErreurs)==false){
    $unIdent=0;
    emprunter($unIdent,$unMat,$unePlaque,$uneDateD, $tabErreurs);
 


} 
  

 //$_GET["plaq"];
// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape == 1){
$lafleur=get_vehicule($unId, $tabErreurs);
 
include($repVues."vEmprunter.php") ;
}
include($repVues."pied.php") ;
?>        

   