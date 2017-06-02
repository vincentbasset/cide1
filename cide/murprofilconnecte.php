<?php

	$reponse = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil");
    $reponse -> execute(['idprofil'=>$_GET['id']]);
	$reponse2 = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil");
    $reponse2 -> execute(['idprofil'=>$_GET['id']]);
	$reponse3 = $bdd -> prepare("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idUtilmur=:idprofil");
    $reponse3 -> execute(['idprofil'=>$_GET['id']]);	
	

	
?>
			<?php
			echo "<div class=\"centre\">";
			while($donnees=$reponse->fetch()){
				echo "
				<p>
				<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"70px\" height=\"70px\" />
				".$donnees["nom"]."
				".$donnees["prenom"]."
			</p>";
			}
			
			echo "
			<form method=\"post\" action=\"traitementmurp.php?id=".$_GET['id']."\">
			<p>
				<label for=\"message\"></label> 
				<textarea name=\"message\" cols=\"108\" rows=\"6\" placeholder=\"Laisse un message!\"></textarea>		
				<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>	
			</p>			
			</form></br>
			</br>";
			
			
			
			while($donnees=$reponse3->fetch()){
                echo "<p>
                    <span>
                    <img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"50px\" height=\"50px\" />
                    <a href=\"murprofil.php?id=".$donnees["id"]."\">".$donnees["nom"]." ".$donnees["prenom"]."</a>      <!--lien vers le profil de la personne-->
                    </span></br>
                    ".$donnees["message"]."
                    <span class=\"date\">Posté le ".$donnees["datepost"]."</span>
                    </p>";

				}
			?>
			
	</body>
</html>