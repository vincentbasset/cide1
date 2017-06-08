<div class="col-sm-2 col-perso">
	<div class="media">
			<?php
				if (isset($_SESSION['id'])) {
						$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
						$donnees=$reponse->fetch();
						//ce qui se passe si on est co
						echo '
						<div class="media-left">
							<a href="profil.php"><img class="img-circle" src="'.htmlspecialchars($donnees["photo"]).'" alt="'.htmlspecialchars($donnees["nom"]).' '.htmlspecialchars($donnees["prenom"]).'" width="50px" height="50px"/></p><p>
						</div>
						<div class="media-body">
							<h4 class="media-heading">'.htmlspecialchars($donnees["nom"]).' '.htmlspecialchars($donnees["prenom"]).'</a></h4>
							<form action="logout.php" method="post">
								<input type="submit" value="Déconnexion">
							</form>
						</div>';
				}
				else {
					
					$_SESSION['url']=$newurl;
					//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
						echo '<div id=hconnect>
						<form action="login.php" method="post">
							<input type="varchar" name="login" placeholder="Votre login">
							<br />
							<input type="password" name="pwd" placeholder="Votre mot de passe"><br />
							<input type="submit" value="Connexion" name="connect">
							<a href="inscription.php">Inscription</a>
							<br/><a href="oublimdp.php">Mot de passe oublié?</a>
						</form></div>';	
					}
			?>
			</br></br>
			<?php 
				if (isset($_SESSION['id'])) {
					while($donnees=$reponse->fetch()){
						include "chat.php";
					} 
				}
			?>
			</br></br>
			<form method="post" action="traitementrecherche.php">
				<input id="recherche" type="text" name="search" placeholder="Rechercher..">
			</form>	
	</div>
</div>