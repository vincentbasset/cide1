<?php
	$reponse = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE post.idGroupe=1 order by datepost desc");
	$reponse2 = $bdd -> query("SELECT * FROM post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id WHERE post.idUtil=utilisateur.id AND groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.id=1) ORDER BY datepost DESC ");
	$reponse3 = $bdd -> query("SELECT * FROM groupe WHERE groupe.id=1");
	
?>
			<?php
			echo "<div class=\"centre\">
			<form method=\"post\" action=\"traitementmurg.php\">
				<p>";
					while($donnees=$reponse3->fetch()){
					echo "
					<img src=\"".$donnees["icone"]."\" title=\"".$donnees["nom"]."\" alt=\"".$donnees["nom"]."\" width=\"60px\" height=\"60px\" />
					<span id=\"mgroupe\">".$donnees["nom"]."</span></br>";}			
					echo "
					<label for=\"message\"></label> 
					<textarea name=\"message\" cols=\"108\" rows=\"6\" placeholder=\"Poste un message pour le groupe\"></textarea>";				
					while($donnees=$reponse4->fetch()){
						if($donnees["droit"]=="admin"){
							echo "
							<input type=\"checkbox\" name=\"important\" />
							<label for=\"important\">important</label>
							<input type=\"checkbox\" name=\"public\" />
							<label for=\"public\">public</label>";
						}
					}
					echo"
					<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>	
				</p>
			</form>
		";
				while($donnees=$reponse->fetch()){
					echo "<p>
						<span>
						<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"50px\" height=\"50px\" />
						<a href=\"profil.php\">".$donnees["nom"]." ".$donnees["prenom"]."</a>      <!--lien vers le profil de la personne-->
						</span></br>
						".$donnees["message"]."
						<span class=\"date\">Posté le ".$donnees["datepost"]."</span>
						</p>
						";
				}
				echo "</div><div class=\"droit\">";
				while($donnees=$reponse2->fetch()){
					if($donnees["importance"] && $donnees["droit"]!="membre"){
						echo "<p>
						<span>
						<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"50px\" height=\"50px\" />
						<a href=\"profil.php\">".$donnees["nom"]." ".$donnees["prenom"]."</a>      <!--lien vers le profil de la personne-->
						</span></br>
						".$donnees["message"]."
						<span class=\"date\">Posté le ".$donnees["datepost"]."</span>
						</p>";
					}
				}
				echo "</div>";
			?>
	</body>
</html>