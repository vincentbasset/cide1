<?php
	include("header.php");
?>

<?php
	if(isset($_POST["rejoindre"])){
			$insertion = $bdd->prepare("INSERT INTO appartient VALUES(".$_SESSION['id'].",".$_GET['id'].",\"membre\")");
			$insertion->execute();
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$_GET["id"].'">';
?>
	</body>
</html>
