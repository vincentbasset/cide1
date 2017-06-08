<?php
	include("header.php");
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"]) && !empty($_POST["description"])){
			$nom = $_POST["nom"];
			$description = $_POST["description"];
			$type = $_POST["type"];
			$insertion = $bdd->prepare("INSERT INTO groupe VALUES(NULL,:nom,:type,:description,\"image/icone.jpg\",NULL)");
			$insertion->execute(["nom"=>$nom,"type"=>$type,"description"=>$description]);
			$id = $bdd->lastInsertId();
           	$insertion = $bdd->prepare("INSERT INTO appartient VALUES(:iduser,:idgroupe,\"createur\")");
			$insertion->execute(['iduser'=>$_SESSION['id'],'idgroupe'=>$id ]);		
			if(empty($_FILES['photo']['name'])&& $_FILES['photo']['error']>0){
				$photo = "image/icone.jpg";			
			}
			else{
				$dossier = 'image/';
				$fichier = basename($_FILES['photo']['name']);
				$taille_maxi = 5000000;
				$taille = filesize($_FILES['photo']['tmp_name']);
				$extensions = array('.png', '.gif', '.jpg', '.jpeg');
				$extension = strrchr($_FILES['photo']['name'], '.'); 
				//Début des vérifications de sécurité...
				if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
				{
					 alert('Vous devez uploader un fichier de type png, gif, jpg, ou jpeg...');
				}
				if($taille>$taille_maxi)
				{
					 alert('Le fichier est trop gros...');
				}
				$fichier = "icone_id=".$id.$extension;
				move_uploaded_file($_FILES["photo"]["tmp_name"],$dossier.$fichier);
				$photo= $dossier.$fichier;
			}
			$insertion = $bdd->prepare("UPDATE groupe SET icone=:photo WHERE id=:id");
			$insertion->execute(["photo"=>$photo,"id"=>$id]);
			if($type == "officiel"){
				include("mailofficiel.php");
			}
			if($type == "club"){
				include("mailclub.php");
			}
			$insertion = $bdd->prepare("UPDATE `groupe` SET `accepte` = '1' WHERE `groupe`.`type` = 'public' or `groupe`.`type` = 'prive' ");
			$insertion->execute();
		}
	}
echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$id.'">';
?>
	</body>
</html>