<?php
	include("header.php");
?>
<script src="javascript.js"></script>
		<div class="centre">
			<h2>Inscrivez-vous</h2>
			<form method="post" action="traitement.php">
					<p>
						<input type="varchar" name="nom" placeholder="Entrez votre nom" required>
						</br>
						<input type="varchar" name="prenom" placeholder="Entrez votre prénom" required>
						</br>
						<label for="date">Votre date de naissance: </label>
						<input type="date" name="date"/>
						</br>
						<input type="email" name="mail" placeholder="Entrez votre e-mail" required>
						</br>
						<a href="photo.php">Ajoutez une photo</a>
						</br>
						<select name="statut">
							<option value="administration">Administration</option>
							<option value="professeur">Professeur</option>
							<option value="technique">Technique</option>
							<option value="etudiant">Etudiant</option>
							<option value="ancien">Ancien</option>
						</select>
						</br>
						<select name="filiere" onmouseover="javascript:check();">
							<option value="textile">Ingénieur textile et fibres</option>
							<option value="mecanique">Ingénieur mécanique</option>
							<option value="automatique">Ingénieur automatique et systèmes embarqués</option>
							<option value="informatique">Ingénieur informatique et réseau</option>
							<option value="fip">Ingénieur génie industriel - système de production</option>
							<option value="prepa">Cycle post-bac intégré</option>
							<option value="master automatique">Master automatique et informatique industrielle</option>
							<option value="master mecanique">Master mécanique</option>
							<option value="master cge">Master CGE ingénierie textile</option>
						</select>
						</br>
						<input type="password" name="mot de passe" placeholder="Entrez votre mot de passe" required>
						
						</br>
						<input type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
						</br>
						<a href="cgu.php">Conditions générales d'utilisation</a>
						<input type="checkbox" name="cgu" required>
						<label for="cgu">J'ai lu et accepte les conditions générales d'utilisation</label>
						</br>
						<script>
							var input = document.getElementById("cgu");
							alert(input.value);
						</script>
						<input type="submit" value="Inscription" name="envoyer" />
					</p>
			</form>
		</div>
	</body>
</html>