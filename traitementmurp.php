<?php
	include("header.php");
?>

<?php
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["message"])){
			$message = $_POST["message"];
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,\"".$_SESSION['id']."\",0,".$_GET['id'].",0,0,0,\"".$message."\",CURRENT_TIMESTAMP)");
			$insertion->execute();
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=murprofil.php?id='.$_GET["id"].'">';
?>
	</body>
</html>
