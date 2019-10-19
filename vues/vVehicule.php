

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Id vehicule</th>
          <th>Plaque</th>
          <th>Modele</th>
          <th>Marque</th>
          <?php
          if(estAdministrateurConnecte()){
          ?>
            <th>Emprunter</th>
          <?php
          }
          if(estAdministrateurConnecte()){
          ?>
            <th>Supprimer</th>
          <?php
          }
          ?>
          <th>Etat</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>
          <form action="emprunter.php" methode="post">
            <td><?php echo $lafleur[$i]["id"]?></td>
            <td><?php echo $lafleur[$i]["plaq"]?></td>
            <td><?php echo $lafleur[$i]["mod"]?></td>
            <td align="right"><?php echo $lafleur[$i]["mark"]?></td>
            <?php
            if (estAdministrateurConnecte()){
            if(estEmprunter($lafleur[$i]["plaq"], $tabErreur) && $lafleur[$i]["etat"] == "fonctionnel"){
    
            ?>
              <td align="center"><a href="emprunter.php?id=<?php echo $lafleur[$i]["id"]?>"><img src="./images/image.png"></a></td>
            <?php
            }
            else{
           
            ?>
                <td align="center"><img src="./images/erreur.png"></a></td>
                 
            <?php
            }
          }
          if (estAdministrateurConnecte()){
        ?>
          
            <td align="center"><a href="listervehi.php?id=<?php echo $lafleur[$i]["id"]?>"><img src="../images/corbeille.png" border="0" title="Retirer ce vehicule du garage" onclick="javascript:if(!confirm('Etes-vous sûr de vouloir supprimer ce vehicule ?')) return false;"></a></td>

        <?php
          }
        ?>
        <td align="right"><?php echo $lafleur[$i]["etat"]?></td>
        </tr>
<?php
        
        $i = $i + 1;
   
     }
     
?>       
       </tbody>       
     </table>    
  </div>