<?php
	include("header.php");
	$groupe = $bdd -> query('SELECT * FROM groupe WHERE id='.$_GET['id'].'');
    $donnees = $groupe->fetch();
	if(isset($_POST["envoyer"])){
		if(isset($_GET['id'])){ 
			$insertion = $bdd->prepare("DELETE FROM `groupe` WHERE `groupe`.`id` = :id");
			$insertion->execute(["id"=>$_GET['id']]);
			echo "<script>alert(\"Vous venez de détruire ".$donnees['nom']."\")</script>";
		}
	}
	 
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>
		
	</body>
</html>