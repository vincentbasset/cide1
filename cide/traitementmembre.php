<?php
	include("header.php");
?>

<?php
	if(isset($_POST["modifier"])){
		$update=$bdd->prepare('UPDATE appartient SET droit="'.$_POST['membre'].'" WHERE idUtil='.$_GET['id'].'');
        $update->execute();
	}
	echo '<meta http-equiv="refresh" content="0;URL=Gestiong.php">';
?>
	</body>
</html>