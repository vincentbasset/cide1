<?php
	if(isset($_POST["search"])){
		$recherche=$_POST['search'];
		echo '<meta http-equiv="refresh" content="0;URL=recherche.php?search='.$recherche.'">';
	}
?>