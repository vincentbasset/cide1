<?php
	include("header.php");
	if(isset($_POST["envoyer"])){
		$insertion = $bdd->prepare("DELETE FROM `utilisateur` WHERE `utilisateur`.`id` = :id");
		$insertion->execute(["id"=>$_SESSION['id']]);
		session_unset();
		session_destroy();
		echo "<script>alert(\"Vous êtes désinscrit de C.I.D.E.\")</script>";
	}
	 
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>
		
	</body>
</html>