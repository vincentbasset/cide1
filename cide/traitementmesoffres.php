<?php
	include("header.php");

	if(isset($_POST["envoyer"])){
		$supprimer = $bdd->prepare("DELETE FROM offre WHERE id=:idoffre");
		$supprimer->execute(['idoffre' => $_GET['id']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=mesoffres.php">';
?>
</div>
</body>
</html>