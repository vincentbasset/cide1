<?php
    include("header.php");
    if (isset($_SESSION['id'])) {
                        //ce qui se passe si on est co
                        include("fluxdactu.php");
					}
					else {
					   //ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
						echo '<a href="inscription.php">Pour avoir accès à ce contenue, inscrivez vous ;)</a>';
					}
?>