
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./indexzz.php">Acc</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>
              <?php
              if(estAdministrateurConnecte()){
              ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Vehicule  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="ajouterVehi.php">Ajouter</a></li>
                        <li><a href="supprimerVehi.php">Supprimer</a></li>
                        <li><a href="modifierVehi.php">Modifier</a></li>
                        <li><a href="listervehi.php">Lister</a></li>
                        <li><a href="recherchervehiSearch.php">Rechercher</a></li> 
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteurs  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="ajouterVisi.php">Ajouter</a></li>
                        <li><a href="supprimerVisi.php">Supprimer</a></li>
                        <li><a href="modifierVisi.php">Modifier</a></li>
                        <li><a href="listervisi.php">Lister</a></li>
                        <li><a href="recherchervisiSearch.php">Rechercher</a></li>
                    </ul>
              </li>
               <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunter/Restituer<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="listeremprunter.php">Les emprunts</a></li>
                    </ul>
                </li>
                 
                
              <?php
              }
              if(!estConnecte()){
              ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Identification  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="inscription.php">S'inscrire</a></li>
                        <li><a href="identifier.php">Se connecter</a></li>
                    </ul>
                </li>
                 <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteurs  <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="listervisi.php">Lister</a></li>
                          <li><a href="recherchervisiSearch.php">Rechercher</a></li>
                      </ul>
                  </li>  
               <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">Vehicule  <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="listervehi.php">Lister</a></li>
                          <li><a href="recherchervehiSearch.php">Rechercher</a></li>
                      </ul>
                  </li>
                 <li><a href="listerpanne.php">Lister les pannes</a></li> 
                
              <?php
              }
              if(estClientConnecte()){
             ?>  
               <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteurs  <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="listervisi.php">Lister</a></li>
                          <li><a href="rechercher.php">Rechercher</a></li>
                      </ul>
                  </li>  
               <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">Vehicule  <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="listervehi.php">Lister</a></li>
                          <li><a href="rechercher.php">Rechercher</a></li>
                      </ul>
                  </li> 
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunter/Restituer<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="listeremprunter.php">Les emprunts</a></li>
                    </ul>
                </li>
                
              <?php                          
              } 
               
              if(estConnecte()){
                ?>
                <li><a href="listerpanne.php">Lister les pannes</a></li>
                <li class="nav-item nav-button nav-hide-small nav-hover-red nav-display-topright">
                  <a href="deconnecter.php">Deconnexion</a>
                </li> 
                 
              <?php
              }
              ?>
          </div>
        </div>
      </div>
    </div>
</div>

