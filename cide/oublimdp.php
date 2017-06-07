<?php
	include("header.php");
?>
		<div class="centreprofil">
			<p>
				<form method="post" action="traitementmail.php">
					<input type="email" name="mail" placeholder="Entrez votre mail" required>
					<input type="submit" name="envoyer" value="Envoyez un nouveau mot de passe"/>
				</form>
			</p>
		</div>
	</body>
</html>