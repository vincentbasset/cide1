<?php
	include("header.php");
	if(isset($_POST["envoyer"])){
		if($_POST["choix"]=="accepter"){
			$insertion = $bdd->prepare("UPDATE `groupe` SET `accepte` = '1' WHERE `groupe`.`id` = :id"); 
			$insertion->execute(['id'=>$_GET['id']]);
			include("mailaccepte.php");
		}
		else{
			$insertion = $bdd->prepare("DELETE FROM `groupe` WHERE `groupe`.`id` = :id"); 
			$insertion->execute(['id'=>$_GET['id']]);
			include("mailrefuse.php");
		}
	}
?>