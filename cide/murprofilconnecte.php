<?php
	$reponse = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil");
    $reponse -> execute(['idprofil'=>$_GET['id']]);
	$reponse2 = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil ");
    $reponse2 -> execute(['idprofil'=>$_GET['id']]);
	$reponse3 = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idUtilmur=:idprofil order by datepost desc");
    $reponse3 -> execute(['idprofil'=>$_GET['id']]);
	$reponse4 = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
?>
			<?php
			echo "<div class=\"centre\">";
			while($donnees=$reponse->fetch()){
				echo "

				<p class=\"centrep\">
				<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"90px\" height=\"90px\" />
				".$donnees["nom"]."
				".$donnees["prenom"]."
			</p>";
			}
			
			echo "
			<form method=\"post\" action=\"traitementmurp.php?id=".$_GET['id']."\">
			<p class=\"centrep\">
				<label for=\"message\"></label> 
				<textarea name=\"message\" cols=\"108\" rows=\"6\" placeholder=\"Laisse un message !\"></textarea>		
				<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>	
			</p>			
			</form></br>
			";
			
			$don=$reponse4->fetchAll();
			
			while($donnees=$reponse3->fetch()){
				echo "
					<p>
					</br><section class=\"pcentre\">
					<div class=\"entetepost\">
						<div class=\"enteteg\">
							<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"60px\" height=\"60px\" />
						</div>
						<div class=\"enteted\">
							<a href=\"murprofil.php?id=".$donnees["id"]."\">".$donnees["nom"]." ".$donnees["prenom"]."</a>    
							</br>
						</div>
					</div></br>
					<span class=\"message\">".$donnees["message"]."</span>
					<span class=\"date\">Posté le ".$donnees["datepost"]."</span>";
				
				foreach($don as $donnee){
				echo"<span class=\"rep\">";
					if($donnees["postid"]==$donnee["idPost"]){
						echo "
							<section class=\"rep2\">
								<div class=\"entetepost\">
									<div class=\"enteteg\">
										<img src=\"".$donnee["photo"]."\" title=\"".$donnee["nom"]." ".$donnee["prenom"]."\" alt=\"".$donnee["nom"]." ".$donnee["prenom"]."\" width=\"50px\" height=\"50px\" />
									</div>
									<div class=\"enteted\">
										<a href=\"murprofil.php?id=".$donnee["id"]."\">".$donnee["nom"]." ".$donnee["prenom"]."</a>      <!--lien vers le profil de la personne-->
									</div>
								</div>
								</br>
								<span class=\"message\">".$donnee["message"]."</span>
								<span class=\"date\">
									Posté le ".$donnee["datepost"]."
								</span>
							</section>";
					}
				}
				
				echo"<form method=\"post\" action=\"traitementrep.php?id=".$donnees["postid"]."\">
						<label for=\"message\"></label> 
						<textarea name=\"message\" cols=\"108\" rows=\"4\" placeholder=\"Laisse un message !\"></textarea>						
					<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</form>
					</span>
				</section></p>";		
			}
			
			echo"</div>";
			?>
	</body>
</html>
			
