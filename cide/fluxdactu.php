<?php
	$date = $bdd -> query("select getdate() as currentdatetime");
	
	$reponse = $bdd -> query("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id
							WHERE post.idPost=0 order by datepost desc");
								
	$reponse2 = $bdd -> query("SELECT * FROM post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id
							WHERE groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id ) ORDER BY datepost DESC ");
	
	$reponse3 = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
	
	$reponse4 = $bdd -> prepare("SELECT nom,id FROM  groupe WHERE groupe.id = :idg");
	
	$reponse5 = $bdd -> prepare("SELECT nom,prenom,id FROM  utilisateur WHERE utilisateur.id = :idu");
	
	
?>		
			<?php
			echo "<div class=\"centre\">";
				$don=$reponse3->fetchAll();
				while($donnees=$reponse->fetch()){
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
					<span>";
					if($donnees["idGroupe"]!=0){
						$reponse4->execute(['idg' =>$donnees["idGroupe"]]);
						$rep4=$reponse4->fetch();			
						echo"<span class=\"entetedd\"> dans <a href=\"groupe.php?id=".$rep4["id"]."\">".$rep4["nom"]."</a></span>";
					}
					else{
						$reponse5->execute(['idu' =>$donnees["idUtilmur"]]);
						$rep5=$reponse5->fetch();
						echo"<span class=\"entetedd\"> à propos de <a href=\"murprofil.php?id=".$rep5["id"]."\">".$rep5["nom"]." ".$rep5["prenom"]."</a></span>";
					}
					
					echo"
					</span>
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
				echo "</div><div class=\"droit\">";
				while($donnees=$reponse2->fetch()){
					if($donnees["importance"] && $donnees["droit"]!="membre"){
						echo "<p>
							<span>
								<img src=\"".$donnees["photo"]."\" title=\"".$donnees["nom"]." ".$donnees["prenom"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"50px\" height=\"50px\" />
								<a href=\"murprofil.php?id=".$donnees["id"]."\">".$donnees["nom"]." ".$donnees["prenom"]."</a> ";  
								$reponse4->execute(['idg' =>$donnees["idGroupe"]]);
								$rep4=$reponse4->fetch();			
								echo" dans ".$rep4["nom"]."";
								echo"</span></br>
								".$donnees["message"]."
								<span class=\"date\">Posté le ".$donnees["datepost"]. " </span>
						</p>";
					}
				}
				echo "</div>";
			?>

		
	</body>
</html>
