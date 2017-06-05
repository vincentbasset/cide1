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
					<img src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"90px\" height=\"90px\" />
					<span id=\"pentete\">".htmlspecialchars($donnees["nom"])."
					".htmlspecialchars($donnees["prenom"])."</span>
				</p>";
			}
			
			echo "
			<form method=\"post\" action=\"traitementmurp.php?id=".htmlspecialchars($_GET['id'])."\">
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
							<img src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
						</div>
						<div class=\"enteted\">
							<a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a>    
							</br>
						</div>
					</div></br>
					<span class=\"message\">".htmlspecialchars($donnees["message"])."</span>
					<span class=\"date\">Posté le ".htmlspecialchars($donnees["datepost"])."</span>";
				
				foreach($don as $donnee){
				echo"<span class=\"rep\">";
					if($donnees["postid"]==$donnee["idPost"]){
						echo "
							<section class=\"rep2\">
								<div class=\"entetepost\">
									<div class=\"enteteg\">
										<img src=\"".htmlspecialchars($donnee["photo"])."\" title=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" alt=\"".htmlspecialchars($donnee["nom"]." ".htmlspecialchars($donnee["prenom"])."\" width=\"50px\" height=\"50px\" />
									</div>
									<div class=\"enteted\">
										<a href=\"murprofil.php?id=".htmlspecialchars($donnee["id"])."\">".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."</a>      <!--lien vers le profil de la personne-->
									</div>
								</div>
								</br>
								<span class=\"message\">".htmlspecialchars($donnee["message"])."</span>
								<span class=\"date\">
									Posté le ".htmlspecialchars($donnee["datepost"])."
								</span>
							</section>";
					}
				}
				
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donnees["postid"])."\">
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
			
