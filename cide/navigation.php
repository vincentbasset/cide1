
</br>
<nav>
	<a href="index.php">Accueil</a>
	<a href="groupe.php">Mes Groupes</a>
	<?php
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
	$donnees=$reponse->fetch();
		echo '<a href="murprofil.php?id='.$donnees["id"].'">Mon mur</a>';
	?>
	</br></br></br></br></br>
	<form method="post" action="traitementrecherche.php">
		<input id="recherche" type="text" name="search" placeholder="Rechercher..">
	</form>
	</br></br></br></br></br>
	<a id="navcrea" href="creagroupe.php">Créer un groupe</a>
</nav>
