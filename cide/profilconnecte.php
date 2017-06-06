<?php
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
	$reponse2 = $bdd -> query("SELECT * FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom LIMIT 3");
?>
	<div class="centreprofil">
		<h2>Mon profil</h2>
		<p>
			<div id="pgauche">
					<?php
					while($pdonnees=$reponse->fetch()){
					echo'
					<img src="'.htmlspecialchars($pdonnees["photo"]).'" title="'.htmlspecialchars($pdonnees["nom"]).' '.htmlspecialchars($pdonnees["prenom"]).'" alt="'.htmlspecialchars($pdonnees["nom"]).' '.htmlspecialchars($pdonnees["prenom"]).'" width="225px" height="225px" />
					</br>			
					</div>
					<div id="pdroit">
						<p>
						<h3>'.htmlspecialchars($pdonnees["nom"]).'</h3>
						</br>
						<h3>'.htmlspecialchars($pdonnees["prenom"]).'</h3>
					</div>
					</p>
					<p>
						<span id="bleu">date de naissance:</span> '.htmlspecialchars($pdonnees["datenaissance"]).'
						</br>
						</br>
						<span id="bleu">statut:</span> '.htmlspecialchars($pdonnees["statut"]).'</span>
						</br>
						</br>
						<span id="bleu">adresse mail:</span> '.htmlspecialchars($pdonnees["adresse"]).'
						</br>
						</br>';
					}
					?>
				<form method="post" action="traitementphoto.php" enctype="multipart/form-data">
					<span id="bleu"><label for="photo">Ajouter une photo de profil:</label></span>
					<input type="file" name="photo" accept="image/gif, image/jpeg, image/png">
					</br>
					<input type="submit" name="envoyer" value="Changer la photo"/>
				</form>
				</br>
				<a href="changermdp.php">changer de mot de passe</a>
				</br>
				<p>
					<span id="bleu">groupes:</span>
					</br>
					
					<?php
					while($pdonnee=$reponse2->fetch()){
					echo'<span id="glisteprofil">'.htmlspecialchars($pdonnee["nom"]).'</span></br>';
					}
					?>
				</p>
				</br>
				<a href="cgu.php" target="_blank">Conditions générales d'utilisation</a><br/><br/>
				<a href="about.php" target="_blank">A propos</a><br/><br/>
				<form method="post" action="desinscription.php">
					<input type="submit" name="envoyer" value="Se désinscrire" />
				<form>
			</p>
		</div>

	</body>
</html>