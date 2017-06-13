<?php

session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    $reponse = $bdd -> prepare('SELECT * FROM chatmsg inner join utilisateur on chatmsg.idutil=utilisateur.id WHERE idroom = :idr and chattime BETWEEN timestamp(DATE_SUB(NOW(), INTERVAL 2.5 SECOND)) AND timestamp(NOW())');
    $reponse -> execute(['idr' => $_GET['room']]);
    while($donnees = $reponse -> fetch()){
                $name=$donnees['prenom'].' '.$donnees['nom'];
                echo '<div class="msgln">('.date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees['chattime'])), "j/m/y \à G\hi").') <font color='.$_GET['couleur'].'><b>'.$name.'</b>:  '.stripslashes(htmlspecialchars($donnees['message'])).'</font><br></div>';
            }
?>