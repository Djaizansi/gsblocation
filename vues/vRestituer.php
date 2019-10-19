                                                                                                                                                                 

<!--Saisie des informations dans un formulaire!-->
<div class="container">
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
    
    
?>

<form name="formAjout" action="" method="post">
  <fieldset>
    <legend>Restituer un vehicule </legend>
    <label>Date de Restitution :</label> <input type="date" name="dateF" size="10" /><br />  
     <label class="checkbox">                                                                            
	  	          <input type="checkbox" name="etat"><small>Vehicule en panne ?<a class="form-check-input"></a>
            </label>
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>