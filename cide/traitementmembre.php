<?php
	include("header.php");
?>

<?php
	if(isset($_POST["modifier"])){
		$update=$bdd->prepare('UPDATE appartient SET droit=:membre WHERE idUtil=:id');
        $update->execute(['membre'=>$_POST['membre'], 'id'=>$_GET['id']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=Gestiong.php">';
?>
	</body>
</html>