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
					<img src="'.$pdonnees["photo"].'" title="'.$pdonnees["nom"].' '.$pdonnees["prenom"].'" alt="'.$pdonnees["nom"].' '.$pdonnees["prenom"].'" />
					</br>			
					</div>
					<div id="pdroit">
						<p>
						<h3>'.$pdonnees["nom"].'</h3>
						</br>
						<h3>'.$pdonnees["prenom"].'</h3>
					</div>
					</p>
					<p>
						date de naissance: '.$pdonnees["datenaissance"].'
						</br>
						</br>
						statut: '.$pdonnees["statut"].'
						</br>
						</br>
						adresse mail: '.$pdonnees["adresse"].'
						</br>
						</br>';
					}
					?>
				changer de mot de passe
				</br>
				</br>
					groupe:
					<ul>
					<?php
					while($pdonnee=$reponse2->fetch()){
					echo'<li>'.$pdonnee["nom"].'</li></br>';
					}
					?>
					</ul>
				</br>
			</p>
		</div>

	</body>
</html>
