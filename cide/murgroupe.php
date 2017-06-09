<?php
    if (isset($_SESSION['id'])) {
		include("murgroupeconnecte.php");
	}
	else {
		echo '<div class="col-sm-1 col-perso" id="deco">
				<p>
				Connecte toi ou rejoins nous !
				</br>
				</br>
				<a class="inscription" href="inscription.php">Pas encore inscrit ? Par ici !</a>
				</p></div>';
	}
?>