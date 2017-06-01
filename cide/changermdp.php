<?php
	include("header.php");
	$reponse = $bdd -> query("SELECT * FROM utilisateur WHERE id=".$_SESSION['id']."");
?>
<script src="javascript.js"></script>
		<div class="centreprofil">
			<p>
				Changer de mot de passse
				<form name="inscription" method="post" action="mdpchange.php">
					<input type="password" name="ancienmdp" placeholder="Ancien mot de passe" required>
					</br>
					<input type="password" name="mdp" placeholder="Nouveau mot de passe" required>
					</br>
					<input type="password" name="mdp verification" placeholder="Vérifiez votre mot de passe" required>
					</br>
					<input type="submit" value="Changer de mot de passe" name="envoyer" onmouseover="javascript:check();" />
				</form>
			</p>
		</div>
	</body>
</html>