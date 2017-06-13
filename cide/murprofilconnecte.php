<?php
	$reponse = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil");
    $reponse -> execute(['idprofil'=>$_GET['id']]);
	$reponse2 = $bdd -> prepare("SELECT * FROM utilisateur WHERE id=:idprofil ");
    $reponse2 -> execute(['idprofil'=>$_GET['id']]);
	$reponse3 = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idUtilmur=:idprofil order by datepost desc");
    $reponse3 -> execute(['idprofil'=>$_GET['id']]);
	$reponse4 = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
	$reponse4 -> execute();
?>

<script>
	$(document).ready(function(){
		$(".cache").click(function(){
			$(this).find(".cache2").toggle(700);
		});
	});
</script>
	
<?php
	$_SESSION['url']=$newurl;
	echo "<div class=\"col-sm-7 col-perso\">";
		while($donneesutil=$reponse->fetch()){
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donneesutil["photo"])."\" title=\"".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."\" alt=\"".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."\" width=\"90\" height=\"90\" />
					</div>
					<div class=\"media-body\">
					<h3 class=\"media-heading\">".htmlspecialchars($donneesutil["nom"])." ".htmlspecialchars($donneesutil["prenom"])."</h3>";
		}			
		echo "
			<form method=\"post\" action=\"traitementmurp.php?id=".htmlspecialchars($_GET['id'])."\" enctype=\"multipart/form-data\">
				<p>
                <label for=\"photo\">Poste un document</label>
                <input type=\"file\" id=\"photo\" name=\"photo\">
                <input type=\"text\" name=\"lien\" placeholder=\"Poste un lien vers une video Youtube, un image ou un site web\">		
				<label for=\"textgroupe\"></label> 
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
			$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donneespost['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donneespost['postid']]);
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donneespost["photo"])."\" title=\"".htmlspecialchars($donneespost["prenom"])." ".htmlspecialchars($donneespost["nom"])."\" alt=\"".htmlspecialchars($donneespost["prenom"])." ".htmlspecialchars($donneespost["nom"])."\" width=\"60\" height=\"60\" />
					</div>
					<div class=\"media-body\">
						<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneespost["id"])."\">".htmlspecialchars($donneespost["prenom"])." ".htmlspecialchars($donneespost["nom"])."</a></h4>";
						if (preg_match("/www\.youtube\.com/",$donneespost["url"])===1||preg_match("/youtu\.be/",$donneespost["url"])===1){
							$vid=preg_replace("/.*[=\/]/","",$donneespost["url"]);
							echo '<iframe width="420" height="315"
							src="https://www.youtube.com/embed/'.$vid.'">
							</iframe></br>';
						} else if (preg_match("/.jpg$/",$donneespost["url"]) === 1 || preg_match("/.png$/",$donneespost["url"]) === 1 || preg_match("/.gif$/",$donneespost["url"]) === 1 ||    preg_match("/.jpeg$/",$donneespost["url"]) === 1){
							echo "<img src=\"".htmlspecialchars($donneespost["url"])."\" class=\"url\" alt=\"url partagé\"  /><br/>";
						}else{
							echo "<a href=".htmlspecialchars($donneespost["url"]).">".htmlspecialchars($donneespost["url"])."</a>";
						}
                        if (preg_match("/.jpg$/",$donneespost["fichier"]) === 1 || preg_match("/.png$/",$donneespost["fichier"]) === 1 || preg_match("/.gif$/",$donneespost["fichier"]) === 1 ||    preg_match("/.jpeg$/",$donneespost["fichier"]) === 1){
							echo "<img src=\"".htmlspecialchars($donneespost["fichier"])."\" class=\"fichier\" alt=\"fichier partagé\" /><br/>";
						}else if (!is_null($donneespost["fichier"])){
							echo "<a href=\"".htmlspecialchars($donneespost["fichier"])."\">Télécharge le fichier joint ".htmlspecialchars(basename($donneespost["fichier"]))."</a>";
						}
						echo "<p>".nl2br(htmlspecialchars($donneespost["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespost["datepost"])), "j/m/y \à G\hi")."</div>";
						$_SESSION['url']=$newurl;
							echo'<form class="myform" method="post" action="traitementlike.php?id='.$donneespost["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form class="myform" method="post" action="traitementdislike.php?id='.$donneespost["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form>
								<br>';
	
	

				echo "<div class=\"cache\">
						<span>Voir commentaires</span>
							<div class=\"cache2\" style=\"display:none\">";


	
				foreach($donneesreponses as $donneerep){
					if($donneespost["postid"]==$donneerep["idPost"]){
						$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donneerep['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donneerep['postid']]);
					
						echo"<hr>
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donneerep["photo"])."\" title=\"".htmlspecialchars($donneerep["prenom"])." ".htmlspecialchars($donneerep["nom"])."\" alt=\"".htmlspecialchars($donneerep["nom"])." ".htmlspecialchars($donneerep["prenom"])."\" width=\"50\" height=\"50\" />
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneerep["id"])."\">".htmlspecialchars($donneerep["prenom"])." ".htmlspecialchars($donneerep["nom"])."</a></h4>
								<p>".nl2br(htmlspecialchars($donneerep["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneerep["datepost"])), "j/m/y \à G\hi")."</div>
							</div>
						</div>";
						echo'<form class="myform" method="post" action="traitementlike.php?id='.$donneerep["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form class="myform" method="post" action="traitementdislike.php?id='.$donneerep["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote" alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form>
								<br>';
					}
				
				}
				

					echo"Fin des commentaires</div>
				</div>";
				
				
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donneespost["postid"])."\">
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
						<a href=\"".htmlspecialchars($donneesutil["cv"])."\" target=\"_blank\">CV de ".htmlspecialchars($donneesutil["prenom"])." ".htmlspecialchars($donneesutil["nom"])."</a><br/><br/>"
						.htmlspecialchars($donneesutil["description"])."<br/><br/>
						Date de naissance: <br/>".htmlspecialchars($donneesutil["datenaissance"])."
						
						</p>
					</div>
				</div>";
?>

			
