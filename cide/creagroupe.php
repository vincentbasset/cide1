<?php
    include("header.php");
    if (isset($_SESSION['id'])){ //ce qui se passe si on est co
		include("creagroupeconnecte.php");
	}
	else{ //ce qui ce passe si on est pas co
		echo"<div class='col-sm-1 col-perso' id='deco'>
				<p>
					Connecte toi ou rejoins nous !
					<br>
					<br>
					<a class='inscription' href='inscription.php'>Pas encore inscrit ? Par ici !</a>
				</p>
			</div>";
	}
?>

	</div>
	</body>
</html>