

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
          <th>Matricule</th>
          <th>Plaque</th>
          <th>Date Debut Emprunt</th>
          <th>Date Fin Emprunt</th>
          
          <th>Restituer</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>
          
            <td><?php echo $lafleur[$i]["matricule"]?></td>
            <td><?php echo $lafleur[$i]["plaque"]?></td>
            <td><?php echo $lafleur[$i]["dateD"]?></td>
            <td align="right"><?php echo $lafleur[$i]["dateF"]?></td>
            <?php 
            if($lafleur[$i]['dateF']==null){ 
            ?> 
            <td align="center"><a href="restituer.php?plaq=<?php echo $lafleur[$i]["plaque"]?>"<button type="button" class="btn btn-warning">Restituer</button></a></td>
            <?php
            }
            else{
            ?>
              <td align="right">Voiture restituer</td>
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