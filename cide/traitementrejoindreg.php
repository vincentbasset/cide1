<?php
	include("header.php");
?>

<?php
	if(isset($_POST["rejoindre"])){
			$insertion = $bdd->prepare("INSERT INTO appartient VALUES(:id,:idgroupe,\"membre\")");
			$insertion->execute(['id'=>$_SESSION['id'], 'idgroupe'=>$_GET['id']]);
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.htmlspecialchars($_GET["id"]).'">';
?>
	</body>
</html>
