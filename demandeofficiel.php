<?php
	include("header.php");
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$reponse=$bdd->query("SELECT utilisateur.id FROM utilisateur inner join appartient on appartient.idUtil = utilisateur.id inner join groupe on appartient.idGroupe = groupe.id WHERE groupe.nom=\"ENSISA\" and appartient.droit=\"admin\"");
	$donnees=$reponse->fetch();
    if (isset($_SESSION['id'])){
		if(isset($_GET['id'])){ 
			if($_SESSION['id']==$donnees['id']) {//il faut rajouter la sécurité admin 
				include("demandeofficielconnecte.php");
			}
			else{
				echo '<div class="centredeco">
					<p>
					Vous n\'avez pas les droits de cette page!
					</p></div>';
			}
		}
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
	echo "</body>
		  </html>";
?>