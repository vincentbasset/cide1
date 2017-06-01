<?php
	include("header.php");
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
	$donnees=$reponse->fetch();
	if(isset($_POST["envoyer"])){
		if (password_verify($_POST['ancienmdp'] , $donnees['motdepasse'])){
			if(!empty($_POST["mdp"])){
				$mdp = $_POST["mdp"];
				$insertion = $bdd->prepare("UPDATE utilisateur SET motdepasse =\"".password_hash($mdp , PASSWORD_BCRYPT)."\" WHERE id=".$_SESSION['id']."");
				$insertion->execute();
				echo "<div class='centreprofil' ><p>Votre mot de passe a bien été changé</p></div>";
			}
		}
		else{
			echo "<div class='centreprofil' ><p>Votre ancien mot de passe est erroné veuillez <a href=\"changermdp.php\" >recommencer</a></p></div>";
		}
	}
?>
	</body>
</html>