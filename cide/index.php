<?php
    include("header.php");
    if (isset($_SESSION['id'])) {
		//ce qui se passe si on est co
		include("fluxdactu.php");
		
	}
	else {
		//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
		echo '<div class="centredeco">
				<p>
				Connecte toi ou rejoins nous !
				</br>
				</br>
				<a class="inscription" href="inscription.php">Pas encore inscrit ? Par ici !</a>
				</p></div>';
	}
	echo "</body>
		  </html>";
?>