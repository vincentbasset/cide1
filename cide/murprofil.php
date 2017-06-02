<?php
   include("header.php");
    if (isset($_GET['id'])) {
		if (isset($_SESSION['id'])) {
		//ce qui se passe si on est co
		include("murprofilconnecte.php");
		}
	}
	else {
		//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
		echo '<div class="centreprofil"><p><a class="inscription" href="inscription.php">Venez vous inscrire</a></p></div>';
		}
	echo "</body>
		</html>";
?>