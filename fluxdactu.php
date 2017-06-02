<?php
	$date = $bdd -> query("select getdate() as currentdatetime");
	$reponse = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id  order by datepost desc");
	$reponse2 = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id inner join appartient on utilisateur.id=appartient.idUtil inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id ) ORDER BY datepost DESC ");
?>
			
			<?php
			echo "<div class=\"centre\">";
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