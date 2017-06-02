
<?php
	include("header.php");
?>

<?php
	$visible=0;
	$important=0;

	if(isset($_POST["envoyer"])){
		if(!empty($_POST["message"])){
			if(isset($_POST["public"])){
				$visible=1;	
			}
			if(isset($_POST['important'])){
				$important=1;	
			}
			$message = $_POST["message"];
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,\"".$_SESSION['id']."\",".$_GET['id'].",\"".$visible."\",\"".$important."\",\"".$message."\",CURRENT_TIMESTAMP)");
			$insertion->execute();
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$donnees["id"].'">';
?>
	</body>
</html>
