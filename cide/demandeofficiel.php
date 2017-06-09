<?php
	include("header.php");
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$reponse=$bdd->query("SELECT utilisateur.id FROM utilisateur inner join appartient on appartient.idUtil = utilisateur.id inner join groupe on appartient.idGroupe = groupe.id WHERE groupe.nom=\"ENSISA\" and appartient.droit=\"admin\"");
	$auto=false;
    if (isset($_SESSION['id'])){
		while ($donnees=$reponse->fetch()){
			if($_SESSION['id']==$donnees['id']){
				$auto=true;
			}
		}
		if(isset($_GET['id'])){ 
			if($auto) {
				include("demandeofficielconnecte.php");
			}
			else{
				echo '<div class="col-sm-1 col-perso" id="deco">
					<p>
					Vous n\'avez pas les droits de cette page!
					</p></div>';
			}
		}
	}
	else {
		//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
		echo '<div class="col-sm-1 col-perso" id="deco"">
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