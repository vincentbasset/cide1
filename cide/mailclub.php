<?php
	$reponse=$bdd->query("SELECT * FROM utilisateur inner join appartient on appartient.idUtil = utilisateur.id inner join groupe on appartient.idGroupe = groupe.id WHERE groupe.nom=\"BDE\" and appartient.droit=\"admin\" limit 0,1");
		$donnees=$reponse->fetch();
		$adresse = $donnees["adresse"];
	$url = "http://localhost/cide/demandeofficiel.php?id=".$id;
	require 'mail/PHPMailerAutoload.php';
	
	//paramètres des mails, plus d'infos dans traitementmail.php
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "cide.ensisa@gmail.com";
	$mail->Password = "cercleensisa";
	$mail->setFrom('cide.ensisa@gmail.com', 'CIDE ENSISA');
	$mail->addAddress($adresse);
	$mail->Subject = utf8_decode('Vérification d\'un club');
	$mail->Body = utf8_decode("Un nouveau club à été créé,\n Veuillez accepter ou refuser sa publication en cliquant si dessous:\n".$url);
	
	if (!$mail->send()) {
		echo "<div class='centreprofil' ><p>Un problème est survenu</p></div>";
	} else {
		//echo '<meta http-equiv="refresh" content="0;URL=confirmationmodif.php">';
	}
?>