<?php
	$reponse = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE post.idGroupe = :idgroupe order by datepost desc");
    $reponse->execute(['idgroupe' =>$_GET['id']]);
	$reponse2 = $bdd -> prepare("SELECT *,post.id as postid FROM post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id WHERE post.idUtil=utilisateur.id AND groupe.nom in(SELECT groupe.nom FROM appartient inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.id=:idgroupe) ORDER BY datepost DESC ");
    $reponse2->execute(['idgroupe' =>$_GET['id']]);
	$reponse3 = $bdd -> prepare("SELECT * FROM groupe WHERE groupe.id=:idgroupe");
    $reponse3->execute(['idgroupe' =>$_GET['id']]);
	$reponse4 = $bdd -> prepare("SELECT * FROM appartient WHERE idGroupe=:idgroupe AND idUtil=:idutil ");
    $reponse4->execute(['idgroupe' =>$_GET['id'], 'idutil' => $_SESSION['id']]);
	$reponse5 = $bdd -> query("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
	$reponse6 = $bdd -> prepare("SELECT * FROM appartient WHERE idGroupe=:idgroupe AND idUtil=:idutil ");
    $reponse6->execute(['idgroupe' =>$_GET['id'], 'idutil' => $_SESSION['id']]);
	
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
	if (!$reponse4->rowcount()==0){
		echo "
		<form method=\"post\" action=\"traitementmurg.php?id=".htmlspecialchars($_GET['id'])."\" enctype=\"multipart/form-data\">";
			$donneesgroupe=$reponse3->fetch();
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".$donneesgroupe["icone"]."\" title=\"".htmlspecialchars($donneesgroupe["nom"])."\" alt=\"".htmlspecialchars($donneesgroupe["nom"])."\" width=\"90\" height=\"90\" />
					</div>
					<div class=\"media-body\">
						<h3 class=\"media-heading\">".htmlspecialchars($donneesgroupe["nom"])."</h3>	
                        <label for=\"photo\">Poste un document</label>
                        <input type=\"file\" id=\"photo\" name=\"photo\">
						<label for=\"lien\"></label> 
						<input type=\"varchar\" name=\"lien\" placeholder=\"inserre un lien ici\">			
						<label for=\"message\"></label> 
						<textarea id=\"textgroupe\" name=\"message\" cols=\"85\" rows=\"4\" placeholder=\"Poste un message pour le groupe\"></textarea><br/>";				
						while($donneesdroit=$reponse4->fetch()){
							if($donneesdroit["droit"]!="membre"){
								echo "
									<input type=\"checkbox\" name=\"important\" />
									<label for=\"important\">important</label>
									<input type=\"checkbox\" name=\"public\" />
									<label for=\"public\">public</label>";
							}
						}
				echo"
						<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</div>
			</div>
		</form>";
	}
	echo "<hr><hr>";

		$don=$reponse5->fetchAll();
		while($donneespost=$reponse->fetch()){
			if (!$reponse4->rowcount()==0 || $donneespost["visibilite"]==1){
				$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
				$like->execute(['postid' =>$donneespost['postid']]);
				$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
				$dislike->execute(['postid' =>$donneespost['postid']]);
				echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".htmlspecialchars($donneespost["photo"])."\" title=\"".htmlspecialchars($donneespost["prenom"])." ".htmlspecialchars($donneespost["nom"])."\" alt=\"".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."\" width=\"60\" height=\"60\" />
					</div>
					<div class=\"media-body\">
						<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneespost["id"])."\">".htmlspecialchars($donneespost["prenom"])." ".htmlspecialchars($donneespost["nom"])."</a></h4>";
						if (preg_match("/www\.youtube\.com/",$donneespost["url"])===1||preg_match("/youtu\.be/",$donneespost["url"])===1){
							$vid=preg_replace("/.*[=\/]/","",$donneespost["url"]);
							echo '<iframe width="420" height="315"
								src="https://www.youtube.com/embed/'.$vid.'">
								</iframe></br>';
						} else if (preg_match("/.jpg$/",$donneespost["url"]) === 1 || preg_match("/.png$/",$donneespost["url"]) === 1 || preg_match("/.gif$/",$donneespost["url"]) === 1 || preg_match("/.jpeg$/",$donneespost["url"]) === 1){
							echo "<img src=\"".htmlspecialchars($donneespost["url"])."\" width=\"100%\" /></br>";
						}else{
							echo "<a href=".htmlspecialchars($donneespost["url"]).">".htmlspecialchars($donneespost["url"])."</a>";
						}
                        if (preg_match("/.jpg$/",$donneespost["fichier"]) === 1 || preg_match("/.png$/",$donneespost["fichier"]) === 1 || preg_match("/.gif$/",$donneespost["fichier"]) === 1 ||    preg_match("/.jpeg$/",$donneespost["fichier"]) === 1){
							echo "<img src=\"".htmlspecialchars($donneespost["fichier"])."\" width=\"100%\" /><br/>";
						}else if (!is_null($donneespost["fichier"])){
							echo "<a href=\"".htmlspecialchars($donneespost["fichier"])."\">Télécharge le fichier joint ".htmlspecialchars(basename($donneespost["fichier"]))."</a>";
						}
						echo "<p>".nl2br(htmlspecialchars($donneespost["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespost["datepost"])), "j/m/y \à G\hi")."</div>";
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donneespost["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donneespost["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form>
								<br>';
								
								
				echo "<div class=\"cache\">
						<span>Voir commentaires</span>
							<div class=\"cache2\" style=\"display:none\">";					
				
				
				
				foreach($don as $donneesreponses){
					if($donneespost["postid"]==$donneesreponses["idPost"]){
						$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
						$like->execute(['postid' =>$donneesreponses['postid']]);
						$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
						$dislike->execute(['postid' =>$donneesreponses['postid']]);
						echo"<hr>
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donneesreponses["photo"])."\" title=\"".htmlspecialchars($donneesreponses["prenom"])." ".htmlspecialchars($donneesreponses["nom"])."\" alt=\"".htmlspecialchars($donneesreponses["nom"])." ".htmlspecialchars($donneesreponses["prenom"])."\" width=\"50\" height=\"50\" />
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneesreponses["id"])."\">".htmlspecialchars($donneesreponses["prenom"])." ".htmlspecialchars($donneesreponses["nom"])."</a></h4>
								<p>".nl2br(htmlspecialchars($donneesreponses["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneesreponses["datepost"])), "j/m/y \à G\hi")."</div>
							</div>
						</div>";
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donneesreponses["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40px" width="40px" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donneesreponses["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40px" width="40px" />
								</form>
								<br>';
					}
				
				}
				
				
				echo"Fin des commentaires</div>
					</div>";					
				
					
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donneespost["postid"])."\">
						
						<textarea name=\"message\" cols=\"90\" rows=\"4\" placeholder=\"Laisse un message !\"></textarea>						
						<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</form>		
					</div>
					<hr>
					</div>";		
                    
			}	
		}
		
		echo"</div>";				
					
		echo "<div class=\"col-sm-3 col-perso\">";
		if($reponse4->rowcount()==0){
			$donneesgroupe=$reponse3->fetch();
			if($donneesgroupe["type"]!="defaut"){
				echo"	
                 <form method=\"post\" action=\"traitementrejoindreg.php?id=".htmlspecialchars($_GET['id'])."\">
                     <input id=\"rejoindreg\" type=\"submit\"  value=\"Rejoindre\" name=\"rejoindre\">
                 </form>";
			}
		}
			else{
				echo"
				<form method=\"post\" action=\"traitementquitterg.php?id=".htmlspecialchars($_GET['id'])."\">
					<input id=\"rejoindreg\" type=\"submit\"  value=\"  Quitter  \" name=\"quitter\">
				</form>";
				while($donneesmembre=$reponse6->fetch()){
					if($donneesmembre["droit"]!="membre"){
                        echo "<a id=\"liengestion\"href='gestiong.php?id=".$_GET['id']."'>Gérer le groupe</a><br><br>";
					}
               	}
			}
			while($donneespostutil=$reponse2->fetch()){
				if((!$reponse4->rowcount()==0 || $donneespostutil["visibilite"]==1) && $donneespostutil["importance"]){
					$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donneespostutil['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donneespostutil['postid']]);
					echo "
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donneespostutil["photo"])."\" title=\"".htmlspecialchars($donneespostutil["nom"])."\" alt=\"".htmlspecialchars($donneespostutil["nom"])."\" width=\"60\" height=\"60\" />
							</div>
							<div class=\"media-body\">							
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneespostutil["id"])."\">".htmlspecialchars($donneespostutil["prenom"])." ".htmlspecialchars($donneespostutil["nom"])."</a></h4>
								<p>".htmlspecialchars($donneespostutil["message"])."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespostutil["datepost"])), "j/m/y \à G\hi")."</div>		
							</div>
						";
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donneespostutil["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donneespostutil["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form></div>';
				}
			}

	echo "</div>";
?>
