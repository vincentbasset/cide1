<?php
	include("header.php");
?>

<?php
	if(isset($_POST["quitter"])){
		$suppr = $bdd->prepare("DELETE FROM `appartient` WHERE `appartient`.`idUtil` =:idutil AND `appartient`.`idGroupe` = :idgroupe ");
		$suppr->execute(['idutil'=>$_SESSION['id'], 'idgroupe'=>$_GET['id']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$_GET["id"].'">';
?>
	</body>
</html>
