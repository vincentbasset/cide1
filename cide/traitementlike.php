<?php
	include("header.php");
	$insertion = $bdd->prepare("INSERT INTO vote VALUES(:idUtil,:idPost,:type)");
	if($insertion->execute(['idUtil'=>$_SESSION['id'], 'idPost'=>$_GET['id'],'type'=>'like'])){
	}
	else{
		echo "<script>alert('Vous avez déjà voté pour ce post')</script>";
	}
	echo '<meta http-equiv="refresh" content="0;URL='.$_SESSION['url'].'">';

	echo "</div>
		</body>
		</html>";
?>
