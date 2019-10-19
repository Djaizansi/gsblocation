<!--Formulaire de modification à partir de l'identifiant -->

<div class="container">

<form action="" method=post>
<fieldset>
<legend>Entrez le matricule du visiteur a modifier </legend>
<label>Matricule :</label> 
<select name="matricule" id="matricule">
<?php
//$unefleur=0;

for($i=0;$i<count($unefleur);$i++)
{
?>
           <option value="<?php echo $unefleur[$i]["matricule"]; ?>"><?php echo $unefleur[$i]["matricule"]; ?></option>
           
<?php
} 
?>
</select>

<!-- <input type="text" name="matricule" size="10" />  -->
</fieldset>
<button type="submit" class="btn btn-primary">Modifier</button>
<button type="reset" class="btn">Annuler</button>
</form>

</div>
