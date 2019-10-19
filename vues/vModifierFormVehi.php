
<?php 
if (isset($message))
  {
?>
    <div class="container"><?php echo $message ?> </div>
<?php
  }
?>
 
<!--Saisir les informations dans un formulaire!-->
<div class="container">
 <?php 
    if ($lafleur!=0){
 ?>  
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les donnees sur le vehicule a modifier </legend>
      <label> Plaque :</label>
      <label><?php echo $lafleur["plaq"]; ?> </label>
      <input type="hidden" name="plaq" value="<?php echo $lafleur["plaq"]; ?>" /><br />
      <label>Modele :</label>
      <input type="text" name="mod" value="<?php echo $lafleur["mod"]; ?>" size="20" /><br />
      <label>Marque :</label>
      <input type="text" name="mark" value="<?php echo $lafleur["mark"]; ?>" size="10" /><br />
      <label class="checkbox">                                                                            
	  	          <input type="checkbox" name="etat"><small>Vehicule fonctionnel ?<a class="form-check-input"></a>
      </label>
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  
    <?php 
    }
    else{
      echo "<br><h1>Desole, cette plaque n'existe pas!</h1>";
    } ?>
</form>
</div>
