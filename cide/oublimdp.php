<?php
	include("header.php");
	if (!isset($_SESSION['id'])){
		echo'	<div class="col-sm-1 col-perso">
				<p>
					Vous avez oublié votre mot de passe?<br/>Renseignez votre email afin de pouvoir vous reconnecter!
					<form method="post" action="traitementmail.php">
						<input type="email" name="mail" placeholder="Entrez votre mail" required>
						<input type="submit" name="envoyer" value="Envoyez un nouveau mot de passe"/>
					</form>
				</p>
			</div>
			
		</div>';
	}
	else{
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
?>
	</body>
</html>