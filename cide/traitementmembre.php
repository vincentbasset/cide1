<?php
	include("header.php");
?>

<?php
	if(isset($_POST["modifier"])){
		$update=$bdd->prepare('UPDATE appartient SET droit=:membre WHERE idUtil=:id and idGroupe=:groupe');
        $update->execute(['membre'=>$_POST['membre'], 'id'=>$_GET['id'],'groupe'=>$_GET['groupe']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=Gestiong.php?id='.$_GET['groupe'].'">';
?>
	</body>
</html>