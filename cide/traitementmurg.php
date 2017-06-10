
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
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,:iduser,:idgroupe,0,0,:visible,:important,:message,:lien,CURRENT_TIMESTAMP)");
			$insertion->execute(['iduser' => $_SESSION['id'] , 'idgroupe' => $_GET['id'] , 'visible' => $visible , 'important' => $important, 'message' => $message, 'lien'=> $_POST['lien'] ]);
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.htmlspecialchars($_GET["id"]).'">';
?>

</div>
</body>
</html>
