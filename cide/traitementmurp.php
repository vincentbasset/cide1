<?php
	include("header.php");
?>

<?php
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["message"])){
			$message = $_POST["message"];
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,:iduser,0,:idpage,0,0,0,:message,:lien,CURRENT_TIMESTAMP)");
			$insertion->execute(['iduser'=>$_SESSION['id'],'idpage'=>$_GET['id'],'message'=>$message, 'lien'=>$_POST['lien']]);
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=murprofil.php?id='.htmlspecialchars($_GET["id"]).'">';
?>
	</div>
	</body>
</html>
