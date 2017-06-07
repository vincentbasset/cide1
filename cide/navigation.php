</br>
<?php
if (isset($_SESSION['id'])) {
    $reponse=$bdd->query('SELECT DISTINCT idUtil2 FROM chat WHERE idUtil1='.$_SESSION['id'].'');
}
?>
<nav>
	<a href="index.php">Accueil</a>
	<a href="groupe.php">Mes Groupes</a>
	<a href="profil.php">Mon profil</a>
	</br></br></br></br></br>
	<form method="post" action="traitementrecherche.php">
		<input id="recherche" type="text" name="search" placeholder="Rechercher..">
	</form>
	</br></br></br></br></br>
	<a id="navcrea" href="creagroupe.php">Créer un groupe</a>
    <?php 
        if (isset($_SESSION['id'])) {
            while($donnees=$reponse->fetch()){
                include "chat.php";
            } 
        }
    ?>
</br></br></br>
</nav>
