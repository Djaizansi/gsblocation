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
      <legend>Entrez les donnees sur le visiteur a modifier </legend>
      <label> Matricule :</label>
      <label><?php echo $lafleur["matricule"]; ?> </label>
      <input type="hidden" name="matricule" value="<?php echo $lafleur["matricule"]; ?>" /><br />
      <label>Nom :</label>
      <input type="text" name="nom" value="<?php echo $lafleur["nom"]; ?>" size="20" /><br />
      <label>Prenom :</label>
      <input type="text" name="prenom" value="<?php echo $lafleur["prenom"]; ?>" size="10" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  
    <?php 
    }
    else{
      echo "<br><h1>Desole, ce matricule n'existe pas!</h1>";
    } ?>
</form>
</div>
