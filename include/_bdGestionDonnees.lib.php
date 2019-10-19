<?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsbvisiteur'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function listervisi($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      if ($categ!="")
      {
          $requete=$requete." where pdt_categorie='".$categ."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['matricule']=$ligne->VIS_MATRICULE;
          $fleur[$i]['nom']=$ligne->VIS_NOM;
          $fleur[$i]['prenom']=$ligne->VIS_PRENOM;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}

function listervehi($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from voiture";
      if ($categ!="")
      {
          $requete=$requete." where pdt_categorie='".$categ."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {     
          $fleur[$i]['id']=$ligne->id;
          $fleur[$i]['plaq']=$ligne->plaque;
          $fleur[$i]['mod']=$ligne->modele;
          $fleur[$i]['mark']=$ligne->marque;
          $fleur[$i]['etat']=$ligne->etat;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}

function listervehiPanne($categ)
{
  $connexion = connecterServeurBD();
  $fleur=array();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from voiture";
      if ($categ!="")
      {
          $requete=$requete." where pdt_categorie='".$categ."' and etat = 'panne';";
      }
      else{
           $requete=$requete." where etat = 'panne';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {     
          $fleur[$i]['id']=$ligne->id;
          $fleur[$i]['plaq']=$ligne->plaque;
          $fleur[$i]['mod']=$ligne->modele;
          $fleur[$i]['mark']=$ligne->marque;
          $fleur[$i]['etat']=$ligne->etat;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}
function listeremprunter($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from emprunter";
      if ($categ!="")
      {
          $requete=$requete." where pdt_categorie='".$categ."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['matricule']=$ligne->matricule;
          $fleur[$i]['plaque']=$ligne->plaque;
          $fleur[$i]['dateD']=$ligne->dateDebut;
          $fleur[$i]['dateF']=$ligne->dateFin;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}

function ajoutervisi($mat, $nom, $prenom,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la référence existe déjà !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into visiteur (VIS_MATRICULE,VIS_NOM,VIS_PRENOM) values ('"
       .$mat."','"
       .$nom."','"
       .$prenom."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a ete correctement ajoutee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a échoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function ajoutervehi($unePlaque, $unModele, $uneMarque,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from voiture";
    $requete=$requete." where plaque = '".$unePlaque."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la plaque existe deja !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into voiture"
       ."(plaque, modele, marque) values ('"
       .$unePlaque."','"
       .$unModele."','"
       .$uneMarque."')";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le vehicule a ete correctement ajoutee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du vehicule a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function supprimervisi($leMat, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$leMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    // Créer la requête de suppression
       $requete="delete from visiteur where VIS_MATRICULE= '$leMat'";
       
      
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a ete correctement supprimer";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du visiteur a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 
    }
    else
    {
      $message="Echec de la suppression : le matricule n'existe pas ou est deja supprimer!";
      ajouterErreur($tabErr, $message);
    } 
}
function supprimervehi($unePlaque, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from voiture";
    $requete=$requete." where plaque = '".$unePlaque."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    // Créer la requête de suppression
       $requete="delete from voiture where plaque= '$unePlaque'";
       
      
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le vehicule a ete correctement supprimer";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du vehicule a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 
    }
    else
    {
      $message="Echec de la suppression : la plaque n'existe pas ou est deja supprimer!";
      ajouterErreur($tabErr, $message);
    } 
}
function recherchervehiSearch($leModele, &$tabErr)
{
    $connexion = connecterServeurBD();
    $fleur=array();
    $requete="select * from voiture where modele like'%".$leModele."%';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $ok1=$jeuResultat;
        
        $fleur[$i]['plaq']=$ligne['plaque'];
        $fleur[$i]['mod']=$ligne['modele'];
        $fleur[$i]['mark']=$ligne['marque'];
        $ligne=$jeuResultat->fetch();
        
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
  
}
function recherchervisiSearch($leMatricule, &$tabErr)
{
    $connexion = connecterServeurBD();
    $fleur=array();
    $requete="select * from visiteur where VIS_MATRICULE like'%".$leMatricule."%';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $ok1=$jeuResultat;
        
        $fleur[$i]['matricule']=$ligne['VIS_MATRICULE'];
        $fleur[$i]['nom']=$ligne['VIS_NOM'];
        $fleur[$i]['prenom']=$ligne['VIS_PRENOM'];
        $ligne=$jeuResultat->fetch();
        
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
  
}
function recherchervisi($leMatricule, &$tabErr)
{
    $connexion = connecterServeurBD();
    $fleur=array();
    $requete="select * from visiteur where VIS_MATRICULE = '".$leMatricule."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
        $ok1=$jeuResultat;
        
        $fleur['matricule']=$ligne['VIS_MATRICULE'];
        $fleur['nom']=$ligne['VIS_NOM'];
        $fleur['prenom']=$ligne['VIS_PRENOM'];
        $ligne=$jeuResultat->fetch();
        
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
  
}
function recherchervehi($laPlaque, &$tabErr)
{
    $connexion = connecterServeurBD();
    $fleur=array();
    $requete="select * from voiture where plaque = '".$laPlaque."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
        $ok1=$jeuResultat;
        
        $fleur['plaq']=$ligne['plaque'];
        $fleur['mod']=$ligne['modele'];
        $fleur['mark']=$ligne['marque'];
        $ligne=$jeuResultat->fetch();
        
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
  
}
function modifiervisi($unMat, $unNom, $unPrenom, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      // Créer la requête d'ajout 
       $requete="update visiteur 
       set `VIS_NOM` = '".$unNom."', `VIS_PRENOM` = '".$unPrenom."'
        WHERE `VIS_MATRICULE` = '".$unMat."';";
        
        
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a ete correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 
    }
    else
    {
      $message="Echec de la modification : le matricule n'existe pas !";
      ajouterErreur($tabErr, $message);
  
    }
    
}
function modifiervehi($unePlaque, $unModele, $uneMarque, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from voiture";
    $requete=$requete." where plaque = '".$unePlaque."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      // Créer la requête d'ajout 
       $requete="update voiture set `modele` = '".$unModele."', `marque` = '".$uneMarque."'
        WHERE `plaque` = '".$unePlaque."';";
        
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le vehicule a ete correctement modifier";
          ajouterErreur($tabErr, $message);
          return true;
        }
        else
        {
          $message = "Attention, la modification du vehicule a echoue !!!";
          ajouterErreur($tabErr, $message);
          return false;
        } 
    }
    else
    {
      $message="Echec de la modification : la plaque n'existe pas !";
      ajouterErreur($tabErr, $message);
  
    }
    
}
function identifier($leNom,$leMdp, &$tabErr)
{
  if(TRUE){
    $ligne=false;
    $connexion = connecterServeurBD();
    $requete="select * from `utilisateur` where `nom` = '".$leNom."' and `mdp`='".$leMdp."';";
    $jeuResultat=$connexion->query($requete);
    
    
    $ligne = $jeuResultat->fetch();
    if ($ligne) {}
    else
    {
      $messageErreur="ERREUR LORS DE LA CONNEXION";
      ajouterErreur($tabErr,$messageErreur);
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $ligne;
}
}

function inscription($leNom,$leMdp, &$tabErr)
{   
$connexion = connecterServeurBD();
  if(TRUE){
    
    $requete="insert into `utilisateur`(`nom`,`mdp`,`cat`) 
    values('".$leNom."','".md5($leMdp)."','client');";
    $jeuResultat=$connexion->query($requete);
    if($jeuResultat)
    {  
      $message="Votre Compte a bien été créer";
      ajouterErreur($tabErr,$message);
    }
    else
    {
      $message="Erreur lors de la création du compte";
      ajouterErreur($tabErr,$message);

    }
}
}

function emprunter($LeIdent,$leMat, $laPlaque, $laDateD, &$tabErr)
{

$connexion = connecterServeurBD();
$requete="select plaque,dateFin from emprunter where plaque = '".$laPlaque."' AND dateFin is null;";
$jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    { 
      $message="Echec de l'emprunt : le vehicule a deja ete emprunte ou vous avez deja emprunte un vehicule !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      
      // Créer la requête d'ajout
      
       $requete="insert into emprunter (ident,matricule,plaque,dateDebut) values ("
       .$LeIdent.",'"
       .$leMat."','"
       .$laPlaque."','"
       .$laDateD."');";
        echo $requete;
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "L'emprunt a bien ete pris en compte pour le : '".$laDateD."'";
          ajouterErreur($tabErr, $message);
          
        }
        else
        {
          $message = "Attention, l'emprunt du vehicule a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
}


function restituer($laPlaque, $laDateF, &$tabErr)
{
$connexion = connecterServeurBD();
if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from emprunter";
    $requete=$requete." where plaque = '".$laPlaque."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    { 
     // Créer la requête de modification afin d'ajouter la date de fin 
      $requete="UPDATE emprunter SET dateFin ='".$laDateF."'
                WHERE plaque='".$laPlaque."' ;"; 
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); 
        // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "La restituation a bien ete pris en compte pour le : '".$laDateF."'";
          ajouterErreur($tabErr, $message);
          return true;
        }
        else
        {
          $message = "Attention, la restitution du vehicule a echoue !!!";
          ajouterErreur($tabErr, $message);
          return false;
        }   
    }
    else
    {   
    $message="Echec de l'emprunt : le vehicule a deja ete restituer !";
      ajouterErreur($tabErr, $message);
      return false;
    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function get_vehicule($unId, &$tabErreurs)
{
  $connexion = connecterServeurBD();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {        
      $requete="select * from voiture where id = ".$unId.";";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
          $fleur['id']=$ligne->id;
          $fleur['plaq']=$ligne->plaque;
          $fleur['mod']=$ligne->modele;
          $fleur['mark']=$ligne->marque;
          $fleur['etat']=$ligne->etat;
          

          $ligne=$jeuResultat->fetch();
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  if (!isset($fleur)) $fleur = array();
  return $fleur;
}

function get_vehiculeplaque($unePlaque, &$tabErreurs)
{
  $connexion = connecterServeurBD();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {        
      $requete="select * from voiture where plaque = '".$unePlaque."';";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
          $fleur['id']=$ligne->id;
          $fleur['plaq']=$ligne->plaque;
          $fleur['mod']=$ligne->modele;
          $fleur['mark']=$ligne->marque;
          $fleur['etat']=$ligne->etat;
          

          $ligne=$jeuResultat->fetch();
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  if (!isset($fleur)) $fleur = array();
  return $fleur;
}

function estEmprunter($unePlaque, &$tabErr){

$connexion = connecterServeurBD();
if (TRUE) 
  {
    $requete="select * from emprunter";
    $requete=$requete." where plaque = '".$unePlaque."' AND dateFin is NULL ;"; 
    $jeuResultat=$connexion->query($requete); 

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    $ok = $connexion->query($requete);
    if($ok){

        $ligne = $jeuResultat->fetch();
        
    if($ligne)
    { 
          $message="deja emprunte";
          ajouterErreur($tabErr, $message);
          return false;
    }
    else{
          return true;
    }
    
    }
    $jeuResultat->closeCursor();
  }
}

function listermodif()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
           
      $requete="select VIS_MATRICULE from visiteur";
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['matricule']=$ligne->VIS_MATRICULE;
          $ligne = $jeuResultat->fetch();  //ligne suivante
          $i=$i+1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}


function getEmprunter($laPlaque){
  $connexion = connecterServeurBD();
  $emprunter=array();
        
      $requete="select * from emprunter where plaque = '".$laPlaque."';";
      $jeuResultat=$connexion->query($requete);
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ);     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {             
          $emprunter['matricule']=$ligne->matricule;
          $emprunter['plaq']=$ligne->plaque;
          $emprunter['dateD']=$ligne->dateDebut;
          $emprunter['dateF']=$ligne->dateFin;
        
          $ligne=$jeuResultat->fetch();
      }
  
  $jeuResultat->closeCursor();
  return $emprunter;
}



function updateEtatPanne($unePlaque, $etat){
                         
  $panne=get_vehiculeplaque($unePlaque, $tabErrs);
                   
  $nouveletat="";
  if($etat){
   $nouveletat =  "panne";
  }else{
    $nouveletat = "fonctionnel";
  }                   
                echo  $unePlaque."<br>";
                    echo  $nouveletat."<br>";
                    
  
  $connexion= connecterServeurBD();
  $ok = $connexion->query("Update voiture set etat='".$nouveletat."' where plaque='".$unePlaque."';");
  // Si la requête a réussi
        if ($ok)
        {
        echo "OK";
          return true;
        }
        else
        {
        echo "OFF";
          return false;
        } 
}

function updateEtatFonctionnel($unePlaque, $etat){
                         
  $panne=get_vehiculeplaque($unePlaque, $tabErrs);
                   
  $nouveletat="";
  if($etat){
   $nouveletat =  "fonctionnel";
  }else{
    $nouveletat = "panne";
  }                   
                echo  $unePlaque."<br>";
                    echo  $nouveletat."<br>";
                    
  
  $connexion= connecterServeurBD();
  $ok = $connexion->query("Update voiture set etat='".$nouveletat."' where plaque='".$unePlaque."';");
  // Si la requête a réussi
        if ($ok)
        {
        echo "OK";
          return true;
        }
        else
        {
        echo "OFF";
          return false;
        } 
}



?>
