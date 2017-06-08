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
			echo "<div class=\"col-sm-7 col-perso\">";
				$don=$reponse3->fetchAll();
				while($donnees=$reponse->fetch()){
                echo "
					<div class=\"media\">
						<div class=\"media-left\">
							<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
						</div>
						<div class=\"media-body\">
							<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a>
							<small><i>";
							if($donnees["idGroupe"]!=0){
								$reponse4->execute(['idg' =>$donnees["idGroupe"]]);
								$rep4=$reponse4->fetch();			
								echo" dans <a href=\"groupe.php?id=".$rep4["id"]."\">".$rep4["nom"]."</a>";
							}
							else{
								$reponse5->execute(['idu' =>$donnees["idUtilmur"]]);
								$rep5=$reponse5->fetch();
								echo" à propos de <a href=\"murprofil.php?id=".$rep5["id"]."\">".$rep5["nom"]." ".$rep5["prenom"]."</a>";
							}
							echo"
							</i></small></h4>";
							if (preg_match("/www\.youtube\.com/",$donnees["url"])===1||preg_match("/youtu\.be/",$donnees["url"])===1){
								$vid=preg_replace("/.*[=\/]/","",$donnees["url"]);
								echo '<iframe width="420" height="315"
								src="https://www.youtube.com/embed/'.$vid.'">
								</iframe><br/>';
							} else if (preg_match("/.jpg$/",$donnees["url"]) === 1 || preg_match("/.png$/",$donnees["url"]) === 1 || preg_match("/.gif$/",$donnees["url"]) === 1 || preg_match("/.jpeg$/",$donnees["url"]) === 1){
								echo "<img src=\"".htmlspecialchars($donnees["url"])."\" width=\"100%\" /></br>";
							}else{
								echo "<a href=".htmlspecialchars($donnees["url"]).">".htmlspecialchars($donnees["url"])."</a>";
							}
							echo "<p>".nl2br(htmlspecialchars($donnees["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y \à G\hi")."</div>";
				
				foreach($don as $donnee){
					if($donnees["postid"]==$donnee["idPost"]){
						echo"<hr>
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donnee["photo"])."\" title=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" alt=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" width=\"50px\" height=\"50px\" />
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnee["id"])."\">".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."</a></h4>
								<p>".nl2br(htmlspecialchars($donnee["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnee["datepost"])), "j/m/y \à G\hi")."</div>
							</div>
						</div>";
					}
				
				}
				
				
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donnees["postid"])."\">
						<label for=\"message\"></label> 
						<textarea name=\"message\" cols=\"90\" rows=\"4\" placeholder=\"Laisse un message !\"></textarea><br/>					
					<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</form>
					
					</div>
					<hr>
					</div>";
						
				}
				
				echo "</div>";
				
				echo "<div class=\"col-sm-3 col-perso\">";
				while($donnees=$reponse2->fetch()){
					if($donnees["importance"] && $donnees["droit"]!="membre"){
						echo "
							<div class=\"media\">
								<div class=\"media-left\">
									<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
								</div>
								<div class=\"media-body\">
									<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a>
									<small><i>";
									$reponse4->execute(['idg' =>$donnees["idGroupe"]]);
									$rep4=$reponse4->fetch();			
									echo"dans <a href=\"groupe.php?id=".$rep4["id"]."\">".htmlspecialchars($rep4["nom"])."</a>";
									echo "</i></small></h4>";
									echo "<p>".nl2br(htmlspecialchars($donnees["message"]))."</p>
										<small><i>Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y G\hi")."</i></small>										
								</div>
							</div>";
					}
				}
				echo"</div>";
			?>

		

