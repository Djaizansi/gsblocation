

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
          <form action="listerpanne.php" methode="post">
            <td><?php echo $lafleur[$i]["id"]?></td>
            <td><?php echo $lafleur[$i]["plaq"]?></td>
            <td><?php echo $lafleur[$i]["mod"]?></td>
            <td align="right"><?php echo $lafleur[$i]["mark"]?></td>
            <?php
            if($lafleur[$i]["etat"] == "panne"){
            ?>
                <td align="center"><img src="./images/erreur.png"></a></td>
                 
            <?php
            }
          ?>
        </tr>
<?php
        
        $i = $i + 1;
   
     }
     
?>       
       </tbody>       
     </table>    
  </div>