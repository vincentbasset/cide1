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
				
				$mail = new PHPMailer;
				//Utilisataion de smtp
				$mail->isSMTP();
				//pas de message de debug
				$mail->SMTPDebug = 0;
				$mail->Debugoutput = 'html';
				//paramètre qui indique de quel serveur mail on envoie le message
				$mail->Host = 'smtp.gmail.com';
				// port pour gmail
				$mail->Port = 587;
				$mail->SMTPSecure = 'tls';
				$mail->SMTPAuth = true;
				//boite mail d'où on envoie les mails
				$mail->Username = "cide.ensisa@gmail.com";
				$mail->Password = "cercleensisa";
				$mail->setFrom('cide.ensisa@gmail.com', 'CIDE ENSISA');
				//adresse a qui envoyer
				$mail->addAddress($adresse);
				$mail->Subject = utf8_decode('Mot de passe oublié?');
				$mail->Body = utf8_decode("Votre nouveau mot de passe est: ".$nmdp."\nVeuillez le changer une fois connecté.");
				//piece jointe
				//$mail->addAttachment('images/phpmailer_mini.png');
				
				if (!$mail->send()) {
					//si le message ne s'envoie pas
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
