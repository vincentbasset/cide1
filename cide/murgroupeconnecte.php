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
	echo "<div class=\"col-sm-7 col-perso\">";
	if (!$reponse4->rowcount()==0){
		echo "
		<form method=\"post\" action=\"traitementmurg.php?id=".htmlspecialchars($_GET['id'])."\">";
			$donneesgroupe=$reponse3->fetch();
			echo "
				<div class=\"media\">
					<div class=\"media-left\">
						<img class=\"img-circle\" src=\"".$donneesgroupe["icone"]."\" title=\"".htmlspecialchars($donneesgroupe["nom"])."\" alt=\"".htmlspecialchars($donneesgroupe["nom"])."\" width=\"90px\" height=\"90px\" />
					</div>
					<div class=\"media-body\">
						<h3 class=\"media-heading\">".htmlspecialchars($donneesgroupe["nom"])."</h3>						
						<label for=\"lien\"></label> 
						<input type=\"varchar\" name=\"lien\" placeholder=\"insére un lien ici\">			
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
            echo "
            <div class=\"media\">
                <div class=\"media-left\">
                    <img class=\"img-circle\" src=\"".htmlspecialchars($donneespost["photo"])."\" title=\"".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."\" alt=\"".htmlspecialchars($donneespost["nom"])." ".htmlspecialchars($donneespost["prenom"])."\" width=\"60px\" height=\"60px\" />
                </div>
                <div class=\"media-body\">
                    <h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\">".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donneespost["prenom"])."</a></h4>";
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
                    echo "<p>".nl2br(htmlspecialchars($donneespost["message"]))."</p>
                            <div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespost["datepost"])), "j/m/y \à G\hi")."</div>";



            foreach($don as $donneesreponses){
                if($donneespost["postid"]==$donneesreponses["idPost"]){
                    echo"<hr>
                    <div class=\"media\">
                        <div class=\"media-left\">
                            <img class=\"img-circle\" src=\"".htmlspecialchars($donneesreponses["photo"])."\" title=\"".htmlspecialchars($donneesreponses["nom"])." ".htmlspecialchars($donneesreponses["prenom"])."\" alt=\"".htmlspecialchars($donneesreponses["nom"])." ".htmlspecialchars($donneesreponses["prenom"])."\" width=\"50px\" height=\"50px\" />
                        </div>
                        <div class=\"media-body\">
                            <h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneesreponses["id"])."\">".htmlspecialchars($donneesreponses["nom"])." ".htmlspecialchars($donneesreponses["prenom"])."</a></h4>
                            <p>".nl2br(htmlspecialchars($donneesreponses["message"]))."</p>
                            <div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneesreponses["datepost"])), "j/m/y \à G\hi")."</div>
                        </div>
                    </div>";
                }

            }

            echo"<form method=\"post\" action=\"traitementrep.php?id=".htmlspecialchars($donneespost["postid"])."\">
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
                echo "<a id=\"liengestion\"href='Gestiong.php?id=".$_GET['id']."'>Gérer le groupe</a><br><br>";
            }
        }
    }
    while($donneespostutil=$reponse2->fetch()){
        if((!$reponse4->rowcount()==0 || $donneespostutil["visibilite"]==1) && $donneespostutil["importance"]){
            echo "
                <div class=\"media\">
                    <div class=\"media-left\">
                        <img class=\"img-circle\" src=\"".htmlspecialchars($donneespostutil["photo"])."\" title=\"".htmlspecialchars($donneespostutil["nom"])." ".htmlspecialchars($donneespostutil["prenom"])."\" alt=\"".htmlspecialchars($donneespostutil["nom"])." ".htmlspecialchars($donneespostutil["prenom"])."\" width=\"60px\" height=\"60px\" />
                    </div>
                    <div class=\"media-body\">							
                        <h4 class=\"media-heading\"><a href=\"murprofil.php?id=".htmlspecialchars($donneespostutil["id"])."\">".htmlspecialchars($donneespostutil["nom"])." ".htmlspecialchars($donneespostutil["prenom"])."</a></h4>
                        <p>".htmlspecialchars($donneespostutil["message"])."</p>
                        <div class=\"date\">Posté le ".date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donneespostutil["datepost"])), "j/m/y \à G\hi")."</div>		
                    </div>
                </div>";
        }
    }
	echo "</div>";
?>
