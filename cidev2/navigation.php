<div class="container-fluid" style="background-color:rgb(43,87,160);color:#fff;height:200px;">
  <img src="image/logo.jpg" title="Le Cercle d'Ingénieurs de l'ENSISA" alt="C.I.D.E." width="300px" height="200px" />
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="200">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CIDE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li><a href="#">ENSISA</a></li>
		<li><a href="index.php">Accueil</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Groupe <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="groupe.php">Mes Groupes</a></li>
            <li><a href="creagroupe.php">Créer Groupe</a></li>
          </ul>
        </li>
        <li><?php
 			if (isset($_SESSION['id'])){
					$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
					$donnees=$reponse->fetch();
					echo '<a href="murprofil.php?id='.htmlspecialchars($donnees["id"]).'">Mon mur</a>';
				}
				else{
					echo '<a href="profil.php">Mon mur</a>';
				}
			?>
		</li>
      </ul>
    </div>
  </div>
</nav>



