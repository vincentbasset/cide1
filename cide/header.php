<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
<! doctype html>
<html lang = "fr">

	<head>
	<!-- head = entête du site -->
		<meta charset="utf-8"/>	
		<title>C.I.D.E.</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	
	<body>
		<header>	
		<!-- header = entête de la page -->
			<h2><a href="https://cas.uha.fr/cas/login?service=http://www.e-services.uha.fr"><img src="image/ensisa.jpg" title="Ecole Nationale Supérieure d'Ingénieurs Sud Alsace" alt="ENSISA" width="300px" height="200px"/></a></h2>
			<h1><a href="index.php"><img src="image/logo.jpg" title="Le Cercle des Ingénieurs de l'ENSISA" alt="C.I.D.E." width="300px" height="200px" /></a></h1>
			<p>
			<div id=hconnect>
			<?php
				if (isset($_SESSION['id'])) {
					//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
						echo '<p>connecté</p>
						<form action="logout.php" method="post">
						<input type="submit" value="Déconnexion">
						</form>';
					//ce qui se passe si on est co
					}
					else {
					//ce qui ce passe si on est pas co, avec un exemple de formulaire liant à un fichier qui fera le login
						echo '
						<form action="login.php" method="post">
						<input type="varchar" name="login" placeholder="Votre login">
						<br />
						<input type="password" name="pwd" placeholder="Votre mot de passe"><br />
						<input type="submit" value="Connexion" name="connect">
						<a href="inscription.php">Inscription</a>
						</form>';	
					}
			?>
			</div>
			</p>
			
		</header>
		
		<div class="gauche">
			<?php include("navigation.php"); ?>
		</div>
