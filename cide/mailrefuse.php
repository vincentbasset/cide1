<?php
	$reponse=$bdd->query("SELECT * FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id where idGroupe=".$_GET['id']." and droit=\"createur\"");
		$donnees=$reponse->fetch();
		$adresse = $donnees["adresse"];
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
	$mail->Subject = utf8_decode('Votre club a été traité');
	$mail->Body = utf8_decode("Nous avons le regret de vous annoncer que votre groupe n'a pas été accepté.");
	
	if (!$mail->send()) {
		echo "<div class='centreprofil' ><p>Un problème est survenu</p></div>";
	} else {
		//echo '<meta http-equiv="refresh" content="0;URL=confirmationmodif.php">';
	}
?>