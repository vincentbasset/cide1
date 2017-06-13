<?php
	$date = $bdd -> query("select getdate() as currentdatetime");
	//on prends toutes les infos des posts qui sont visible pas l'utilisateur connecté
	$reponse = $bdd -> prepare("SELECT * from post where post.idGroupe=0 and post.idPost=0 or post.id in (SELECT post.id from post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id where (post.visibilite=1 or post.idGroupe in (SELECT appartient.idGroupe from appartient where appartient.idUtil=:idutil)) and groupe.accepte=1 and post.idUtil=appartient.idUtil and post.idPost=0) ORDER BY datepost DESC ");
	$reponse->execute(['idutil' =>$_SESSION['id']]);							
	$reponse2 = $bdd -> prepare("SELECT *,post.id as postid  from post inner join groupe on post.idGroupe=groupe.id inner join appartient on groupe.id=appartient.idGroupe inner join utilisateur on appartient.idUtil=utilisateur.id  where (post.visibilite=1 or post.idGroupe in (SELECT appartient.idGroupe from appartient where appartient.idUtil=:idutil)) and groupe.accepte=1 and post.idUtil=appartient.idUtil and post.importance=1 ORDER BY datepost DESC ");
	$reponse2->execute(['idutil' =>$_SESSION['id']]);
	$reponse3 = $bdd -> query("SELECT *,post.id as postid FROM post inner join utilisateur on post.idUtil=utilisateur.id WHERE idPost!=0 order by datepost");
	
	$reponse4 = $bdd -> prepare("SELECT nom,id FROM  groupe WHERE groupe.id = :idg");
	
	$reponse5 = $bdd -> prepare("SELECT nom,prenom,id FROM  utilisateur WHERE utilisateur.id = :idu");
	
	
?>		
	
<script>
	$(document).ready(function(){
		$(".cache").click(function(){
			$(this).find(".cache2").toggle(700);
		});
	});
