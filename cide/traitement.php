<?php
	include("header.php"); 
	
	echo("<div class=\"centre\"");
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"])){
			$nom = $_POST["nom"];
			if(!empty($_POST["prenom"])){
				$prenom = $_POST["prenom"];
				echo '<p>'.$prenom.' '.$nom.', merci pour votre inscription</p>';
				if(!empty($_POST["mail"])){
					$mail = $_POST["mail"];
					if(!empty($_POST["date"])){
						$date = $_POST["date"];
						if(!empty($_POST["mdp"])){
							$mdp = $_POST["mdp"];
							if(!empty($_POST["statut"])){
								$statut = $_POST["statut"];
								if(!empty($_POST["filiere"])){
									$filiere = $_POST["filiere"];}
								else{
									$filiere = "NULL";
								}
								
								if($_POST["cgu"]) {
									$insertion = $bdd->prepare("INSERT INTO utilisateur VALUES(NULL,\"".$nom."\",\"".$prenom."\",\"".$mail."\",\"".password_hash($mdp , PASSWORD_BCRYPT)."\",\"image/profil.jpg\",\"".$statut."\",\"".$filiere."\",NULL,\"".$date."\",NULL)");
									$insertion->execute();
								}
							}
						}
					}
				}
			}
		}
	}
	
?>
		</div>
	</body>
</htlm>