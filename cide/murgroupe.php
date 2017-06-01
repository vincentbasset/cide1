<?php
    include("header.php");
	$reponse = $bdd -> query("SELECT * FROM post inner join ecrit on post.id=ecrit.idPost inner join utilisateur on ecrit.idUtil=utilisateur.id WHERE utilisateur.id=".$_SESSION['id']." order by datepost desc");
	$reponse2 = $bdd -> query("SELECT * FROM post inner join ecrit on post.id=ecrit.idPost inner join utilisateur on ecrit.idUtil=utilisateur.id inner join appartient on utilisateur.id=appartient.idUtil inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id WHERE appartient.idUtil=".$_SESSION['id'].") ORDER BY datepost DESC ");
	$reponse3 = $bdd -> query("SELECT * FROM groupe WHERE groupe.id=1");
	$reponse4 = $bdd -> query("SELECT * FROM appartient WHERE idGroupe=1 AND idUtil=".$_SESSION['id']." ");
	
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
							<input type=\"checkbox\" name=\"important\" required>
							<label for=\"important\">important</label>
							<input type=\"checkbox\" name=\"public\" required>
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