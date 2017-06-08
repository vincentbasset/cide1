<?php
	include("header.php");
?>
		<div class="col-sm-1 col-perso">
			<p>
				<form method="post" action="traitementmail.php">
					<input type="email" name="mail" placeholder="Entrez votre mail" required>
					<input type="submit" name="envoyer" value="Envoyez un nouveau mot de passe"/>
				</form>
			</p>
		</div>
		
	</div>
	</body>
</html>