<?php
// On démarre la session (ceci est indispensable dans toutes les pages)
session_start ();

// On récupère nos variables de session si elles existent
if (isset($_SESSION['login'])) {
echo '<html>';
//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
	echo '<p>connecté</p>';
//ce qui se passe si on est co
}
else {echo '<html>';
//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
	echo '<p>Page de notre section membre'.password_hash( "password" ,PASSWORD_DEFAULT).'</p>';
	echo '</head>';

	echo '<body>
	<form action="login.php" method="post">
    Votre login : <input type="text" name="login">
    <br />
    Votre mot de passe : <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion">
    </form>';
    
}
?>