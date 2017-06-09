<?php
	include("header.php");

	if(isset($_POST["envoyer"])){
		if(!empty($_POST["mail"])){
			$reponse=$bdd->query("SELECT * FROM utilisateur WHERE adresse=\"".$_POST['mail']."\"");
			$donnees=$reponse->fetch();
			if ($_POST['mail']==$donnees['adresse']){

				$adresse = $_POST['mail'];
				$nmdp = substr( md5(rand()), 0, 7);
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
				$mail->Subject = utf8_decode('Mot de passe oublié?');
				//Replace the plain text body with one created manually
				$mail->Body = utf8_decode("Votre nouveau mot de passe est: ".$nmdp."\nVeuillez le changer une fois connecté.");
				//Attach an image file
				//$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				
				if (!$mail->send()) {
					//echo "Mailer Error: " . $mail->ErrorInfo;
					echo "<div class='centreprofil' ><p>Un problème est survenu</p></div>";
				} else {
					$insertion = $bdd->prepare("UPDATE utilisateur SET motdepasse=:motdepasse WHERE adresse=:adresse");
					$insertion->execute(['motdepasse'=>password_hash($nmdp , PASSWORD_BCRYPT), 'adresse'=>$adresse]);
					echo '<meta http-equiv="refresh" content="0;URL=confirmationmodif.php">';
				}
				
			}
			else{
				echo "<div class='centreprofil' ><p>Email non reconnu</p></div>";				
			}
		}
	}
?>
	</body>
</html>
