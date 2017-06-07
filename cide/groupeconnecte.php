<?php
		$reponse = $bdd -> query("SELECT groupe.* FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom");
		$reponse2 = $bdd -> query("SELECT * FROM groupe where id not in (select groupe.id from utilisateur inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id  WHERE utilisateur.id=".$_SESSION['id']." ORDER BY groupe.nom)");
?>
	<div class="col-sm-1 col-perso">
		<h2>Mes groupes</h2>
		</br>
		</br>
			<?php
			while($donnees=$reponse->fetch()){
				echo '
					<a href="groupe.php?id='.htmlspecialchars($donnees["id"]).'">
						<div class="media">
							<div class="media-left">
								<img class="img-circle" src="'.htmlspecialchars($donnees["icone"]).'" title="'.htmlspecialchars($donnees["nom"]).'" alt="'.htmlspecialchars($donnees["nom"]).'" width="80px" height="80px" />
							</div>
							<div class="media-body lgroupe">
							<h4 class="media-heading lgroupe">'.htmlspecialchars($donnees["nom"]).'</h4>
						
						<p>'.htmlspecialchars($donnees["description"]).'</p>
						</a>
					<hr>';
				
			}
			?>
		<hr>
		<h2>Rejoins un nouveau groupe!</h2>
			</br>
			</br>
			</br>
			<?php
			while($donnees=$reponse2->fetch()){
				echo '
					<a href="groupe.php?id='.htmlspecialchars($donnees["id"]).'">
						<div class="media">
							<div class="media-left">
								<img class="img-circle" src="'.htmlspecialchars($donnees["icone"]).'" title="'.htmlspecialchars($donnees["nom"]).'" alt="'.htmlspecialchars($donnees["nom"]).'" width="80px" height="80px" />
							</div>
							<div class="media-body lgroupe">
							<h4 class="media-heading lgroupe">'.htmlspecialchars($donnees["nom"]).'</h4>
						<p>'.htmlspecialchars($donnees["description"]).'</p>
						<hr>
					</a>';
			}
			?>
	</div>
</div>
</body>
</html>
