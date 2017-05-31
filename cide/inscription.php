<?php
	include("header.php");
?>
<script src="javascript.js"></script>
		<div class="centre" >
			<h2>Inscrivez-vous</h2>
			<form name="inscription" method="post" action="traitement.php" >
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
						<a href="photo.php">Ajoutez une photo</a>
						</br>
						<select name="statut" onchange="javascript:checkStatut();" required>
							<option value="">Statut</option>
							<option value="administration">Administration</option>
							<option value="professeur">Professeur</option>
							<option value="technique">Technique</option>
							<option value="etudiant">Etudiant</option>
							<option value="ancien">Ancien</option>
						</select>
						</br>
						<select name="filiere" >
							<option value="">Filière</option>
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
						<select name="annee" >
							<option value="">Annee</option>
							<option value="1A">1A</option>
							<option value="2A">2A</option>
							<option value="3A">3A</option>
						</select>
						<script>
							var statut = document.forms["inscription"]["statut"].value
							if(statut != etudiant){
								document.forms["inscription"]["filiere"].style.display='none';
								document.forms["inscription"]["annee"].style.display='none';
							}
						</script>
						</br>
						<input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
						</br>
						<input type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
						</br>
						<a href="cgu.php">Conditions générales d'utilisation</a>
						<input type="checkbox" name="cgu" required>
						<label for="cgu">J'ai lu et accepte les conditions générales d'utilisation</label>
						</br>
						<input type="submit" value="Inscription" name="envoyer" onmouseover="javascript:check();" />
						<script>
							function filiere(){
								alert("bonjour");
								/*var statut = document.forms["inscription"]["statut"].value;
								if(statut != "etudiant"){
									document.forms["inscription"]["filiere"].style.display='none';
								}
								else{
									document.forms["inscription"]["filiere"].style.display='block';
								}*/
									
							}
						</script>
					</p>
			</form>
		</div>
	</body>
</html>