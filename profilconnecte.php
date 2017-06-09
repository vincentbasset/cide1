<?php
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
	$reponse2 = $bdd -> query("SELECT * FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom LIMIT 3");
?>
	<div class="col-sm-1 col-perso" id="styleprofil">
		<h2>Mon profil</h2>
		<p>
			<div>
				<?php
					$pdonnees=$reponse->fetch();
					echo'
					<img class="img-circle" src="'.htmlspecialchars($pdonnees["photo"]).'" title="'.htmlspecialchars($pdonnees["nom"]).' '.htmlspecialchars($pdonnees["prenom"]).'" alt="'.htmlspecialchars($pdonnees["nom"]).' '.htmlspecialchars($pdonnees["prenom"]).'" width="225px" height="225px" />
					</br>			
					</div>
					<div>
						<p>
						<h3>'.htmlspecialchars($pdonnees["nom"]).'</h3>
						
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
						</br>
						<span id="bleu">description:</span> '.htmlspecialchars($pdonnees["description"]).'
						</br>
						</br>
					</p>';
					
					?>
				<form method="post" action="traitementdescription.php">
					<textarea name="description" rows="9" cols="75" placeholder="Modifier votre description"></textarea>
					</br>
					</br>
					</br>
					<input type="submit" name="envoyer" value="Changer la description"/>
				</form>
				</br>
				</br>
				<form method="post" action="traitementphoto.php" enctype="multipart/form-data">
					<span id="bleu"><label for="photo">Modifier photo de profil:</label></span>
					</br>
					<input type="file" name="photo" accept="image/gif, image/jpeg, image/png">
					</br>
					</br>
					<input type="submit" name="envoyer" value="Changer la photo"/>
				</form>
				</br>
				</br>
				<a href="changermdp.php">Changer de mot de passe</a>
				</br>
				</br>
				<p>
					<span>Groupes:</span>
					</br>
					
					<?php
					while($pdonnee=$reponse2->fetch()){
					echo'<span>'.htmlspecialchars($pdonnee["nom"]).'</span></br>';
					}
					?>
				...</p>
				</br>
				</br>
				<p>
					<?php
					echo'<span id="bleu"><a href="'.htmlspecialchars($pdonnees["cv"]).'" target="_blank" >Mon CV</a></span></br>';
					?>
				</p>
				</br>
				<form method="post" action="traitementcv.php" enctype="multipart/form-data">
					<span id="bleu"><label for="cv">Ajouter une photo de CV:</label></span>
					</br>
					<input type="file" name="cv" accept="application/pdf">
					</br>
					</br>
					<input type="submit" name="envoyer" value="Changer le CV"/>
				</form>
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