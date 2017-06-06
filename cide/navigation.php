
</br>
<nav>
	<a href="index.php">Accueil</a>
	<a href="groupe.php">Mes Groupes</a>
	<?php
	if (isset($_SESSION['id'])){
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
	$donnees=$reponse->fetch();
		echo '<a href="murprofil.php?id='.htmlspecialchars($donnees["id"]).'">Mon mur</a>';
	}
	else{
		echo '<a href="profil.php">Mon mur</a>';
	}
	?>
	</br></br></br></br></br>
	<form method="post" action="traitementrecherche.php">
		<input id="recherche" type="text" name="search" placeholder="Rechercher..">
	</form>
	</br></br></br></br></br>
	<a id="navcrea" href="creagroupe.php">Créer un groupe</a>
</nav>
