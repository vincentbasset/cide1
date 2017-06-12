<?php
	include("header.php");
	$insertion = $bdd->prepare("INSERT INTO favori VALUES(:idutil,:idoffre)");
	if($insertion->execute(['idutil'=>$_SESSION['id'], 'idoffre'=>$_GET['id']])){
	}
	else{
		$suppression = $bdd->prepare("DELETE FROM favori WHERE favori.idUtil=:idutil AND favori.idOffre=:idoffre;");
		$suppression->execute(['idutil'=>$_SESSION['id'], 'idoffre'=>$_GET['id']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=offre.php?variable=0">';

	echo "</div>
		</body>
		</html>";
?>
