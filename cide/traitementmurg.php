
<?php
	include("header.php");
?>


<?php
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
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
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,\"".$_SESSION['id']."\",1,\"".$visible."\",\"".$important."\",\"".$message."\",NULL)");
			$insertion->execute();
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=murgroupe.php">';
?>
	</body>
</html>