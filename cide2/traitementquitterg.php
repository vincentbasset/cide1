<?php
	include("header.php");
?>

<?php
	if(isset($_POST["quitter"])){
		$suppr = $bdd->prepare("DELETE FROM `appartient` WHERE `appartient`.`idUtil` =".$_SESSION['id']." AND `appartient`.`idGroupe` = ".$_GET['id']." ");
		$suppr->execute();
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$_GET["id"].'">';
?>
	</body>
</html>
