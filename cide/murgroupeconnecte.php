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
		<form method=\"post\" action=\"traitementmurg.php?id=".htmlspecialchars($_GET['id'])."\">";
			$donnees=$reponse3->fetch();
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".$donnees["icone"]."\" title=\"".htmlspecialchars($donnees["nom"])."\" alt=\"".htmlspecialchars($donnees["nom"])."\" width=\"90px\" height=\"90px\" />
					</div>
					<div class=\"media-body\">
						<h3 class=\"media-heading\">".htmlspecialchars($donnees["nom"])."</h3>						
						<label for=\"lien\"></label> 
						<input type=\"varchar\" name=\"lien\" placeholder=\"insére un lien ici\">			
						<label for=\"message\"></label> 
						<textarea id=\"textgroupe\" name=\"message\" cols=\"85\" rows=\"4\" placeholder=\"Poste un message pour le groupe\"></textarea><br/>";				
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
					</div>
			</div>
				</form>";
	}
	echo "<hr><hr>";
		$don=$reponse5->fetchAll();
		while($donnees=$reponse->fetch()){
			if (!$reponse4->rowcount()==0 || $donnees["visibilite"]==1){
				$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
				$like->execute(['postid' =>$donnees['postid']]);
				$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
				$dislike->execute(['postid' =>$donnees['postid']]);
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
						} else if (preg_match("/.jpg$/",$donnees["url"]) === 1 || preg_match("/.png$/",$donnees["url"]) === 1 || preg_match("/.gif$/",$donnees["url"]) === 1 || preg_match("/.jpeg$/",$donnees["url"]) === 1){
							echo "<img src=\"".htmlspecialchars($donnees["url"])."\" width=\"100%\" /></br>";
						}else{
							echo "<a href=".htmlspecialchars($donnees["url"]).">".htmlspecialchars($donnees["url"])."</a>";
						}
						echo "<p>".nl2br(htmlspecialchars($donnees["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y \à G\hi")."</div>";
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donnees["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40px" width="40px" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donnees["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40px" width="40px" />
								</form>';
								
								
				echo "<div class=\"cache\">
						<span>Voir commentaires</span>
							<div class=\"cache2\" style=\"display:none\">";					
				
				
				
				foreach($don as $donnee){
					if($donnees["postid"]==$donnee["idPost"]){
						$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
						$like->execute(['postid' =>$donnee['postid']]);
						$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
						$dislike->execute(['postid' =>$donnee['postid']]);
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
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donnee["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40px" width="40px" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donnee["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40px" width="40px" />
								</form>';
					}
				
				}
				
				
				echo"Fin des commentaires</div>
					</div>";					
				
					
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donnees["postid"])."\">
						<label for=\"message\"></label> 
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
				echo"	
					<form method=\"post\" action=\"traitementrejoindreg.php?id=".htmlspecialchars($_GET['id'])."\">
						<input id=\"rejoindreg\" type=\"submit\"  value=\"Rejoindre\" name=\"rejoindre\">
					</form>";
			}
			else{
				echo"
				<form method=\"post\" action=\"traitementquitterg.php?id=".htmlspecialchars($_GET['id'])."\">
					<input id=\"rejoindreg\" type=\"submit\"  value=\"  Quitter  \" name=\"quitter\">
				</form>";
				while($donnees=$reponse6->fetch()){
					if($donnees["droit"]!="membre"){
                        echo "<a id=\"liengestion\"href='gestiong.php?id=".$_GET['id']."'>Gérer le groupe</a><br><br>";
					}
               	}
			}
			while($donnees=$reponse2->fetch()){
				if((!$reponse4->rowcount()==0 || $donnees["visibilite"]==1) && $donnees["importance"]){
					$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donnees['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donnees['postid']]);
					echo "
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60px\" height=\"60px\" />
							</div>
							<div class=\"media-body\">							
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a></h4>
								<p>".htmlspecialchars($donnees["message"])."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y \à G\hi")."</div>		
							</div>
						";
						echo'<form id="myform" method="post" action="traitementlike.php?id='.$donnees["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" value="like" alt="j\'aime" src="image/like.gif" height="40px" width="40px" />
								 </form>
								 <form id="myform" method="post" action="traitementdislike.php?id='.$donnees["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"  value="dislike"  alt="je n\'aime pas" src="image/dislike.gif" height="40px" width="40px" />
								</form></div>';
				}
			}
	echo "</div>";
?>
