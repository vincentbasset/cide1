<div class="col-sm-2 col-perso">
	<div class="media">
		<?php
			if (isset($_SESSION['id'])){
				$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
				$donnees=$reponse->fetch();
				echo '
					<div>
						<a href="profil.php"><img class="img-circle" src="'.htmlspecialchars($donnees["photo"]).'" alt="'.htmlspecialchars($donnees["prenom"]).' '.htmlspecialchars($donnees["nom"]).'" width="65px" height="65px"/>
					</div>
					<br/>
					<div>
						<h3 class="media-heading">'.htmlspecialchars($donnees["prenom"]).' '.htmlspecialchars($donnees["nom"]).'</a></h3>
						<form action="logout.php" method="post">
							<input type="submit" value="Déconnexion">
						</form>
					</div>';
			}
			else {
				$_SESSION['url']=$newurl;
				echo '<div id=hconnect>
						<form action="login.php" method="post">
							<input class=\"connecte\" type="varchar" name="login" placeholder="Votre login">
							<br/>
							<input class=\"connecte\" type="password" name="pwd" placeholder="Votre mot de passe">
							<br/>
							<br/>
							<input type="submit" value="Connexion" name="connect">
							<br/>
							<a href="oublimdp.php">Mot de passe oublié?</a>
							<br/>
							</br>
							<a href="inscription.php">Inscription</a>
							<br/>
						</form>
					</div>';	
			}
		?>
		</br>
		<?php 
			if (isset($_SESSION['id'])) {
				while($donnees=$reponse->fetch()){
					include "chat.php";
				} 
			}
		?>
		<form method="post" action="traitementrecherche.php">
			<input id="recherche" type="text" name="search" placeholder="Rechercher...">
		</form>	
	</div>
</div>