<?php
	$reponse = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE post.idGroupe = :idgroupe order by datepost desc");
    $reponse->execute(['idgroupe' =>$_GET['id']]);
	$reponse2 = $bdd -> prepare("SELECT * FROM post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id WHERE post.idUtil=utilisateur.id AND groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.id=:idgroupe) ORDER BY datepost DESC ");
    $reponse2->execute(['idgroupe' =>$_GET['id']]);
	$reponse3 = $bdd -> prepare("SELECT * FROM groupe WHERE groupe.id=:idgroupe");
    $reponse3->execute(['idgroupe' =>$_GET['id']]);
	$reponse4 = $bdd -> prepare("SELECT * FROM appartient WHERE idGroupe=:idgroupe AND idUtil=:idutil ");
    $reponse4->execute(['idgroupe' =>$_GET['id'], 'idutil' => $_SESSION['id']]);
	$reponse5 = $bdd -> query("SELECT * FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
	$reponse6 = $bdd -> prepare("SELECT * FROM appartient WHERE idGroupe=:idgroupe AND idUtil=:idutil ");
    $reponse6->execute(['idgroupe' =>$_GET['id'], 'idutil' => $_SESSION['id']]);
	
?>
			<?php
			echo "<div class=\"centre\">";
			if (!$reponse4->rowcount()==0){
				echo "<form method=\"post\" action=\"traitementmurg.php?id=".htmlspecialchars($_GET['id'])."\">
					<p class=\"centrep\">";
						while($donnees=$reponse3->fetch()){
						echo "
						<img src=\"".$donnees["icone"]."\" title=\"".htmlspecialchars($donnees["nom"])."\" alt=\"".htmlspecialchars($donnees["nom"])."\" width=\"90px\" height=\"90px\" />
						<span id=\"pentete\">".htmlspecialchars($donnees["nom"])."</span></br>";}			
						echo "
						<label for=\"message\"></label> 
						<textarea name=\"message\" cols=\"108\" rows=\"6\" placeholder=\"Poste un message pour le groupe\"></textarea>";				
						while($donnees=$reponse4->fetch()){
							if($donnees["droit"]!="membre"){
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
				</form>";
			}
				$don=$reponse5->fetchAll();
				while($donnees=$reponse->fetch()){
					if (!$reponse4->rowcount()==0 || $donnees["visibilite"]==1){
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
										<img src=\"".htmlspecialchars($donnee["photo"])."\" title=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" alt=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" width=\"50px\" height=\"50px\" />
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
				}
				echo "</div><div class=\"droit\"></br>";
				if($reponse4->rowcount()==0){
					echo"
					<form method=\"post\" action=\"traitementrejoindreg.php?id=".htmlspecialchars($_GET['id'])."\">
						<input id=\"rejoindreg\" type=\"submit\"  value=\"Rejoindre\" name=\"rejoindre\">
					</form><br>";
				}
				else{
					echo"
					<form method=\"post\" action=\"traitementquitterg.php?id=".htmlspecialchars($_GET['id'])."\">
						<input id=\"rejoindreg\" type=\"submit\"  value=\"  Quitter  \" name=\"quitter\">
					</form><br>";
					while($donnees=$reponse6->fetch()){
						if($donnees["droit"]!="membre"){
                               			 	echo "<a href='Gestiong.php?id=".$_GET['id']."'>Gérer le groupe</a><br>";
                            			}
                   			}
				}
				while($donnees=$reponse2->fetch()){
					if((!$reponse4->rowcount()==0 || $donnees["visibilite"]==1) && $donnees["importance"]){
						echo "
						<div class=\"important\">
							<div class=\"entetepost\">
								<div class=\"enteteg\">
									<img src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
								</div>
								<div class=\"enteted\">								
									<a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a></br>
								</div>
							</div>
							</br>
							<span class=\"message2\">".htmlspecialchars($donnees["message"])."</span >
							<span class=\"date2\">Posté le ".htmlspecialchars($donnees["datepost"])."</span>
							</br>						
						</div>";
					}
				}
				echo "</div>";
			?>
	</body>
</html>
