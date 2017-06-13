<?php
	include("header.php");
?>

<?php
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["message"])){
			$message = $_POST["message"];
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,:iduser,0,0,:idmessage,0,0,:message,\"\",CURRENT_TIMESTAMP,NULL)");
			$insertion->execute(['iduser'=>$_SESSION['id'],'idmessage'=>$_GET['id'], 'message'=>$message ]);
		}
	}
	
	echo '<meta http-equiv="refresh" content="0;URL='.$_SESSION['url'].'">';
?>
	</body>

</html>
