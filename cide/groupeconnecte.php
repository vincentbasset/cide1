<?php
		$reponse = $bdd -> query("SELECT groupe.* FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom");
		$reponse2 = $bdd -> query("SELECT * FROM groupe where id not in (select groupe.id from utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom)");
		
?>
	<div class="centregroupe">
		<h2>Mes groupes</h2>
			<?php
			while($donnees=$reponse->fetch()){
				echo '
				<p id="gnomliste">
				<a href="groupe.php?id='.htmlspecialchars($donnees["id"]).'">
					<span>
						<img src="'.htmlspecialchars($donnees["icone"]).'" title="'.htmlspecialchars($donnees["nom"]).'" alt="'.htmlspecialchars($donnees["nom"]).'" width="60px" height="60px" />
							<span id="gnomliste2">'.htmlspecialchars($donnees["nom"]).'</span>
					</span>
					</br>
					'.htmlspecialchars($donnees["description"]).'				
				</a>
				</p>
				';
			}
			?>
	</div>
	<div class="centregroupeinf">
		<h2>Rejoins un nouveau groupe!</h2>
			<?php
			while($donnees=$reponse2->fetch()){
				echo '
				<p>
				<a href="groupe.php?id='.htmlspecialchars($donnees["id"]).'">
					<span>
						<img src="'.htmlspecialchars($donnees["icone"]).'" title="'.htmlspecialchars($donnees["nom"]).'" alt="'.htmlspecialchars($donnees["nom"]).'" width="60px" height="60px" />
							'.htmlspecialchars($donnees["nom"]).'
					</span>
					</br>
					'.htmlspecialchars($donnees["description"]).'				
				</a>
				</p>
				';
			}
			?>
	</div>
	</body>
</html>
