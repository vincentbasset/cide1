<?php
	include("header.php");
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
?>
<script src="javascript.js"></script>
		<div class="col-sm-1 col-perso" id="changemdp">
			<p>
				Changer de mot de passe
				<form name="inscription" method="post" action="mdpchange.php">
					<input type="password" name="ancienmdp" placeholder="Ancien mot de passe" required />
					<br>
					<br>
					<input type="password" name="mdp" placeholder="Nouveau mot de passe" required />
					<br>
					<br>
					<input type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required />
					<br>
					<br>
					<input id="motdp" type="submit" value="Changer de mot de passe" name="envoyer" onmouseover="javascript:check();" />
				</form>
			</p>
		</div>
	</div>	
	</body>
</html>