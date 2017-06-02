<?php
	include("header.php");
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"]) && !empty($_POST["description"])){
			$nom = $_POST["nom"];
			$description = $_POST["description"];
			$type = $_POST["type"];
			$insertion = $bdd->prepare("INSERT INTO groupe VALUES(NULL,:nom,:type,:description,\"image/icone.jpg\")");
			$insertion->execute(["nom"=>$nom,"type"=>$type,"description"=>$description]);
			$id = $bdd->lastInsertId();
           		$insertion = $bdd->prepare("INSERT INTO appartient VALUES(".$_SESSION['id'].",".$id.",\"createur\")");
			$insertion->execute();		
			if(empty($_FILES['photo']['name'])){
				$photo = "image/icone.jpg";			
			}
			else{
				$dossier = "image/";
				$fichier = "icone_id=".$id;
				
				move_uploaded_file($_FILES["photo"]["tmp_name"],$dossier.$fichier);
				$photo= $dossier.$fichier;
			}
			$insertion = $bdd->prepare("UPDATE groupe SET icone=:photo WHERE id=:id");
			$insertion->execute(["photo"=>$photo,"id"=>$id]);
			
		}
	}
echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$id.'">';
?>
	</body>
</html>