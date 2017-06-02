<?php
	include("header.php");
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"]) && !empty($_POST["description"])){
			$nom = $_POST["nom"];
			$description = $_POST["description"];
			$type = $_POST["type"];
			$insertion = $bdd->prepare("INSERT INTO groupe VALUES(NULL,\"".$nom."\",\"".$type."\",\"".$description."\",\"image/icone.jpg\")");
			$insertion->execute();
			$id = $bdd->lastInsertId();
           		$insertion = $bdd->prepare("INSERT INTO appartient VALUES(".$_SESSION['id'].",".$id.",\"createur\")");
			$insertion->execute();
		}
	}
?>
	</body>
</html>