</script>




		<?php
			echo "<div class=\"col-sm-7 col-perso\">";
				$don=$reponse3->fetchAll();
                
				while($donnees=$reponse->fetch()){
					$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donnees['id']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donnees['id']]);
					$reponse6 = $bdd -> prepare("SELECT * FROM  utilisateur WHERE utilisateur.id=:idutil");
					$reponse6->execute(['idutil' =>$donnees['idUtil']]);
					$donnees6=$reponse6->fetch();
					//on affiche le post mère
                echo "
					
					<div class=\"media\">
						<div class=\"media-left\">
							<img class=\"img-circle\" src=\"".htmlspecialchars($donnees6["photo"])."\" title=\"".htmlspecialchars($donnees6["nom"])." ".htmlspecialchars($donnees6["prenom"])."\" alt=\"".htmlspecialchars($donnees6["nom"])." ".htmlspecialchars($donnees6["prenom"])."\" width=\"60\" height=\"60\" />

						</div>
						<div class=\"media-body\">
							<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees6["id"])."\">".htmlspecialchars($donnees6["nom"])." ".htmlspecialchars($donnees6["prenom"])."</a>
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
								echo "<img class=\"img\" src=\"".htmlspecialchars($donnees["url"])."\" class=\"url\" alt=\"url partagé\" /></br>";
							}else{
								echo "<a href=".htmlspecialchars($donnees["url"]).">".htmlspecialchars($donnees["url"])."</a>";
							}
                            if (preg_match("/.jpg$/",$donnees["fichier"]) === 1 || preg_match("/.png$/",$donnees["fichier"]) === 1 || preg_match("/.gif$/",$donnees["fichier"]) === 1 ||    preg_match("/.jpeg$/",$donnees["fichier"]) === 1){
                                    echo "<img src=\"".htmlspecialchars($donnees["fichier"])."\" class=\"fichier\" alt=\"fichier partagé\" /><br/>";
                            }else if (!is_null($donnees["fichier"])){
                                echo "<a href=\"".htmlspecialchars($donnees["fichier"])."\">Télécharge le fichier joint ".htmlspecialchars(basename($donnees["fichier"]))."</a>";
                            }
							echo "<p>".nl2br(htmlspecialchars($donnees["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y \à G\hi")."</div>";
							$_SESSION['url']=$newurl;
							echo'<form class="myform" method="post" action="traitementlike.php?id='.$donnees["id"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form class="myform" method="post" action="traitementdislike.php?id='.$donnees["id"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote" alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form>';
				
				//on cache avec bootstrap les réponse du post mère
				echo "<div class=\"cache\">
						<span>Voir commentaires</span>
							<div class=\"cache2\" style=\"display:none\">";
				
				
				foreach($don as $donnee){
					if($donnees["id"]==$donnee["idPost"]){
						echo"<hr>
						<div class=\"media\">
							<div class=\"media-left\">
								<img class=\"img-circle\" src=\"".htmlspecialchars($donnee["photo"])."\" title=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" alt=\"".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."\" width=\"50\" height=\"50\" />
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnee["id"])."\">".htmlspecialchars($donnee["nom"])." ".htmlspecialchars($donnee["prenom"])."</a></h4>
								<p>".nl2br(htmlspecialchars($donnee["message"]))."</p>
								<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnee["datepost"])), "j/m/y \à G\hi")."</div>
							</div>
						</div>";
						$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donnee['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donnee['postid']]);
						echo'<form class="myform" method="post" action="traitementlike.php?id='.$donnee["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form class="myform" method="post" action="traitementdislike.php?id='.$donnee["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote"   alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form>';
					}
				
				}
				
				

				echo"Fin des commentaires</div>
					</div>";	
				
				//formulaire pour répondre
				echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donnees["id"])."\">
						<textarea name=\"message\" cols=\"90\" rows=\"4\" placeholder=\"Laisse un message !\"></textarea><br/>					

					<input type=\"submit\" value =\"Envoyer\" name=\"envoyer\"/>
					</form>
					
					</div>
					<hr>
					</div>";
                
						
				}
				
				echo "</div>";
				
				echo "<div class=\"col-sm-3 col-perso\">";
				//posts importants
				while($donnees=$reponse2->fetch()){
					$like = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='like' and post.id=:postid");
					$like->execute(['postid' =>$donnees['postid']]);
					$dislike = $bdd -> prepare("SELECT * FROM vote inner join post on vote.idPost=post.id where type='dislike' and post.id=:postid");
					$dislike->execute(['postid' =>$donnees['postid']]);
						echo "
							<div class=\"media\">
								<div class=\"media-left\">
									<img class=\"img-circle\" src=\"".htmlspecialchars($donnees["photo"])."\" title=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"60\" height=\"60\" />
								</div>
								<div class=\"media-body\">
									<h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a>
									<small><i>";
									$reponse4->execute(['idg' =>$donnees["idGroupe"]]);
									$rep4=$reponse4->fetch();			
									echo"dans <a href=\"groupe.php?id=".$rep4["id"]."\">".htmlspecialchars($rep4["nom"])."</a>";
									echo "</i></small></h4>";
									echo "<p>".nl2br(htmlspecialchars($donnees["message"]))."</p>
										<div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees["datepost"])), "j/m/y \à G\hi")."</div>										
								</div>
							";
							echo'<form class="myform" method="post" action="traitementlike.php?id='.$donnees["postid"].'">
									'.$like->rowcount().'
								  <input type="image" name="vote" alt="j\'aime" src="image/like.gif" height="40" width="40" />
								 </form>
								 <form class="myform" method="post" action="traitementdislike.php?id='.$donnees["postid"].'">
									'.$dislike->rowcount().'
								  <input type="image" name="vote" alt="je n\'aime pas" src="image/dislike.gif" height="40" width="40" />
								</form></div>';

				}
				echo"</div>";
			?>
