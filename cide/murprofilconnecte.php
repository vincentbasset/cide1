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
	echo "<div class=\"col-sm-7 col-perso\">";
		while($donneesutil=$reponse->fetch()){
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donneesutil["photo"])."\" title=\"".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."\" alt=\"".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."\" width=\"90px\" height=\"90px\" />
					</div>
					<div class=\"media-body\">
					<h3 class=\"media-heading\">".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."</h3>";
		}			
		echo "
			<form method=\"post\" action=\"traitementmurp.php?id=".htmlspecialchars($_GET['id'])."\">
				<p>
                <label for=\"lien\"></label> 
                <input type=\"varchar\" name=\"lien\" placeholder=\"insére un lien ici\">		
				<label for=\"message\"></label> 
				<textarea id=\"textgroupe\" name=\"message\" cols=\"108\" rows=\"6\" placeholder=\"Laisse un message !\"></textarea><br/>	
				<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>	
				</p>			
			</form>
			<hr>
			<hr>
			</div>
			</div>";
			
		$donneesreponses=$reponse4->fetchAll();
		while($donneespost=$reponse3->fetch()){
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donneespost["photo"])."\" title=\"".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."\" alt=\"".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."\" width=\"60px\" height=\"60px\" />
					</div>
					<div class=\"media-body\">
						<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneespost["id"])."\">".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."</a></h4>";
						if (preg_match("/www\.youtube\.com/",$donneespost["url"])===1||preg_match("/youtu\.be/",$donneespost["url"])===1){
							$vid=preg_replace("/.*[=\/]/","",$donneespost["url"]);
							echo '<iframe width="420" height="315"
							src="https://www.youtube.com/embed/'.$vid.'">
							</iframe></br>';
						} else if (preg_match("/.jpg$/",$donneespost["url"]) === 1 || preg_match("/.png$/",$donneespost["url"]) === 1 || preg_match("/.gif$/",$donneespost["url"]) === 1 ||    preg_match("/.jpeg$/",$donneespost["url"]) === 1){
							echo "<img class=\"img\" src=\"".htmlspecialchars($donneespost["url"])."\"  /><br/>";
						}else{
							echo "<a href=".htmlspecialchars($donneespost["url"]).">".htmlspecialchars($donneespost["url"])."</a>";
						}
						echo "<p>".nl2br(htmlspecialchars($donneespost["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespost["datepost"])), "j/m/y \à G\hi")."</div>";
				
				foreach($donneesreponses as $donneerep){
					if($donneespost["postid"]==$donneerep["idPost"]){
						echo"<hr>
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donneerep["photo"])."\" title=\"".htmlspecialchars($donneerep["nom"])." ".htmlspecialchars($donneerep["prenom"])."\" alt=\"".htmlspecialchars($donneerep["nom"])." ".htmlspecialchars($donneerep["prenom"])."\" width=\"50px\" height=\"50px\" />
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneerep["id"])."\">".htmlspecialchars($donneerep["nom"])." ".htmlspecialchars($donneerep["prenom"])."</a></h4>
								<p>".nl2br(htmlspecialchars($donneerep["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneerep["datepost"])), "j/m/y \à G\hi")."</div>
							</div>
						</div>";
					}
				
				}
				

				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donneespost["postid"])."\">
						<label for=\"message\"></label> 
						<textarea name=\"message\" cols=\"108\" rows=\"4\" placeholder=\"Laisse un message !\"></textarea>						
						<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</form>
					<hr>
					</div> 
					</div>";
			}
			
	echo"</div>";	
			
			echo "<div class=\"col-sm-3 col-perso\">
					<div class=\"media\">";
					$donneesutil = $reponse2->fetch();
					echo"<p>Statut:<br/>".htmlspecialchars($donneesutil["statut"])."<br/><br/>
						<a href=\"".htmlspecialchars($donneesutil["cv"])."\" target=\"_blank\">CV de ".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."</a><br/><br/>"
						.htmlspecialchars($donneesutil["description"])."<br/><br/>
						Date de naissance: <br/>".htmlspecialchars($donneesutil["datenaissance"])."
						</p>
					</div>
				</div>";
?>

			
