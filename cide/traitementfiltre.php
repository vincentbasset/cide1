<?php
	include("header.php");
?>

<?php
	if(isset($_POST["envoyer"])){
		$update=$bdd->query("UPDATE offre SET visible = 0");
		if(!empty($_POST["favori"])){
			$favori = $bdd -> prepare("SELECT * FROM favori where favori.idUtil=:idutil");
			$favori->execute(['idutil'=>$_SESSION['id']]);
			while($fav=$favori->fetch()){
				$update=$bdd->query("UPDATE offre SET visible = 1 WHERE offre.id=".htmlspecialchars($fav['idOffre'])."");
			}
		}
		if(!empty($_POST["stage"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE nature=\"stage\"");		
		}
		if(!empty($_POST["job"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE nature=\"job\"");
		}
		if(!empty($_POST["cdd"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE nature=\"cdd\"");
		}
		if(!empty($_POST["cdi"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE nature=\"cdi\"");
		}
		if(!empty($_POST["alternance"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE nature=\"alternance\"");
		}
		if(!empty($_POST["etranger"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE etranger=1");
		}
		if(!empty($_POST["info"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"informatique\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["auto"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"automatique\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["meca"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"mecanique\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["textile"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"textile\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["master"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"master\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["prepas"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE filiere=\"prepas\" OR filiere=\"toutes\"");
		}
		if(!empty($_POST["court"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE duree<=4");
		}
		if(!empty($_POST["moyen"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE duree>=4 AND duree<=8");
		}
		if(!empty($_POST["long"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE duree>8");
		}
		if(!empty($_POST["mobilite"])){
			$update=$bdd->query("UPDATE offre SET visible = 1 WHERE mobilite=0");
		}
		
	echo '<meta http-equiv="refresh" content="0;URL=offre.php?variable=1">';	
	
	}
	
	else{
		echo '<meta http-equiv="refresh" content="0;URL=offre.php?variable=0">';
	}	
?>

</div>
</body>
</html>