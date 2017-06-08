<?php
    include("header.php");
    if (isset($_GET['id'])) {
		$reponse=$bdd->query("SELECT * FROM groupe WHERE id=\"".$_GET["id"]."\"");
		$donnees=$reponse->fetch();
		if($donnees["accepte"] == "1"){
			include("murgroupe.php");
		}else{	echo '<div class="centredeco">
			<p>
			En attente d\'acceptation
			</p></div>';
		}
    }
    else {
        if (isset($_SESSION['id'])) {
				include("groupeconnecte.php");
		}
		else {
			//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
			echo '<div class="centredeco">
				<p>
				Connecte toi ou rejoins nous !
				</br>
				</br>
				<a class="inscription" href="inscription.php">Pas encore inscrit ? Par ici !</a>
				</p></div>';
		}
	}
	echo "</body>
		  </html>";
?>