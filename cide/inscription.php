<?php
	include("header.php");

	if(!isset($_SESSION['id'])){
	echo '<script src="javascript.js"></script>
			<div class="col-sm-1 col-perso">
				<h2>Inscrivez-vous</h2>
				<form name="inscription" method="post" action="traitement.php" enctype="multipart/form-data">
						<p>
							</br>
							<input class="tailleinscription" type="text" name="nom" placeholder="Entrez votre nom" required>
							</br>
							</br>
							<input class="tailleinscription" type="text" name="prenom" placeholder="Entrez votre prénom" required>
							</br>
							</br>
							<label for="date">Votre date de naissance: </label>
							<input type="date" id="date" name="date" required>
							</br>
							</br>
							<input type="email" name="mail" placeholder="Entrez votre e-mail" required>
							</br>
							</br>
							<label for="photo">Ajouter une photo de profil:</label>
							</br>
							</br>
							<input type="file" id="photo" name="photo" accept="image/gif, image/jpeg, image/png">
							</br>
							</br>
							<input class="tailleinscription" type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
							</br>
							</br>
							<input class="tailleinscription" type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
							</br>
							</br>
							<a href="cgu.php" target="_blank">Conditions générales d\'utilisation</a>
							</br>
							<input type="checkbox" name="cgu" id="cgu" required>					
							<label for="cgu">J\'ai lu et accepte les conditions générales d\'utilisation</label>
							</br>
							</br>
							<input type="submit" value="Inscription" name="envoyer" onmouseover="javascript:check();" />
							</br>
							</br>
							</br>
							</br>
						</p>
				</form>';
	}else{
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
?>
		</div>
	</body>
</html>