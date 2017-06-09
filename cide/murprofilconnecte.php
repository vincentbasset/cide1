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
	$_SESSION['url']=$newurl;
	echo "<div class=\"col-sm-7 col-perso\">";
		while($donnees=$reponse->fetch()){
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"90px\" height=\"90px\" />
					</div>
					<div class=\"media-body\">
					<h3 class=\"media-heading\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</h3>";
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
			
		$don=$reponse4->fetchAll();
		while($donnees=$reponse3->fetch()){
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
					</div>
					<div class=\"media-body\">
						<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a></h4>";
						if (preg_match("/www\.youtube\.com/",$donnees["url"])===1||preg_match("/youtu\.be/",$donnees["url"])===1){
							$vid=preg_replace("/.*[=\/]/","",$donnees["url"]);
							echo '<iframe width="420" height="315"
							src="https://www.youtube.com/embed/'.$vid.'">
							</iframe></br>';
						} else if (preg_match("/.jpg$/",$donnees["url"]) === 1 || preg_match("/.png$/",$donnees["url"]) === 1 || preg_match("/.gif$/",$donnees["url"]) === 1 ||    preg_match("/.jpeg$/",$donnees["url"]) === 1){
							echo "<img src=\"".htmlspecialchars($donnees["url"])."\" width=\"100%\" /><br/>";
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
					$donnees2 = $reponse2->fetch();
					echo"<p>Statut:<br/>".htmlspecialchars($donnees2["statut"])."<br/><br/>
						<a href=\"".htmlspecialchars($donnees2["cv"])."\" target=\"_blank\">CV de ".htmlspecialchars($donnees2["nom"])." ".htmlspecialchars($donnees2["prenom"])."</a><br/><br/>"
						.htmlspecialchars($donnees2["description"])."<br/><br/>
						Date de naissance: <br/>".htmlspecialchars($donnees2["datenaissance"])."
						</p>
					</div>
				</div>";
?>

			
