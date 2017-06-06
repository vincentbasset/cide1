<?php
	include("header.php");
?>
<script src="javascript.js"></script>
		<div class="centre" >
			<h2>Inscrivez-vous</h2>
			<form name="inscription" method="post" action="traitement.php" enctype="multipart/form-data">
					<p>
						<input type="varchar" name="nom" placeholder="Entrez votre nom" required>
						</br>
						<input type="varchar" name="prenom" placeholder="Entrez votre prénom" required>
						</br>
						<label for="date">Votre date de naissance: </label>
						<input type="date" name="date"required>
						</br>
						<input type="email" name="mail" placeholder="Entrez votre e-mail" required>
						</br>
						<label for="photo">Ajouter une photo de profil:</label>
						<input type="file" name="photo" accept="image/gif, image/jpeg, image/png">
						</br>
						<select name="statut" onchange="javascript:checkStatut();" required>
							<option value="">Statut</option>
							<option value="Administration">Administration</option>
							<option value="Professeur">Professeur</option>
							<option value="Technique">Technique</option>
							<option value="etudiant">Etudiant</option>
							<option value="Ancien">Ancien</option>
						</select>
						</br>
						<select name="filiere" >
							<option value="">Filière</option>
							<option value="Textile">Ingénieur textile et fibres</option>
							<option value="Mécanique">Ingénieur mécanique</option>
							<option value="Automatique">Ingénieur automatique et systèmes embarqués</option>
							<option value="Informatique">Ingénieur informatique et réseau</option>
							<option value="Fip">Ingénieur génie industriel - système de production</option>
							<option value="Prépa">Cycle post-bac intégré</option>
							<option value="Master-automatique">Master automatique et informatique industrielle</option>
							<option value="Master-mécanique">Master mécanique</option>
							<option value="Master-cge">Master CGE ingénierie textile</option>
						</select>
						</br>
						<select name="annee" >
							<option value="">Annee</option>
							<option value="1A">1A</option>
							<option value="2A">2A</option>
							<option value="3A">3A</option>
						</select>
						<script>
							document.forms["inscription"]["filiere"].style.display='none';
							document.forms["inscription"]["annee"].style.display='none';
						</script>
						</br>
						<input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
						</br>
						<input type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
						</br>
						<a href="cgu.php" target="_blank">Conditions générales d'utilisation</a>
						<input type="checkbox" name="cgu" required>
						<label for="cgu">J'ai lu et accepte les conditions générales d'utilisation</label>
						</br>
						<input type="submit" value="Inscription" name="envoyer" onmouseover="javascript:check();" />
					</p>
			</form>
		</div>
	</body>
</html>