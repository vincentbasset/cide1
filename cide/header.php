<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
<!doctype html>
<html lang = "fr">

	<head>
	<!-- head = entête du site -->
		<meta charset="utf-8"/>	
		<title>C.I.D.E.</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<?php
			include "navigation.php";
		?>
		
		<div class="container-fluid">
			<?php include("gaucheprofil.php"); ?>
		
