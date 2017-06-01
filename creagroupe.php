<?php
	include("header.php");
?>
		<div class="centreprofil">
			<p>
				<h2>Création d'un groupe</h2>
				
					<form method="post" action="creergroupe">
						<p>
						<label for="nom">Nom du groupe:<br/>>></label>
						<input type="varchar" name="nom" required>
						<br/>
						<label for="description">Description du groupe:<br/></label>
						<textarea name="description" rows="10" cols="70" required></textarea>
						<br/>
						<a href="photo.php">Ajouter votre icone</a>
						<br/>
						<select name="type">
							<option value="prive">Privé</option>
							<option value="club">Club</option>
							<option value="officiel">Groupe Officiel</option>
							<option value="public">Public</option>
						</select>
						<br/>
						<input type="submit" value="Créer" name="envoyer"/>
						</p>
					</form>
			</p>
		</div>
	</body>
</html>