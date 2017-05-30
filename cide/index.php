<?php
	include("header.php");
	$date = $bdd -> query("select getdate() as currentdatetime");
	$reponse = $bdd -> query("SELECT * FROM post inner join ecrit on post.id=ecrit.idPost inner join utilisateur on ecrit.idUtil=utilisateur.id order by datepost desc");
	$reponse2 = $bdd -> query("SELECT * FROM post inner join ecrit on post.id=ecrit.idPost inner join utilisateur on ecrit.idUtil=utilisateur.id order by datepost desc");
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
					if($donnees["importance"]){
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