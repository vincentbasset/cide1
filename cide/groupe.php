<?php
    include("header.php");
    if (isset($_GET['id'])) {
		$reponse=$bdd->query("SELECT * FROM groupe WHERE id=\"".$_GET["id"]."\"");
		$donnees=$reponse->fetch();
		if($donnees["accepte"] == "1"){
			include("murgroupe.php");
		}else{	echo '<div class="col-sm-1 col-perso" id="deco">
			<p>
			En attente d\'acceptation
			</p></div>';
		        include("chat/footer.php");
		}
    }
    else {
        if (isset($_SESSION['id'])) {
			include("groupeconnecte.php");
			include("chat/footer.php");
		}
		else {
			//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
			echo '<div <div class="col-sm-1 col-perso" id="deco">
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
