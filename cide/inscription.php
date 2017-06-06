<?php
	include("header.php");
?>
<script src="javascript.js"></script>
		<div class="centreform" >
			<h2>Inscrivez-vous</h2>
			<form name="inscription" method="post" action="traitement.php" enctype="multipart/form-data">
					<p>
						</br>
						<input class="champinscr" type="varchar" name="nom" placeholder="Entrez votre nom" required>
						</br>
						</br>
						<input class="champinscr" type="varchar" name="prenom" placeholder="Entrez votre prénom" required>
						</br>
						</br>
						<label for="date">Votre date de naissance: </label>
						<input class="champinscr" type="date" name="date"required>
						</br>
						</br>
						<input class="champinscr" type="email" name="mail" placeholder="Entrez votre e-mail" required>
						</br>
						</br>
						<label for="photo">Ajouter une photo de profil:</label>
						<input type="file" name="photo" accept="image/gif, image/jpeg, image/png">
						</br>
						</br>
						<select  class="champinscr" name="statut" onchange="javascript:checkStatut();" required>
							<option value="">Statut</option>
							<option value="Administration">Administration</option>
							<option value="Professeur">Professeur</option>
							<option value="Technique">Technique</option>
							<option value="etudiant">Etudiant</option>
							<option value="Ancien">Ancien</option>
						</select>
						</br>
						</br>
						<select class="champinscr" name="filiere">
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
						<select class="champinscr" name="annee" >
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
						<input class="champinscr" type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
						</br>
						</br>
						<input class="champinscr" type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
						</br>
						</br>
						<a href="cgu.php" target="_blank">Conditions générales d'utilisation</a>
						</br>
						<input type="checkbox" name="cgu" required>					
						<label for="cgu">J'ai lu et accepte les conditions générales d'utilisation</label>
						</br>
						</br>
						<input type="submit" value="Inscription" name="envoyer" onmouseover="javascript:check();" />
						</br>
						</br>
						</br>
						</br>
					</p>
			</form>
		</div>
	</body>
</html>