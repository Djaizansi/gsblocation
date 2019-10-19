<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les donnees a propos de l'emprunt </legend>
      
      <label>Plaque :</label>
      <input type="text" name="plaq" value="<?php echo $lafleur["plaq"]; ?>" size="20" readonly/><br />
      
      <label>Modele :</label>
      <input type="text" name="mod" value="<?php echo $lafleur["mod"]; ?>" size="10" readonly/><br />
      
      <label>Marque :</label>
      <input type="text" name="mark" value="<?php echo $lafleur["mark"]; ?>" size="10" readonly/><br />
      
      <label>Matricule emprunteur :</label>
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
      <!-- <input type="text" name="matricule" size="10" /><br /> -->
      
      <label>Date d'emprunt:</label>
      <?php
      
      $datetoday = date("Y-m-d");
      ?>
      
      <input type="date" value = "<?php echo $datetoday;?>" name="dateD" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Emprunter</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  
</form>
</div>