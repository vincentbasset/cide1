<?php
	$reponse=$bdd->query("SELECT * FROM utilisateur inner join appartient on appartient.idUtil=utilisateur.id where idGroupe=".$_GET['id']." and droit=\"createur\"");
		$donnees=$reponse->fetch();
		$adresse = $donnees["adresse"];
	require 'mail/PHPMailerAutoload.php';
	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "cide.ensisa@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "cercleensisa";
	//Set who the message is to be sent from
	$mail->setFrom('cide.ensisa@gmail.com', 'CIDE ENSISA');
	//Set who the message is to be sent to
	$mail->addAddress($adresse);
	//Set the subject line
	$mail->Subject = utf8_decode('Votre club a été traité');
	//Replace the plain text body with one created manually
	$mail->Body = utf8_decode("Nous avons le regret de vous annoncer que votre groupe n'a pas été accepté.");
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	
	if (!$mail->send()) {
		//echo "Mailer Error: " . $mail->ErrorInfo;
		echo "<div class='centreprofil' ><p>Un problème est survenu</p></div>";
	} else {
		//echo '<meta http-equiv="refresh" content="0;URL=confirmationmodif.php">';
	}
?>