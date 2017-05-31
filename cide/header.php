<?php
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
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
			<h2><a href="https://cas.uha.fr/cas/login?service=http://www.e-services.uha.fr"><img src="image/ensisa.jpg" title="Ecole Nationale Supérieure d'Ingénieurs Sud Alsace" alt="ENSISA" width="300px" height="150px"/></a></h2>
			<h1><a href="index.php"><img src="image/logo.jpg" title="Le Cercle des Ingénieurs de l'ENSISA" alt="C.I.D.E." width="200px" height="150px" /></a></h1>
			<p><a href="inscription.php">Inscription</a></p>
		</header>
		
		<div class="gauche">
			<?php include("navigation.php"); ?>
		</div>
		
